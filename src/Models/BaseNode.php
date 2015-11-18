<?php
namespace Thru\TutumApi\Models;

use Thru\TutumApi\Client;

class BaseNode extends Model
{
    protected $availabilityZone;
    protected $cpu;
    protected $currentNumContainers;
    protected $deployedDatetime;
    protected $destroyedDatetime;
    protected $disk;
    protected $dockerExecdriver;
    protected $dockerGraphdriver;
    protected $dockerVersion;
    protected $externalFqdn;
    protected $lastMetric;
    protected $lastSeen;
    protected $memory;
    protected $nodeCluster;
    protected $nodeType;
    protected $publicIp;
    protected $region;
    protected $resourceUri;
    protected $state;
    protected $tunnel;
    protected $uuid;

    public function getAvailabilityZone()
    {
        return $this->availabilityZone;
    }

    public function setAvailabilityZone($availabilityZone)
    {
        $this->availabilityZone = $availabilityZone;
    }

    public function getCpu()
    {
        return $this->cpu;
    }

    public function setCpu($cpu)
    {
        $this->cpu = $cpu;
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

    public function getDestroyedDatetime()
    {
        return $this->destroyedDatetime;
    }

    public function setDestroyedDatetime($destroyedDatetime)
    {
        $this->destroyedDatetime = $destroyedDatetime;
    }

    public function getDisk()
    {
        return $this->disk;
    }

    public function setDisk($disk)
    {
        $this->disk = $disk;
    }

    public function getDockerExecdriver()
    {
        return $this->dockerExecdriver;
    }

    public function setDockerExecdriver($dockerExecdriver)
    {
        $this->dockerExecdriver = $dockerExecdriver;
    }

    public function getDockerGraphdriver()
    {
        return $this->dockerGraphdriver;
    }

    public function setDockerGraphdriver($dockerGraphdriver)
    {
        $this->dockerGraphdriver = $dockerGraphdriver;
    }

    public function getDockerVersion()
    {
        return $this->dockerVersion;
    }

    public function setDockerVersion($dockerVersion)
    {
        $this->dockerVersion = $dockerVersion;
    }

    public function getExternalFqdn()
    {
        return $this->externalFqdn;
    }

    public function setExternalFqdn($externalFqdn)
    {
        $this->externalFqdn = $externalFqdn;
    }

    public function getLastMetric()
    {
        return $this->lastMetric;
    }

    public function setLastMetric($lastMetric)
    {
        $this->lastMetric = $lastMetric;
    }

    public function getLastSeen()
    {
        return $this->lastSeen;
    }

    public function setLastSeen($lastSeen)
    {
        $this->lastSeen = $lastSeen;
    }

    public function getMemory()
    {
        return $this->memory;
    }

    public function setMemory($memory)
    {
        $this->memory = $memory;
    }

    public function getNodeCluster()
    {
        return $this->nodeCluster;
    }

    public function setNodeCluster($nodeCluster)
    {
        $this->nodeCluster = $nodeCluster;
    }

    public function getNodeType()
    {
        return $this->nodeType;
    }

    public function setNodeType($nodeType)
    {
        $this->nodeType = $nodeType;
    }

    public function getPublicIp()
    {
        return $this->publicIp;
    }

    public function setPublicIp($publicIp)
    {
        $this->publicIp = $publicIp;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function setRegion($region)
    {
        $this->region = $region;
    }

    public function getResourceUri()
    {
        return $this->resourceUri;
    }

    public function setResourceUri($resourceUri)
    {
        $this->resourceUri = $resourceUri;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    public function getTunnel()
    {
        return $this->tunnel;
    }

    public function setTunnel($tunnel)
    {
        $this->tunnel = $tunnel;
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
    }
}
