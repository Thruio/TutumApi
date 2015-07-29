<?php
namespace Status\TutumApi\Services;
use Status\TutumApi\Models;

class Service extends BaseApi
{

    public function index(){
        $responses = $this->getClient()->makeRequest("GET", "/api/v1/service/");
        //$this->generateGettersSetters(end($responses->objects));
        $services = [];
        foreach($responses->objects as $response){
            $service = $this->getServiceFromResponse($response);
            $services[] = $service;
        }
        return $services;
    }

    public function find($uuid, Models\Service & $service = null){
        $response = $this->getClient()->makeRequest("GET", "/api/v1/service/{$uuid}/");
        $service = $this->getServiceFromResponse($response, $service);
        return $service;
    }

    public function getServiceFromResponse($response, Models\Service $service = null){
        if($service === null) {
            $service = new Models\Service();
        }
        $service->setAutodestroy($response->autodestroy);
        $service->setAutoredeploy($response->autoredeploy);
        $service->setAutorestart($response->autorestart);
        $service->setBindings(isset($response->bindings)?$response->bindings:null);
        $service->setCalculatedEnvvars(isset($response->calculated_envvars)?$response->calculated_envvars:null);
        $service->setContainerEnvvars(isset($response->container_envvars)?$response->container_envvars:null);
        $service->setContainerPorts($response->container_ports);
        $service->setContainers(isset($response->containers)?$response->containers:null);
        $service->setCpuShares($response->cpu_shares);
        $service->setCurrentNumContainers($response->current_num_containers);
        $service->setDeployedDatetime($response->deployed_datetime);
        $service->setDeploymentStrategy($response->deployment_strategy);
        $service->setDestroyedDatetime($response->destroyed_datetime);
        $service->setEntrypoint($response->entrypoint);
        $service->setImageName($response->image_name);
        $service->setImageTag($response->image_tag);
        $service->setLinkVariables(isset($response->link_variables)?$response->link_variables:null);
        $service->setLinkedFromService(isset($response->linked_from_service)?$response->linked_from_service:null);
        $service->setMemory($response->memory);
        $service->setName($response->name);
        $service->setNetwork(isset($response->network)?$response->network:null);
        $service->setPid($response->pid);
        $service->setPrivileged($response->privileged);
        $service->setPublicDns($response->public_dns);
        $service->setResourceUri($response->resource_uri);
        $service->setRunCommand($response->run_command);
        $service->setRunningNumContainers($response->running_num_containers);
        $service->setSequentialDeployment($response->sequential_deployment);
        $service->setStack($response->stack);
        $service->setStartedDatetime($response->started_datetime);
        $service->setState($response->state);
        $service->setStoppedDatetime($response->stopped_datetime);
        $service->setStoppedNumContainers($response->stopped_num_containers);
        $service->setSynchronized($response->synchronized);
        $service->setTargetNumContainers($response->target_num_containers);
        $service->setUuid($response->uuid);
        $service->setWorkingDir($response->working_dir);
        return $service;
    }
}