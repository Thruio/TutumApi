<?php
namespace Thru\TutumApi\Models;

use Thru\TutumApi\Client;
use Thru\TutumApi\Services\Service;

class BaseService extends Model
{
    protected $autodestroy = "OFF";
    protected $autoredeploy = false;
    protected $autorestart = "ON_FAILURE";
    protected $bindings;
    protected $calculatedEnvvars;
    protected $containerEnvvars;
    protected $containerPorts;
    protected $containers;
    protected $cpuShares;
    protected $currentNumContainers;
    protected $deployedDatetime;
    protected $deploymentStrategy = "EMPTIEST_NODE";
    protected $destroyedDatetime;
    protected $entrypoint;
    protected $imageName;
    protected $imageTag;
    protected $linkVariables;
    protected $linkedFromService;
    protected $linkedToExternalService;
    protected $linkedToService;
    protected $memory;
    protected $name;
    protected $net;
    protected $network;
    protected $pid;
    protected $privileged;
    protected $publicDns;
    protected $resourceUri;
    protected $roles;
    protected $runCommand;
    protected $runningNumContainers;
    protected $sequentialDeployment;
    protected $stack;
    protected $startedDatetime;
    protected $state;
    protected $stoppedDatetime;
    protected $stoppedNumContainers;
    protected $synchronized;
    protected $tags;
    protected $targetNumContainers = 1;
    protected $uuid;
    protected $workingDir;

    public function getAutodestroy()
    {
        return $this->autodestroy;
    }

    public function setAutodestroy($autodestroy)
    {
        $this->autodestroy = $autodestroy;
    }

    public function getAutoredeploy()
    {
        return $this->autoredeploy;
    }

    public function setAutoredeploy($autoredeploy)
    {
        $this->autoredeploy = $autoredeploy;
    }

    public function getAutorestart()
    {
        return $this->autorestart;
    }

    public function setAutorestart($autorestart)
    {
        $this->autorestart = $autorestart;
    }

    public function getContainerPorts()
    {
        return $this->containerPorts;
    }

    public function setContainerPorts($containerPorts)
    {
        $this->containerPorts = $containerPorts;
    }

    public function getCpuShares()
    {
        return $this->cpuShares;
    }

    public function setCpuShares($cpuShares)
    {
        $this->cpuShares = $cpuShares;
    }

    public function getCurrentNumContainers()
    {
        return $this->currentNumContainers;
    }

    public function setCurrentNumContainers($currentNumContainers)
    {
        $this->currentNumContainers = $currentNumContainers;
    }

    public function getDeployedDatetime()
    {
        return $this->deployedDatetime;
    }

    public function setDeployedDatetime($deployedDatetime)
    {
        $this->deployedDatetime = $deployedDatetime;
    }

    public function getDeploymentStrategy()
    {
        return $this->deploymentStrategy;
    }

    public function setDeploymentStrategy($deploymentStrategy)
    {
        $this->deploymentStrategy = $deploymentStrategy;
    }

    public function getDestroyedDatetime()
    {
        return $this->destroyedDatetime;
    }

    public function setDestroyedDatetime($destroyedDatetime)
    {
        $this->destroyedDatetime = $destroyedDatetime;
    }

    public function getEntrypoint()
    {
        return $this->entrypoint;
    }

    public function setEntrypoint($entrypoint)
    {
        $this->entrypoint = $entrypoint;
    }

