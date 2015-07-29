<?php
namespace Status\TutumApi\Services;
use Status\TutumApi\Models;

class Container extends BaseApi
{

    public function find($uuid, Models\Container & $container = null){
        $response = $this->getClient()->makeRequest("GET", "/api/v1/container/{$uuid}/");
        $container = $this->getContainerFromResponse($response, $container);
        return $container;
    }

    public function getContainerFromResponse($response, Models\Container $container = null){
        if($container === null) {
            $container = new Models\Container();
        }
        
        $container->setAutodestroy($response->autodestroy);
        $container->setAutorestart($response->autorestart);
        $container->setBindings($response->bindings);
        $container->setContainerEnvvars($response->container_envvars);
        $container->setContainerPorts($response->container_ports);
        $container->setCpuShares($response->cpu_shares);
        $container->setDeployedDatetime($response->deployed_datetime);
        $container->setDestroyedDatetime($response->destroyed_datetime);
        $container->setDockerId($response->docker_id);
        $container->setEntrypoint($response->entrypoint);
        $container->setExitCode($response->exit_code);
        $container->setExitCodeMsg($response->exit_code_msg);
        $container->setImageName($response->image_name);
        $container->setImageTag($response->image_tag);
        $container->setLastMetric($response->last_metric);
        $container->setLayer($response->layer);
        $container->setLinkVariables($response->link_variables);
        $container->setLinkedToContainer($response->linked_to_container);
        $container->setMemory($response->memory);
        $container->setName($response->name);
        $container->setNet($response->net);
        $container->setNode($response->node);
        $container->setPid($response->pid);
        $container->setPrivateIp($response->private_ip);
        $container->setPrivileged($response->privileged);
        $container->setPublicDns($response->public_dns);
        $container->setResourceUri($response->resource_uri);
        $container->setRoles($response->roles);
        $container->setRunCommand($response->run_command);
        $container->setService($response->service);
        $container->setStartedDatetime($response->started_datetime);
        $container->setState($response->state);
        $container->setStoppedDatetime($response->stopped_datetime);
        $container->setSynchronized($response->synchronized);
        $container->setUuid($response->uuid);
        $container->setWorkingDir($response->working_dir);
        return $container;
    }
}