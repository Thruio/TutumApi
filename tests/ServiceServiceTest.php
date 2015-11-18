<?php

namespace Thru\TutumApi\Test;

use Thru\TutumApi\Client;
use Thru\TutumApi\Models;

class ServiceServiceTest extends BaseTest
{
    public function testServiceServices()
    {
        $service = Client::getInstance()->services()->findByName("MySQL");
        $this->assertTrue($service instanceof Models\Service);
    }
}
