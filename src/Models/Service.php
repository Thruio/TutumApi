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
}