<?php
namespace Thru\TutumApi\Models;

use Thru\TutumApi\Client;

class BaseContainer extends Model
{
    protected $autodestroy;
    protected $autorestart;
    protected $bindings;
    protected $containerEnvvars;
    protected $containerPorts;
    protected $cpuShares;
    protected $deployedDatetime;
    protected $destroyedDatetime;
    protected $dockerId;
    protected $entrypoint;
    protected $exitCode;
    protected $exitCodeMsg;
    protected $imageName;
    protected $imageTag;
    protected $lastMetric;
    protected $layer;
    protected $linkVariables;
    protected $linkedToContainer;
    protected $memory;
    protected $name;
    protected $net;
    protected $node;
    protected $pid;
    protected $privateIp;
    protected $privileged;
    protected $publicDns;
    protected $resourceUri;
    protected $roles;
    protected $runCommand;
    protected $service;
    protected $startedDatetime;
    protected $state;
    protected $stoppedDatetime;
    protected $synchronized;
    protected $uuid;
    protected $workingDir;

    public function getAutodestroy(){
        return $this->autodestroy;
    }

    public function setAutodestroy($autodestroy){
        $this->autodestroy = $autodestroy;
    }

    public function getAutorestart(){
        return $this->autorestart;
    }

    public function setAutorestart($autorestart){
        $this->autorestart = $autorestart;
    }

    public function getBindings(){
        return $this->bindings;
    }

    public function setBindings($bindings){
        $this->bindings = $bindings;
    }

    public function getContainerEnvvars(){
        return $this->containerEnvvars;
    }

    public function setContainerEnvvars($containerEnvvars){
        $this->containerEnvvars = $containerEnvvars;
    }

    public function getContainerPorts(){
        return $this->containerPorts;
    }

    public function setContainerPorts($containerPorts){
        $this->containerPorts = $containerPorts;
    }

    public function getCpuShares(){
        return $this->cpuShares;
    }

    public function setCpuShares($cpuShares){
        $this->cpuShares = $cpuShares;
    }

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

    public function getDockerId(){
        return $this->dockerId;
    }

    public function setDockerId($dockerId){
        $this->dockerId = $dockerId;
    }

    public function getEntrypoint(){
        return $this->entrypoint;
    }

    public function setEntrypoint($entrypoint){
        $this->entrypoint = $entrypoint;
    }

    public function getExitCode(){
        return $this->exitCode;
    }

    public function setExitCode($exitCode){
        $this->exitCode = $exitCode;
    }

    public function getExitCodeMsg(){
        return $this->exitCodeMsg;
    }

    public function setExitCodeMsg($exitCodeMsg){
        $this->exitCodeMsg = $exitCodeMsg;
    }

    public function getImageName(){
        return $this->imageName;
    }

    public function setImageName($imageName){
        $this->imageName = $imageName;
    }

    public function getImageTag(){
        return $this->imageTag;
    }

    public function setImageTag($imageTag){
        $this->imageTag = $imageTag;
    }

    public function getLastMetric(){
        return $this->lastMetric;
    }

    public function setLastMetric($lastMetric){
        $this->lastMetric = $lastMetric;
    }

    public function getLayer(){
        return $this->layer;
    }

    public function setLayer($layer){
        $this->layer = $layer;
    }

    public function getLinkVariables(){
        return $this->linkVariables;
    }

    public function setLinkVariables($linkVariables){
        $this->linkVariables = $linkVariables;
    }

    public function getLinkedToContainer(){
        return $this->linkedToContainer;
    }

    public function setLinkedToContainer($linkedToContainer){
        $this->linkedToContainer = $linkedToContainer;
    }

    public function getMemory(){
        return $this->memory;
    }

    public function setMemory($memory){
        $this->memory = $memory;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getNet(){
        return $this->net;
    }

    public function setNet($net){
        $this->net = $net;
    }

    public function getNode(){
        return $this->node;
    }

    public function setNode($node){
        $this->node = $node;
    }

    public function getPid(){
        return $this->pid;
    }

    public function setPid($pid){
        $this->pid = $pid;
    }

    public function getPrivateIp(){
        return $this->privateIp;
    }

    public function setPrivateIp($privateIp){
        $this->privateIp = $privateIp;
    }

    public function getPrivileged(){
        return $this->privileged;
    }

    public function setPrivileged($privileged){
        $this->privileged = $privileged;
    }

    public function getPublicDns(){
        return $this->publicDns;
    }

    public function setPublicDns($publicDns){
        $this->publicDns = $publicDns;
    }

    public function getResourceUri(){
        return $this->resourceUri;
    }

    public function setResourceUri($resourceUri){
        $this->resourceUri = $resourceUri;
    }

    public function getRoles(){
        return $this->roles;
    }

    public function setRoles($roles){
        $this->roles = $roles;
    }

    public function getRunCommand(){
        return $this->runCommand;
    }

    public function setRunCommand($runCommand){
        $this->runCommand = $runCommand;
    }

    public function getService(){
        return $this->service;
    }

    public function setService($service){
        $this->service = $service;
    }

    public function getStartedDatetime(){
        return $this->startedDatetime;
    }

    public function setStartedDatetime($startedDatetime){
        $this->startedDatetime = $startedDatetime;
    }

    public function getState(){
        return $this->state;
    }

    public function setState($state){
        $this->state = $state;
    }

    public function getStoppedDatetime(){
        return $this->stoppedDatetime;
    }

    public function setStoppedDatetime($stoppedDatetime){
        $this->stoppedDatetime = $stoppedDatetime;
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

    public function getWorkingDir(){
        return $this->workingDir;
    }

    public function setWorkingDir($workingDir){
        $this->workingDir = $workingDir;
    }
}