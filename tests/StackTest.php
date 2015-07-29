<?php

namespace Thru\TutumApi\Test;

use Thru\TutumApi\Client;

class StackTest extends BaseTest
{


    public function testListStacks(){
        $stacks = Client::getInstance()->stacks()->index();
        #$this->putExpectation("Stack/IndexAll", $stacks);
        #$this->putExpectation("Stack/IndexOne", $stacks[0]);

        $this->assertEquals($this->getExpectation("Stack/IndexAll"), $stacks);
        $this->assertEquals($this->getExpectation("Stack/IndexOne"), $stacks[0]);
    }

    public function testGetStack(){
        $stack = Client::getInstance()->stacks()->find("7734bf20-a765-47a1-82e6-019e885dc327");
        $this->putExpectation("Stack/FindByUUID", $stack);
        $this->assertEquals($this->getExpectation("Stack/FindByUUID"), $stack);
    }
}
