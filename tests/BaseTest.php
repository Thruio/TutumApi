<?php

namespace Thru\TutumApi\Test;

use VCR\VCR;
use Thru\TutumApi\Client;

abstract class BaseTest extends \PHPUnit_Framework_TestCase
{

    protected $apiClient;

    public function setUp(){
        parent::setUp();
        VCR::turnOn();
        VCR::insertCassette($this->getName());
        Client::configure('matthewbaggett', 'decea003584f7df33be57f547f63f2cccd8e3188');
        $this->apiClient = Client::getInstance();
    }

    public function tearDown(){
        VCR::eject();
        VCR::turnOff();
        parent::tearDown();
    }
}
