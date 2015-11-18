<?php

namespace Thru\TutumApi\Test;

use Thru\TutumApi\Client;
use Thru\TutumApi\Models;

class StackModelTest extends BaseTest
{
    public function testStackServices()
    {
        $stack = Client::getInstance()->stacks()->findByName("Thruio");
        $services = $stack->getServices();
        #$this->putExpectation("Stack/Model", reset($services));
        $this->assertEquals($this->getExpectation("Stack/Model"), reset($services));
        return reset($services);
    }

    public function testPropertiesWork()
    {
        $stack = Client::getInstance()->stacks()->findByName("Thruio");
        $this->assertEquals("Thruio", $stack->getName());
        $this->assertEquals("7734bf20-a765-47a1-82e6-019e885dc327", $stack->getUuid());

    }
}
