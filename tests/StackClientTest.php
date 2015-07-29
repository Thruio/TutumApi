<?php

namespace Thru\TutumApi\Test;

use Thru\TutumApi\Client;

class StackClientTest extends BaseTest
{
    public function testStackList(){
        $stacks = Client::getInstance()->stacks()->index();
        #$this->putExpectation("Stack/IndexAll", $stacks);
        #$this->putExpectation("Stack/IndexOne", $stacks[0]);

        $this->assertEquals($this->getExpectation("Stack/IndexAll"), $stacks);
        $this->assertEquals($this->getExpectation("Stack/IndexOne"), $stacks[0]);
    }

    public function testStackFindByUUID(){
        $stack = Client::getInstance()->stacks()->find("7734bf20-a765-47a1-82e6-019e885dc327");
        #$this->putExpectation("Stack/FindByUUID", $stack);
        $this->assertEquals($this->getExpectation("Stack/FindByUUID"), $stack);
    }

    public function testStackFindByName(){
        $stack = Client::getInstance()->stacks()->findByName("Thruio");
        $this->putExpectation("Stack/FindByName", $stack);
        $this->assertEquals($this->getExpectation("Stack/FindByName"), $stack);
    }
}
