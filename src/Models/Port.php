<?php
namespace Thru\TutumApi\Models;


class Port extends BasePort
{
    static public function Build($internal = null, $external = null){
        $port = new self();
        if($internal){
            $port->setInnerPort($internal);
        }
        if($external) {
            $port->setOuterPort($external);
            $port->setIsPublished(true);
        }
        return $port;
    }
}