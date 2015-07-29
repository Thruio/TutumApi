<?php
namespace Thru\TutumApi\Models;

abstract class Model implements \JsonSerializable{

    public function jsonSerialize() {
        return (array) $this;
    }
}