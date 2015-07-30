<?php
namespace Thru\TutumApi\Services;
use Thru\TutumApi\Models;

class Node extends BaseApi
{

    /**
     * @return Models\Container[]
     * @throws \Exception
     */
    public function index(){
        $responses = $this->getClient()->makeRequest("GET", "/api/v1/node/");
        #$this->generateGettersSetters(end($responses->objects));
        $nodes = [];
        foreach($responses->objects as $response){
            $container = $this->getNodeFromResponse($response);
            $nodes[] = $container;
        }
        return $nodes;
    }

    public function find($uuid, Models\Node & $node = null){
        $response = $this->getClient()->makeRequest("GET", "/api/v1/node/{$uuid}/");
        #$this->generateGettersSetters($response);
        $node = $this->getNodeFromResponse($response, $node);
        return $node;
    }

    public function getNodeFromResponse($response, Models\Node $node = null){
        if($node === null) {
            $node = new Models\Node();
        }

        $node->setAvailabilityZone($response->availability_zone);
        $node->setCpu($response->cpu);
        $node->setCurrentNumContainers($response->current_num_containers);
        $node->setDeployedDatetime($response->deployed_datetime);
        $node->setDestroyedDatetime($response->destroyed_datetime);
        $node->setDisk($response->disk);
        $node->setDockerExecdriver($response->docker_execdriver);
        $node->setDockerGraphdriver($response->docker_graphdriver);
        $node->setDockerVersion($response->docker_version);
        $node->setExternalFqdn($response->external_fqdn);
        $node->setLastMetric($response->last_metric);
        $node->setLastSeen($response->last_seen);
        $node->setMemory($response->memory);
        $node->setNodeCluster($response->node_cluster);
        $node->setNodeType($response->node_type);
        $node->setPublicIp($response->public_ip);
        $node->setRegion($response->region);
        $node->setResourceUri($response->resource_uri);
        $node->setState($response->state);
        $node->setTags($response->tags);
        $node->setTunnel($response->tunnel);
        $node->setUuid($response->uuid);

        return $node;
    }


}