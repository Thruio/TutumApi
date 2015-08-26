<?php
namespace Thru\TutumApi\Models;

use Thru\TutumApi\Client;

class Service extends BaseService
{

    /**
     * @return Port[]
     */
    public function getContainerPorts(){

        $ports = [];
        if(parent::getContainerPorts()){
            foreach(parent::getContainerPorts() as $containerPort){
                $port = new Port();
                $port->setEndpoint($containerPort->endpoint_uri);
                $port->setInnerPort($containerPort->inner_port);
                $port->setOuterPort($containerPort->outer_port);
                $port->setPortName($containerPort->port_name);
                $port->setProtocol($containerPort->protocol);
                $port->setIsPublished($containerPort->published);
                $ports[] = $port;
            }
        }
        return $ports;
    }

    /**
     * @return Container[]
     * @throws \Exception
     */
    public function getContainers(){
        if(empty($this->containers)){
            $this->reload();
        }
        $containers = [];
        foreach(parent::getContainers() as $containerUri){
            $containers[] = Client::getInstance()->containers()->find(str_replace("api/v1/container/","",trim($containerUri,"/")));
        }
        return $containers;
    }

    /**
     * @return Service[]
     */
    public function getLinkedFromService(){
        $linkedServices = [];
        if(count(parent::getLinkedFromService())) {
            foreach (parent::getLinkedFromService() as $service) {
                $linkedServices[] = Client::getInstance()->services()->find($service->from_service);
            }
        }
        return $linkedServices;
    }

    /**
     * @return Service[]
     */
    public function getLinkedToService(){
        $linkedServices = [];
        if(count(parent::getLinkedToService())){
            foreach(parent::getLinkedToService() as $service){
                $linkedServices[] = Client::getInstance()->services()->find($service->to_service);
            }
        }
        return $linkedServices;
    }

    /**
     * @return Service[]
     */
    public function getLinkedToExternalService(){
        $linkedServices = [];
        if(count(parent::getLinkedToExternalService())) {
            foreach (parent::getLinkedToExternalService() as $service) {
                $linkedServices[] = Client::getInstance()->services()->find($service->to_service);
            }
        }
        return $linkedServices;
    }

    public function __toArray(){
        $ports = [];
        if($this->getContainerPorts()) {
            foreach ($this->getContainerPorts() as $port) {
                $ports[] = $port->getOuterPort() . ":" . $port->getInnerPort();
            }
        }
        return [
            'name' => $this->getName(),
            'image' => $this->getImageName(),
            'ports' => $ports,
            'target_num_containers' => $this->getTargetNumContainers(),
            'restart' => strtolower(str_replace("_", "-", $this->getAutorestart())),
            'autoredeploy' => $this->getAutoredeploy(),
            'autodestroy' => $this->getAutodestroy(),
            'deployment_strategy' => $this->getDeploymentStrategy()
        ];
    }

    public function start(){
        Client::getInstance()->services()->startService($this->getUuid());
        return $this;
    }

    public function stop(){
        Client::getInstance()->services()->stopService($this->getUuid());
        return $this;
    }

    public function scale(){
        // TODO: make this accept an argument for target_num_containers
        Client::getInstance()->services()->scaleService($this->getUuid());
        return $this;
    }

    public function redeploy(){
        Client::getInstance()->services()->redeployService($this->getUuid());
        return $this;
    }

    public function terminate(){
        Client::getInstance()->services()->terminateService($this->getUuid());
        return $this;
    }


}