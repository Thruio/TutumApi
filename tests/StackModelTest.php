<?php

namespace Thru\TutumApi\Test;

use Thru\TutumApi\Client;

class StackModelTest extends BaseTest
{
    public function testStackServices(){
        $stack = Client::getInstance()->stacks()->findByName("Thruio");
        var_dump($stack->getServices());

    }
}
