<?php
namespace Thru\TutumApi\Models;

use Thru\TutumApi\Client;

class Stack extends BaseStack
{
    /**
     * @return Service[]
     * @throws \Exception
     */
    public function getServices()
    {
        $services = [];
        foreach (parent::getServices() as $serviceUri) {
            $serviceUUID = str_replace("api/v1/service/", "", trim($serviceUri, "/"));
            $services[] = Client::getInstance()->services()->find($serviceUUID);
        }
        return $services;
    }

    public function addService(Service $service)
    {
        $services = [];
        foreach (Client::getInstance()->stacks()->export($this->getUuid()) as $name => $serviceRunning) {
            $serviceRunning->name = $name;
            $services[$name] = (array)$serviceRunning;
        }
        $newServiceArray = $service->__toArray();
        $services[$newServiceArray['name']] = $newServiceArray;

        $result = Client::getInstance()->stacks()->import($this->getUuid(), array_values($services));

        return $result;
    }

    public function start()
    {
        return Client::getInstance()->stacks()->start($this->getUuid());
    }

    public function stop()
    {
        return Client::getInstance()->stacks()->stop($this->getUuid());
    }

    public function terminate()
    {
        return Client::getInstance()->stacks()->terminate($this->getUuid());
    }
    
    public function redeploy()
    {
        return Client::getInstance()->stacks()->terminate($this->getUuid());
    }
}
