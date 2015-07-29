<?php

namespace Thru\TutumApi\Test;

use Thru\TutumApi\Client;

class StackModelTest extends BaseTest
{
    public function testStackServices(){
        $stack = Client::getInstance()->stacks()->findByName("Thruio");
        $services = $stack->getServices();
        $this->putExpectation("Stack/Model", reset($services));
        $this->assertEquals($this->getExpectation("Stack/Model"), reset($services));

    }
}
