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
        $service = Client::getInstance()->services()->find('6fe506a6-a85c-4bcf-9398-f1429657f4df');
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

    }
}
