<?php

namespace Wehup\AMI\Response;

class InvalidDBEntryResponse implements ResponseInterface
{

    protected $family;
    protected $key;

    public function __construct($family, $key)
    {
        $this->family = $family;
        $this->key = $key;
    }

    public function getFamily()
    {
        return $this->family;
    }

    public function getKey()
    {
        return $this->key;
    }

}
