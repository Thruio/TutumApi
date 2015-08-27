<?php
namespace Thru\TutumApi\Models;


use Thru\TutumApi\Client;

class Stack extends BaseStack
{
    /**
     * @return Service[]
     * @throws \Exception
     */
    public function getServices(){
        $services = [];
        foreach(parent::getServices() as $serviceUri){
            $serviceUUID = str_replace("api/v1/service/", "", trim($serviceUri,"/"));
            $services[] = Client::getInstance()->services()->find($serviceUUID);
        }
        return $services;
    }

    public function addService(Service $service){
        $services = [];
        foreach(Client::getInstance()->stacks()->export($this->getUuid()) as $name => $serviceRunning){
            $serviceRunning->name = $name;
            $services[$name] = (array)$serviceRunning;
        }
        $newServiceArray = $service->__toArray();
        $services[$newServiceArray['name']] = $newServiceArray;
        return Client::getInstance()->stacks()->import($this->getUuid(), array_values($services));
    }
}