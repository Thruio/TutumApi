<?php
namespace Thru\TutumApi\Models;

class Port extends BasePort
{
    public static function Build($internal = null, $external = null, $public = false)
    {
        $port = new self();
        if ($internal) {
            $port->setInnerPort($internal);
        }
        if ($external) {
            $port->setOuterPort($external);
            $port->setIsPublished(true);
        }
        $port->setIsPublished($public);
        return $port;
    }
}
