<?php

namespace Thru\TutumApi\Test;

use Thru\TutumApi\Client;

class ContainerServiceTest extends BaseTest
{
    public function testContainerList()
    {
        $containers = Client::getInstance()->containers()->index();
        $this->putExpectation("Containers/IndexAll", $containers);
        $this->putExpectation("Containers/IndexOne", $containers[0]);

        $this->assertEquals($this->getExpectation("Containers/IndexAll"), $containers);
        $this->assertEquals($this->getExpectation("Containers/IndexOne"), $containers[0]);
    }

    public function testContainerFindByUUID()
    {
        $container = Client::getInstance()->containers()->find("e788c214-06c8-4221-a1c1-8c7350fc5ea8");
        $this->putExpectation("Containers/FindByUUID", $container);
        $this->assertEquals($this->getExpectation("Containers/FindByUUID"), $container);
    }

    public function testContainerFindByName()
    {
        $container = Client::getInstance()->containers()->findByName("MySQL-1");
        $this->putExpectation("Containers/FindByName", $container);
        $this->assertEquals($this->getExpectation("Containers/FindByName"), $container);
    }
}
