<?php

namespace Thru\TutumApi\Test;

use Thru\TutumApi\Client;
use duncan3dc\Serial\Yaml;
use duncan3dc\Serial\Serial;

class StackTest extends BaseTest
{

    private function getExpectationName($name){
        return "tests/expectations/{$name}.expect";
    }

    public function putExpectation($name, $data){
        if(!file_exists(dirname($this->getExpectationName($name)))){
            mkdir(dirname($this->getExpectationName($name)), null, true);
        }

        file_put_contents($this->getExpectationName($name), serialize($data));
    }

    public function getExpectation($name){
        return unserialize(file_get_contents($this->getExpectationName($name)));
    }

    public function testListStacks(){
        $stacks = Client::getInstance()->stacks()->index();
        $this->putExpectation("Stack/IndexAll", $stacks);
        $this->putExpectation("Stack/IndexOne", $stacks[0]);

        $this->assertEquals($this->getExpectation("Stack/IndexAll"), $stacks);
        $this->assertEquals($this->getExpectation("Stack/IndexOne"), $stacks[0]);
    }
}
