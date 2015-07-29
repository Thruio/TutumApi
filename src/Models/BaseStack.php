<?php
namespace Thru\TutumApi\Models;

use Thru\TutumApi\Client;

class BaseStack extends Model
{
    protected $deployedDatetime;
    protected $destroyedDatetime;
    protected $name;
    protected $resourceUri;
    protected $services;
    protected $state;
    protected $synchronized;
    protected $uuid;

    public function getDeployedDatetime(){
        return $this->deployedDatetime;
    }

    public function setDeployedDatetime($deployedDatetime){
        $this->deployedDatetime = $deployedDatetime;
    }

    public function getDestroyedDatetime(){
        return $this->destroyedDatetime;
    }

    public function setDestroyedDatetime($destroyedDatetime){
        $this->destroyedDatetime = $destroyedDatetime;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getResourceUri(){
        return $this->resourceUri;
    }

    public function setResourceUri($resourceUri){
        $this->resourceUri = $resourceUri;
    }

    public function getServices(){
        return $this->services;
    }

    public function setServices($services){
        $this->services = $services;
    }

    public function getState(){
        return $this->state;
    }

    public function setState($state){
        $this->state = $state;
    }

    public function getSynchronized(){
        return $this->synchronized;
    }

    public function setSynchronized($synchronized){
        $this->synchronized = $synchronized;
    }

    public function getUuid(){
        return $this->uuid;
    }

    public function setUuid($uuid){
        $this->uuid = $uuid;
    }

    public function reload(){
        Client::getInstance()->stacks()->find($this->getUuid(), $this);
    }
}