<?php
namespace Thru\TutumApi\Services;
use Thru\TutumApi\Models;

class Stack extends BaseApi
{
    public function create($name){
        $responses = $this->getClient()->makeRequest(
          "POST",
          "/api/v1/stack/",
          [
            'body' => json_encode([
                'name' => $name,
            ], JSON_PRETTY_PRINT)
          ]
        );
        return self::find($responses->uuid);
    }

    /**
     * @return Models\Stack[]
     * @throws \Exception
     */
    public function index(){
        $responses = $this->getClient()->makeRequest("GET", "/api/v1/stack/");
        #$this->generateGettersSetters(end($responses->objects));
        $stacks = [];

        if(count($responses->objects) > 0) {
            foreach ($responses->objects as $response) {
                $stack = $this->getStackFromResponse($response);
                $stacks[] = $stack;
            }
        }
        return $stacks;
    }

    public function export($uuid){
        $response = $this->getClient()->makeRequest("GET", "/api/v1/stack/{$uuid}/export");
        return $response;
    }

    public function import($uuid, $services){
        $body = json_encode([
          'services' => $services,
        ], JSON_PRETTY_PRINT);
        $headers = [
          'Content-Type' => 'application/json'
        ];
        \Kint::dump($uuid, $body, $headers);
        $response = $this->getClient()->makeRequest(
            "PATCH",
            "/api/v1/stack/{$uuid}/",
            [
                'body' => $body,
                'headers' => $headers
            ]
        );
        return $this->getStackFromResponse($response);
    }

    /**
     * @param $uuid
     * @param Models\Stack|null $stack
     * @return Models\Stack
     * @throws \Exception
     */
    public function find($uuid, Models\Stack & $stack = null){
        $response = $this->getClient()->makeRequest("GET", "/api/v1/stack/{$uuid}/");
        $stack = $this->getStackFromResponse($response, $stack);
        return $stack;
    }

    /**
     * @param $name
     * @return false|Models\Stack
     */
    public function findByName($name){
        $stacks = $this->index();
        foreach($stacks as $stack){
            if($stack->getName() == $name && $stack->getState() != "Terminated"){
                return $stack;
            }
        }
        return false;
    }

    public function getStackFromResponse($response, Models\Stack &$stack = null){
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