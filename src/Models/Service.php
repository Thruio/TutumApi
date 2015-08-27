<?php
namespace Thru\TutumApi\Models;

use Thru\TutumApi\Client;

class Service extends BaseService
{

    public function setContainerPorts($ports){
        $portArray = [];
        /** @var Port $port */
        foreach($ports as $i => $port){
            if($port instanceof Port) {
                $portArray[$i]['endpoint'] = $port->getEndpoint();
                $portArray[$i]['innerPort'] = $port->getInnerPort();
                $portArray[$i]['outerPort'] = $port->getOuterPort();
                $portArray[$i]['portName'] = $port->getPortName();
                $portArray[$i]['protocol'] = $port->getProtocol();
                $portArray[$i]['isPublished'] = $port->isPublished();
            }else{
                $portArray[$i]['endpoint'] = $port->endpoint_uri;
                $portArray[$i]['innerPort'] = $port->inner_port;
                $portArray[$i]['outerPort'] = $port->outer_port;
                $portArray[$i]['portName'] = $port->port_name;
                $portArray[$i]['protocol'] = $port->protocol;
                $portArray[$i]['isPublished'] = $port->published;
            }
        }
        return parent::setContainerPorts($portArray);
    }
    /**
     * @return Port[]
     */
    public function getContainerPorts()
    {
        $ports = [];
        if (parent::getContainerPorts()) {
            foreach (parent::getContainerPorts() as $containerPort) {
                $containerPort = (array)$containerPort;
                $port = new Port();
                if (isset($containerPort['endpoint'])) {
                    $port->setEndpoint($containerPort['endpoint']);
                }
                if (isset($containerPort['innerPort'])) {
                    $port->setInnerPort($containerPort['innerPort']);
                }
                if (isset($containerPort['outerPort'])) {
                    $port->setOuterPort($containerPort['outerPort']);
                }
                if (isset($containerPort['portName'])) {
                    $port->setPortName($containerPort['portName']);
                }
                if (isset($containerPort['protocol'])) {
                    $port->setProtocol($containerPort['protocol']);
                }
                if (isset($containerPort['isPublished'])) {
                    $port->setIsPublished($containerPort['isPublished']);
                }
                $ports[] = $port;
            }
        }

        return $ports;
    }

    /**
     * @return Container[]
     * @throws \Exception
     */
    public function getContainers()
    {
        if (empty($this->containers)) {
            $this->reload();
        }
        $containers = [];
        foreach (parent::getContainers() as $containerUri) {
            $containers[] = Client::getInstance()->containers()->find(str_replace("api/v1/container/", "",
              trim($containerUri, "/")));
        }

        return $containers;
    }

    /**
     * @return Service[]
     */
    public function getLinkedFromService()
    {
        $linkedServices = [];
        if (count(parent::getLinkedFromService())) {
            foreach (parent::getLinkedFromService() as $service) {
                $linkedServices[] = Client::getInstance()->services()->find($service->from_service);
            }
        }

        return $linkedServices;
    }

    /**
     * @return Service[]
     */
    public function getLinkedToService()
    {
        $linkedServices = [];
        if (count(parent::getLinkedToService())) {
            foreach (parent::getLinkedToService() as $service) {
                $linkedServices[] = Client::getInstance()->services()->find($service->to_service);
            }
        }

        return $linkedServices;
    }

    /**
     * @return Service[]
     */
    public function getLinkedToExternalService()
    {
        $linkedServices = [];
        if (count(parent::getLinkedToExternalService())) {
            foreach (parent::getLinkedToExternalService() as $service) {
                $linkedServices[] = Client::getInstance()->services()->find($service->to_service);
            }
        }

        return $linkedServices;
    }

    public function __toArray()
    {
        $ports = [];
        if ($this->getContainerPorts()) {
            foreach ($this->getContainerPorts() as $port) {
                $portArray = [];
                $portArray['inner_port'] = $port->getInnerPort();
                if ($port->getOuterPort()) {
                    $portArray['outer_port'] = $port->getInnerPort();
                }
                if ($port->getProtocol()){
                    $portArray['protocol'] = $port->getProtocol();
                }else{
                    $portArray['protocol'] = 'tcp';
                }
                if ($port->isPublished()){

                }
                $ports[] = $portArray;
            }
        }

        return [
          'name' => $this->getName(),
          'image' => $this->getImageName(),
          'container_ports' => $ports,
          'target_num_containers' => $this->getTargetNumContainers(),
          'restart' => strtolower(str_replace("_", "-", $this->getAutorestart())),
          'autoredeploy' => $this->getAutoredeploy(),
          'autodestroy' => $this->getAutodestroy(),
          'deployment_strategy' => $this->getDeploymentStrategy(),
          'tags' => [['name' => 'cminfra']],
        ];
    }

    /**
     * @return Service
     * @throws \Exception
     */
    public function start()
    {
        $service = Client::getInstance()->services()->startService($this->getUuid());

        return $service;
    }

    /**
     * @return Service
     * @throws \Exception
     */
    public function stop()
    {
        $service = Client::getInstance()->services()->stopService($this->getUuid());

        return $service;
    }

    /**
     * @return Service
     * @throws \Exception
     */
    public function scale()
    {
        // TODO: make this accept an argument for target_num_containers
        $service = Client::getInstance()->services()->scaleService($this->getUuid());

        return $service;
    }

    /**
     * @return Service
     * @throws \Exception
     */
    public function redeploy()
    {
        $service = Client::getInstance()->services()->redeployService($this->getUuid());

        return $service;
    }

    /**
     * @return Service
     * @throws \Exception
     */
    public function terminate()
    {
        $service = Client::getInstance()->services()->terminateService($this->getUuid());

        return $service;
    }


}