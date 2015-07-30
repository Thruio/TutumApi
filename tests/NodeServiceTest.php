<?php

namespace Thru\TutumApi\Test;

use Thru\TutumApi\Client;
use Thru\TutumApi\Models;

class NodeServiceTest extends BaseTest
{
    public function testNodeList(){
        $nodes = Client::getInstance()->nodes()->index();
        $this->putExpectation("Nodes/IndexAll", $nodes);
        $this->putExpectation("Nodes/IndexOne", $nodes[0]);

        $this->assertEquals($this->getExpectation("Nodes/IndexAll"), $nodes);
        $this->assertEquals($this->getExpectation("Nodes/IndexOne"), $nodes[0]);
    }

    public function testNodeFindByUUID(){
        $node = Client::getInstance()->nodes()->find("3cb9e362-d4ef-4e4b-9ee6-280738b53172");
        $this->putExpectation("Nodes/FindByUUID", $node);
        $this->assertEquals($this->getExpectation("Nodes/FindByUUID"), $node);
        return $node;
    }

    /**
     * @depends testNodeFindByUUID
     * @param Models\Node $node
     */
    public function testNodeParameters(Models\Node $node){
        $this->assertEquals(NULL, $node->getAvailabilityZone(), 'getAvailabilityZone did not return expected result');
        $this->assertEquals(2, $node->getCpu(), 'getCpu did not return expected result');
        $this->assertEquals(16, $node->getCurrentNumContainers(), 'getCurrentNumContainers did not return expected result');
        $this->assertEquals('Mon, 13 Apr 2015 10:44:56 +0000', $node->getDeployedDatetime(), 'getDeployedDatetime did not return expected result');
        $this->assertEquals(NULL, $node->getDestroyedDatetime(), 'getDestroyedDatetime did not return expected result');
        $this->assertEquals(39, $node->getDisk(), 'getDisk did not return expected result');
        $this->assertEquals('native-0.2', $node->getDockerExecdriver(), 'getDockerExecdriver did not return expected result');
        $this->assertEquals('aufs', $node->getDockerGraphdriver(), 'getDockerGraphdriver did not return expected result');
        $this->assertEquals('1.5.0', $node->getDockerVersion(), 'getDockerVersion did not return expected result');
        $this->assertEquals('3cb9e362-matthewbaggett.node.tutum.io', $node->getExternalFqdn(), 'getExternalFqdn did not return expected result');
        $this->assertEquals(['cpu' => 29.0948290433331, 'disk' => 16026988544, 'memory' => 1054019584], arrayify($node->getLastMetric()), 'getLastMetric did not return expected result');
        $this->assertEquals('Thu, 30 Jul 2015 11:32:43 +0000', $node->getLastSeen(), 'getLastSeen did not return expected result');
        $this->assertEquals(2048, $node->getMemory(), 'getMemory did not return expected result');
        $this->assertEquals('/api/v1/nodecluster/0d10fa1c-2783-4195-b5d8-7541a1890c41/', $node->getNodeCluster(), 'getNodeCluster did not return expected result');
        $this->assertEquals('/api/v1/nodetype/digitalocean/2gb/', $node->getNodeType(), 'getNodeType did not return expected result');
        $this->assertEquals('178.62.105.101', $node->getPublicIp(), 'getPublicIp did not return expected result');
        $this->assertEquals('/api/v1/region/digitalocean/lon1/', $node->getRegion(), 'getRegion did not return expected result');
        $this->assertEquals('/api/v1/node/3cb9e362-d4ef-4e4b-9ee6-280738b53172/', $node->getResourceUri(), 'getResourceUri did not return expected result');
        $this->assertEquals('Deployed', $node->getState(), 'getState did not return expected result');
        $this->assertEquals([0 => ['name' => 'digitalocean'], 1 => ['name' => 'lon1'], 2 => ['name' => 'Prezzler']], arrayify($node->getTags()), 'getTags did not return expected result');
        $this->assertEquals(NULL, $node->getTunnel(), 'getTunnel did not return expected result');
        $this->assertEquals('3cb9e362-d4ef-4e4b-9ee6-280738b53172', $node->getUuid(), 'getUuid did not return expected result');
    }



}
