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
}