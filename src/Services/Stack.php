<?php
namespace Thru\TutumApi\Services;
use Thru\TutumApi\Models;

class Stack extends BaseApi
{

    public function index(){
        $responses = $this->getClient()->makeRequest("GET", "/api/v1/stack/");
        $this->generateGettersSetters(end($responses->objects));
        $services = [];
        foreach($responses->objects as $response){
            $service = $this->getServiceFromResponse($response);
            $services[] = $service;
        }
        return $services;
    }

    public function find($uuid, Models\Stack & $service = null){
        $response = $this->getClient()->makeRequest("GET", "/api/v1/stack/{$uuid}/");
        $stack = $this->getStackFromResponse($response, $service);
        return $stack;
    }

    public function getStackFromResponse($response, Models\Service $service = null){
        // TODO
    }
}