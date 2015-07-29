<?php
namespace Thru\TutumApi\Services;
use Thru\TutumApi\Models;

class Stack extends BaseApi
{

    public function index(){
        $responses = $this->getClient()->makeRequest("GET", "/api/v1/stack/");
        #$this->generateGettersSetters(end($responses->objects));
        $stacks = [];
        foreach($responses->objects as $response){
            $stack = $this->getStackFromResponse($response);
            $stacks[] = $stack;
        }
        return $stacks;
    }

    public function find($uuid, Models\Stack & $stack = null){
        $response = $this->getClient()->makeRequest("GET", "/api/v1/stack/{$uuid}/");
        $stack = $this->getStackFromResponse($response, $stack);
        return $stack;
    }

    public function getStackFromResponse($response, Models\Stack $stack = null){
        if($stack === null) {
            $stack = new Models\Stack();
        }

        $stack->setDeployedDatetime($response->deployed_datetime);
        $stack->setDestroyedDatetime($response->destroyed_datetime);
        $stack->setName($response->name);
        $stack->setResourceUri($response->resource_uri);
        $stack->setServices($response->services);
        $stack->setState($response->state);
        $stack->setSynchronized($response->synchronized);
        $stack->setUuid($response->uuid);

        return $stack;
    }
}