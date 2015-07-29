<?php
namespace Status\TutumApi\Models;

class Port
{

    protected $endpoint;
    protected $innerPort;
    protected $outerPort;
    protected $portName;
    protected $protocol;
    protected $isPublished;

    public function getEndpoint(){
        return $this->endpoint;
    }

    public function setEndpoint($endpoint){
        $this->endpoint = $endpoint;
    }

    public function getInnerPort(){
        return $this->innerPort;
    }

    public function setInnerPort($innerPort){
        $this->innerPort = $innerPort;
    }

    public function getOuterPort(){
        return $this->outerPort;
    }

    public function setOuterPort($outerPort){
        $this->outerPort = $outerPort;
    }

    public function getPortName(){
        return $this->portName;
    }

    public function setPortName($portName){
        $this->portName = $portName;
    }

    public function getProtocol(){
        return $this->protocol;
    }

    public function setProtocol($protocol){
        $this->protocol = $protocol;
    }

    protected function getIsPublished(){
        return $this->isPublished;
    }

    public function setIsPublished($isPublished){
        $this->isPublished = $isPublished;
    }

    public function isPublished(){
        return $this->getIsPublished()===true?true:false;
    }

}