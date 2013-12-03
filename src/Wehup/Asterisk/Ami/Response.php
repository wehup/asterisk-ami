<?php

namespace Wehup\Asterisk\Ami;

class Response
{

    const AUTHENTICATION_REQUIRED = 1;
    const AUTHENTICATION_ACCEPTED = 2;
    const AUTHENTICATION_FAILED = 3;
    const PERMISSION_DENIED = 4;

    protected $status;
    protected $data = array();

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function addData($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function getData($key)
    {
        return $this->data[$key];
    }

}