    public function getImageName()
    {
        return $this->imageName;
    }

    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
    }

    public function getImageTag()
    {
        return $this->imageTag;
    }

    public function setImageTag($imageTag)
    {
        $this->imageTag = $imageTag;
    }

    public function getMemory()
    {
        return $this->memory;
    }

    public function setMemory($memory)
    {
        $this->memory = $memory;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getNetwork()
    {
        return $this->network;
    }

    public function setNetwork($network)
    {
        $this->network = $network;
    }

    public function getPid()
    {
        return $this->pid;
    }

    public function setPid($pid)
    {
        $this->pid = $pid;
    }

    public function getPrivileged()
    {
        return $this->privileged;
    }

    public function setPrivileged($privileged)
    {
        $this->privileged = $privileged;
    }

    public function getPublicDns()
    {
        return $this->publicDns;
    }

    public function setPublicDns($publicDns)
    {
        $this->publicDns = $publicDns;
    }

    public function getResourceUri()
    {
        return $this->resourceUri;
    }

    public function setResourceUri($resourceUri)
    {
        $this->resourceUri = $resourceUri;
    }

    public function getRunCommand()
    {
        return $this->runCommand;
    }

    public function setRunCommand($runCommand)
    {
        $this->runCommand = $runCommand;
    }

    public function getRunningNumContainers()
    {
        return $this->runningNumContainers;
    }

    public function setRunningNumContainers($runningNumContainers)
    {
        $this->runningNumContainers = $runningNumContainers;
    }

    public function getSequentialDeployment()
    {
        return $this->sequentialDeployment;
    }

    public function setSequentialDeployment($sequentialDeployment)
    {
        $this->sequentialDeployment = $sequentialDeployment;
    }

    public function getStack()
    {
        return $this->stack;
    }

    public function setStack($stack)
    {
        $this->stack = $stack;
    }

    public function getStartedDatetime()
    {
        return $this->startedDatetime;
    }

    public function setStartedDatetime($startedDatetime)
    {
        $this->startedDatetime = $startedDatetime;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getStoppedDatetime()
    {
        return $this->stoppedDatetime;
    }

    public function setStoppedDatetime($stoppedDatetime)
    {
        $this->stoppedDatetime = $stoppedDatetime;
    }

    public function getStoppedNumContainers()
    {
        return $this->stoppedNumContainers;
    }

    public function setStoppedNumContainers($stoppedNumContainers)
    {
        $this->stoppedNumContainers = $stoppedNumContainers;
    }

    public function getSynchronized()
    {
        return $this->synchronized;
    }

    public function setSynchronized($synchronized)
    {
        $this->synchronized = $synchronized;
    }

    public function getTargetNumContainers()
    {
        return $this->targetNumContainers;
    }

    public function setTargetNumContainers($targetNumContainers)
    {
        $this->targetNumContainers = $targetNumContainers;
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
    }

    public function getWorkingDir()
    {
        return $this->workingDir;
    }

    public function setWorkingDir($workingDir)
    {
        $this->workingDir = $workingDir;
    }

    public function getBindings()
    {
        if (!isset($this->bindings)) {
            $this->reload();
        }
        return $this->bindings;
    }

    public function setBindings($bindings)
    {
        $this->bindings = $bindings;
    }

    public function getCalculatedEnvvars()
    {
        if (!isset($this->calculatedEnvvars)) {
            $this->reload();
        }
        return $this->calculatedEnvvars;
    }

    public function setCalculatedEnvvars($calculatedEnvvars)
    {
        $this->calculatedEnvvars = $calculatedEnvvars;
    }

    public function getContainerEnvvars()
    {
        if (!isset($this->containerEnvvars)) {
            $this->reload();
        }
        return $this->containerEnvvars;
    }

    public function setContainerEnvvars($containerEnvvars)
    {
        $this->containerEnvvars = $containerEnvvars;
    }

    public function getLinkVariables()
    {
        if (!isset($this->linkVariables)) {
            $this->reload();
        }
        return $this->linkVariables;
    }

    public function setLinkVariables($linkVariables)
    {
        $this->linkVariables = $linkVariables;
    }

    public function getLinkedFromService()
    {
        if (!isset($this->linkedFromService)) {
            $this->reload();
        }
        return $this->linkedFromService;
    }

    public function setLinkedFromService($linkedFromService)
    {
        $this->linkedFromService = $linkedFromService;
    }

    public function getLinkedToExternalService()
    {
        if (!isset($this->linkedToExternalService)) {
            $this->reload();
        }
        return $this->linkedToExternalService;
    }

    public function setLinkedToExternalService($linkedToExternalService)
    {
        $this->linkedToExternalService = $linkedToExternalService;
    }

    public function getLinkedToService()
    {
        if (!isset($this->linkedToService)) {
            $this->reload();
        }
        return $this->linkedToService;
    }

    public function setLinkedToService($linkedToService)
    {
        $this->linkedToService = $linkedToService;
    }


    public function getNet()
    {
        if (!isset($this->net)) {
            $this->reload();
        }
        return $this->net;
    }

    public function setNet($net)
    {
        $this->net = $net;
    }

    public function getRoles()
    {
        if (!isset($this->roles)) {
            $this->reload();
        }
        return $this->roles;
    }

    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    public function getTags()
    {
        if (!isset($this->tags)) {
            $this->reload();
        }
        return $this->tags;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    public function getContainers()
    {
        return $this->containers;
    }

    public function setContainers($containers)
    {
        $this->containers = $containers;
    }

    public function reload()
    {
        if ($this->getUuid()) {
            Client::getInstance()->services()->find($this->getUuid(), $this);
        }
    }

    public function linkTo(\Thru\TutumApi\Models\Service $service, $alias = null)
    {
        $link = new \StdClass();
        $link->to_service = $service->name;
        $link->name = $alias?$alias:$service->name;
        $this->linkedToService[] = $link;
        return $this;
    }
}
