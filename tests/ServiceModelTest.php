<?php

namespace Thru\TutumApi\Test;

use Thru\TutumApi\Client;
use Thru\TutumApi\Models;

class ServiceModelTest extends BaseTest
{
    public function testStackServices(){
        $stack = Client::getInstance()->stacks()->findByName("Thruio");
        $services = $stack->getServices();
        $this->putExpectation("Service/Model", reset($services));
        $this->assertContainsOnlyInstancesOf("\\Thru\\TutumApi\\Models\\Service", $services);
        $this->assertEquals($this->getExpectation("Stack/Model"), reset($services));
    }

    public function testPropertiesWork(){
        $uuid = '6fe506a6-a85c-4bcf-9398-f1429657f4df';
        $service = Client::getInstance()->services()->find($uuid);
        $this->assertEquals("OFF", $service->getAutodestroy());
        $this->assertEquals(true, $service->getAutoredeploy());
        $this->assertEquals("OFF", $service->getAutorestart());
        $this->assertEquals([], (array) $service->getBindings());
        $this->putExpectation("Service/Properties/CalculatedEnvvars", $service->getCalculatedEnvvars());
        $this->assertEquals($this->getExpectation("Service/Properties/CalculatedEnvvars"), $service->getCalculatedEnvvars());
        $this->putExpectation("Service/Properties/ContainerEnvvars", $service->getContainerEnvvars());
        $this->assertEquals($this->getExpectation("Service/Properties/ContainerEnvvars"), (array) $service->getContainerEnvvars());
        $this->putExpectation("Service/Properties/ContainerPorts", $service->getContainerPorts());
        $this->assertEquals($this->getExpectation("Service/Properties/ContainerPorts"), (array) $service->getContainerPorts());
        $this->putExpectation("Service/Properties/Containers", $service->getContainers());
        $this->assertEquals($this->getExpectation("Service/Properties/Containers"), $service->getContainers());
        $this->putExpectation("Service/Properties/ContainerPorts", $service->getContainerPorts());
        $this->assertEquals($this->getExpectation("Service/Properties/ContainerPorts"), $service->getContainerPorts());
        $this->assertEquals(3, $service->getCurrentNumContainers());
        $this->assertEquals(0, $service->getCpuShares());
        $this->assertEquals("Sat, 25 Jul 2015 20:53:57 +0000", $service->getDeployedDatetime());
        $this->assertEquals("EMPTIEST_NODE", $service->getDeploymentStrategy());
        $this->assertEquals(null, $service->getDestroyedDatetime());
        $this->assertEquals(null, $service->getEntrypoint());
        $this->assertEquals("tutum.co/matthewbaggett/northcard:latest", $service->getImageName());
        $this->assertEquals("/api/v1/image/tutum.co/matthewbaggett/northcard/tag/latest/", $service->getImageTag());
        $this->assertEquals(null, $service->getMemory());
        $this->assertEquals("Northcard", $service->getName());
        $this->assertEquals(null, $service->getNetwork());
        $this->assertEquals("none", $service->getPid());
        $this->assertEquals(null, $service->getPrivileged());
        $this->assertEquals('northcard.thruio.matthewbaggett.svc.tutum.io', $service->getPublicDns());
        $this->assertEquals("/api/v1/service/{$uuid}/", $service->getResourceUri());
        $this->assertEquals(null, $service->getRunCommand());
        $this->assertEquals(3, $service->getRunningNumContainers());
        $this->assertEquals(null, $service->getSequentialDeployment());
        $this->assertEquals('/api/v1/stack/7734bf20-a765-47a1-82e6-019e885dc327/', $service->getStack());
        $this->assertEquals('Tue, 28 Jul 2015 11:00:38 +0000', $service->getStartedDatetime());
        $this->assertEquals('Running', $service->getState());
        $this->assertEquals(null, $service->getStoppedDatetime());
        $this->assertEquals(0, $service->getStoppedNumContainers());
        $this->assertEquals(true, $service->getSynchronized());
        $this->assertEquals(3, $service->getTargetNumContainers());
        $this->assertEquals($uuid, $service->getUuid());
        $this->assertEquals(null, $service->getWorkingDir());
        $this->assertEquals([
            'NORTHCARD_1_ENV_THRUIO_ENV_MYSQL_DATABASE' => 'northcard',
            'NORTHCARD_1_ENV_THRUIO_ENV_MYSQL_PASS' => 'Cw49675jfiR9d7d',
            'NORTHCARD_1_ENV_THRUIO_ENV_MYSQL_USER' => 'northcard',
            'NORTHCARD_1_ENV_TUTUM_CONTAINER_API_URI' => '/api/v1/container/642ac567-3606-4849-ab79-dcbdb95826f0/',
            'NORTHCARD_1_ENV_TUTUM_CONTAINER_API_URL' => 'https://dashboard.tutum.co/api/v1/container/642ac567-3606-4849-ab79-dcbdb95826f0/',
            'NORTHCARD_1_ENV_TUTUM_CONTAINER_FQDN' => 'northcard-1.thruio.matthewbaggett.cont.tutum.io',
            'NORTHCARD_1_ENV_TUTUM_CONTAINER_HOSTNAME' => 'northcard-1',
            'NORTHCARD_1_ENV_TUTUM_IP_ADDRESS' => '10.7.0.3/16',
            'NORTHCARD_1_ENV_TUTUM_NODE_API_URI' => '/api/v1/node/3cb9e362-d4ef-4e4b-9ee6-280738b53172/',
            'NORTHCARD_1_ENV_TUTUM_NODE_API_URL' => 'https://dashboard.tutum.co/api/v1/node/3cb9e362-d4ef-4e4b-9ee6-280738b53172/',
            'NORTHCARD_1_ENV_TUTUM_NODE_FQDN' => '3cb9e362-matthewbaggett.node.tutum.io',
            'NORTHCARD_1_ENV_TUTUM_NODE_HOSTNAME' => '3cb9e362-matthewbaggett',
            'NORTHCARD_1_ENV_TUTUM_REST_HOST' => 'https://dashboard.tutum.co',
            'NORTHCARD_1_ENV_TUTUM_SERVICE_API_URI' => '/api/v1/service/6fe506a6-a85c-4bcf-9398-f1429657f4df/',
            'NORTHCARD_1_ENV_TUTUM_SERVICE_API_URL' => 'https://dashboard.tutum.co/api/v1/service/6fe506a6-a85c-4bcf-9398-f1429657f4df/',
            'NORTHCARD_1_ENV_TUTUM_SERVICE_FQDN' => 'northcard.thruio.matthewbaggett.svc.tutum.io',
            'NORTHCARD_1_ENV_TUTUM_SERVICE_HOSTNAME' => 'northcard',
            'NORTHCARD_1_ENV_TUTUM_STREAM_HOST' => 'wss://stream.tutum.co',
            'NORTHCARD_1_ENV_VIRTUAL_HOST' => 'northcard.co,ruinedga.me',
            'NORTHCARD_1_NAME' => '/642ac567-3606-4849-ab79-dcbdb95826f0/northcard-1',
            'NORTHCARD_1_PORT' => 'tcp://10.7.0.3:80',
            'NORTHCARD_1_PORT_80_TCP' => 'tcp://10.7.0.3:80',
            'NORTHCARD_1_PORT_80_TCP_ADDR' => '10.7.0.3',
            'NORTHCARD_1_PORT_80_TCP_PORT' => '80',
            'NORTHCARD_1_PORT_80_TCP_PROTO' => 'tcp',
            'NORTHCARD_2_ENV_THRUIO_ENV_MYSQL_DATABASE' => 'northcard',
            'NORTHCARD_2_ENV_THRUIO_ENV_MYSQL_PASS' => 'Cw49675jfiR9d7d',
            'NORTHCARD_2_ENV_THRUIO_ENV_MYSQL_USER' => 'northcard',
            'NORTHCARD_2_ENV_TUTUM_CONTAINER_API_URI' => '/api/v1/container/41cab103-093d-42d3-a001-e4cbc50004dc/',
            'NORTHCARD_2_ENV_TUTUM_CONTAINER_API_URL' => 'https://dashboard.tutum.co/api/v1/container/41cab103-093d-42d3-a001-e4cbc50004dc/',
            'NORTHCARD_2_ENV_TUTUM_CONTAINER_FQDN' => 'northcard-2.thruio.matthewbaggett.cont.tutum.io',
            'NORTHCARD_2_ENV_TUTUM_CONTAINER_HOSTNAME' => 'northcard-2',
            'NORTHCARD_2_ENV_TUTUM_IP_ADDRESS' => '10.7.0.16/16',
            'NORTHCARD_2_ENV_TUTUM_NODE_API_URI' => '/api/v1/node/a59d6180-089c-48ed-b9ae-2784fb0ef034/',
            'NORTHCARD_2_ENV_TUTUM_NODE_API_URL' => 'https://dashboard.tutum.co/api/v1/node/a59d6180-089c-48ed-b9ae-2784fb0ef034/',
            'NORTHCARD_2_ENV_TUTUM_NODE_FQDN' => 'a59d6180-matthewbaggett.node.tutum.io',
            'NORTHCARD_2_ENV_TUTUM_NODE_HOSTNAME' => 'a59d6180-matthewbaggett',
            'NORTHCARD_2_ENV_TUTUM_REST_HOST' => 'https://dashboard.tutum.co',
            'NORTHCARD_2_ENV_TUTUM_SERVICE_API_URI' => '/api/v1/service/6fe506a6-a85c-4bcf-9398-f1429657f4df/',
            'NORTHCARD_2_ENV_TUTUM_SERVICE_API_URL' => 'https://dashboard.tutum.co/api/v1/service/6fe506a6-a85c-4bcf-9398-f1429657f4df/',
            'NORTHCARD_2_ENV_TUTUM_SERVICE_FQDN' => 'northcard.thruio.matthewbaggett.svc.tutum.io',
            'NORTHCARD_2_ENV_TUTUM_SERVICE_HOSTNAME' => 'northcard',
            'NORTHCARD_2_ENV_TUTUM_STREAM_HOST' => 'wss://stream.tutum.co',
            'NORTHCARD_2_ENV_VIRTUAL_HOST' => 'northcard.co,ruinedga.me',
            'NORTHCARD_2_NAME' => '/41cab103-093d-42d3-a001-e4cbc50004dc/northcard-2',
            'NORTHCARD_2_PORT' => 'tcp://10.7.0.16:80',
            'NORTHCARD_2_PORT_80_TCP' => 'tcp://10.7.0.16:80',
            'NORTHCARD_2_PORT_80_TCP_ADDR' => '10.7.0.16',
            'NORTHCARD_2_PORT_80_TCP_PORT' => '80',
            'NORTHCARD_2_PORT_80_TCP_PROTO' => 'tcp',
            'NORTHCARD_3_ENV_THRUIO_ENV_MYSQL_DATABASE' => 'northcard',
            'NORTHCARD_3_ENV_THRUIO_ENV_MYSQL_PASS' => 'Cw49675jfiR9d7d',
            'NORTHCARD_3_ENV_THRUIO_ENV_MYSQL_USER' => 'northcard',
            'NORTHCARD_3_ENV_TUTUM_CONTAINER_API_URI' => '/api/v1/container/2a27d02e-0873-4109-af18-6cb027778481/',
            'NORTHCARD_3_ENV_TUTUM_CONTAINER_API_URL' => 'https://dashboard.tutum.co/api/v1/container/2a27d02e-0873-4109-af18-6cb027778481/',
            'NORTHCARD_3_ENV_TUTUM_CONTAINER_FQDN' => 'northcard-3.thruio.matthewbaggett.cont.tutum.io',
            'NORTHCARD_3_ENV_TUTUM_CONTAINER_HOSTNAME' => 'northcard-3',
            'NORTHCARD_3_ENV_TUTUM_IP_ADDRESS' => '10.7.0.17/16',
            'NORTHCARD_3_ENV_TUTUM_NODE_API_URI' => '/api/v1/node/a59d6180-089c-48ed-b9ae-2784fb0ef034/',
            'NORTHCARD_3_ENV_TUTUM_NODE_API_URL' => 'https://dashboard.tutum.co/api/v1/node/a59d6180-089c-48ed-b9ae-2784fb0ef034/',
            'NORTHCARD_3_ENV_TUTUM_NODE_FQDN' => 'a59d6180-matthewbaggett.node.tutum.io',
            'NORTHCARD_3_ENV_TUTUM_NODE_HOSTNAME' => 'a59d6180-matthewbaggett',
            'NORTHCARD_3_ENV_TUTUM_REST_HOST' => 'https://dashboard.tutum.co',
            'NORTHCARD_3_ENV_TUTUM_SERVICE_API_URI' => '/api/v1/service/6fe506a6-a85c-4bcf-9398-f1429657f4df/',
            'NORTHCARD_3_ENV_TUTUM_SERVICE_API_URL' => 'https://dashboard.tutum.co/api/v1/service/6fe506a6-a85c-4bcf-9398-f1429657f4df/',
            'NORTHCARD_3_ENV_TUTUM_SERVICE_FQDN' => 'northcard.thruio.matthewbaggett.svc.tutum.io',
            'NORTHCARD_3_ENV_TUTUM_SERVICE_HOSTNAME' => 'northcard',
            'NORTHCARD_3_ENV_TUTUM_STREAM_HOST' => 'wss://stream.tutum.co',
            'NORTHCARD_3_ENV_VIRTUAL_HOST' => 'northcard.co,ruinedga.me',
            'NORTHCARD_3_NAME' => '/2a27d02e-0873-4109-af18-6cb027778481/northcard-3',
            'NORTHCARD_3_PORT' => 'tcp://10.7.0.17:80',
            'NORTHCARD_3_PORT_80_TCP' => 'tcp://10.7.0.17:80',
            'NORTHCARD_3_PORT_80_TCP_ADDR' => '10.7.0.17',
            'NORTHCARD_3_PORT_80_TCP_PORT' => '80',
            'NORTHCARD_3_PORT_80_TCP_PROTO' => 'tcp',
            'NORTHCARD_ENV_THRUIO_ENV_MYSQL_DATABASE' => 'northcard',
            'NORTHCARD_ENV_THRUIO_ENV_MYSQL_PASS' => 'Cw49675jfiR9d7d',
            'NORTHCARD_ENV_THRUIO_ENV_MYSQL_USER' => 'northcard',
            'NORTHCARD_ENV_TUTUM_CONTAINER_API_URI' => '/api/v1/container/642ac567-3606-4849-ab79-dcbdb95826f0/',
            'NORTHCARD_ENV_TUTUM_CONTAINER_API_URL' => 'https://dashboard.tutum.co/api/v1/container/642ac567-3606-4849-ab79-dcbdb95826f0/',
            'NORTHCARD_ENV_TUTUM_CONTAINER_FQDN' => 'northcard-1.thruio.matthewbaggett.cont.tutum.io',
            'NORTHCARD_ENV_TUTUM_CONTAINER_HOSTNAME' => 'northcard-1',
            'NORTHCARD_ENV_TUTUM_IP_ADDRESS' => '10.7.0.3/16',
            'NORTHCARD_ENV_TUTUM_NODE_API_URI' => '/api/v1/node/3cb9e362-d4ef-4e4b-9ee6-280738b53172/',
            'NORTHCARD_ENV_TUTUM_NODE_API_URL' => 'https://dashboard.tutum.co/api/v1/node/3cb9e362-d4ef-4e4b-9ee6-280738b53172/',
            'NORTHCARD_ENV_TUTUM_NODE_FQDN' => '3cb9e362-matthewbaggett.node.tutum.io',
            'NORTHCARD_ENV_TUTUM_NODE_HOSTNAME' => '3cb9e362-matthewbaggett',
            'NORTHCARD_ENV_TUTUM_REST_HOST' => 'https://dashboard.tutum.co',
            'NORTHCARD_ENV_TUTUM_SERVICE_API_URI' => '/api/v1/service/6fe506a6-a85c-4bcf-9398-f1429657f4df/',
            'NORTHCARD_ENV_TUTUM_SERVICE_API_URL' => 'https://dashboard.tutum.co/api/v1/service/6fe506a6-a85c-4bcf-9398-f1429657f4df/',
            'NORTHCARD_ENV_TUTUM_SERVICE_FQDN' => 'northcard.thruio.matthewbaggett.svc.tutum.io',
            'NORTHCARD_ENV_TUTUM_SERVICE_HOSTNAME' => 'northcard',
            'NORTHCARD_ENV_TUTUM_STREAM_HOST' => 'wss://stream.tutum.co',
            'NORTHCARD_ENV_VIRTUAL_HOST' => 'northcard.co,ruinedga.me',
            'NORTHCARD_NAME' => '/642ac567-3606-4849-ab79-dcbdb95826f0/northcard-1',
            'NORTHCARD_PORT' => 'tcp://10.7.0.3:80',
            'NORTHCARD_PORT_80_TCP' => 'tcp://10.7.0.3:80',
            'NORTHCARD_PORT_80_TCP_ADDR' => '10.7.0.3',
            'NORTHCARD_PORT_80_TCP_PORT' => '80',
            'NORTHCARD_PORT_80_TCP_PROTO' => 'tcp',
            'NORTHCARD_TUTUM_API_URL' => 'https://dashboard.tutum.co/api/v1/service/6fe506a6-a85c-4bcf-9398-f1429657f4df/'
        ], (array) $service->getLinkVariables());
        // TODO: Test getLinkedFromService
        // TODO: Test getLinkedToService
        // TODO: Test getLinkedToExternalService
        $this->assertEquals(null, $service->getNet());
        $this->assertEquals(null, $service->getRoles());
        $this->assertEquals(null, $service->getTags());

    }
}
