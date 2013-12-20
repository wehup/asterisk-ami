<?php

namespace Wehup\AMI\Response;

class DBEntryResponse implements ResponseInterface
{

    protected $family;
    protected $key;
    protected $value;

    public function __construct($family, $key, $value)
    {
        $this->family = $family;
        $this->key = $key;
        $this->value = $value;
    }

    public function getFamily()
    {
        return $this->family;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getValue()
    {
        return $this->value;
    }

}
