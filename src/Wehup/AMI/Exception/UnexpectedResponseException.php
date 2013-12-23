<?php

namespace Wehup\AMI\Exception;

class UnexpectedResponseException extends \Exception
{

    protected $body;

    public function __construct($body)
    {
        $this->body = $body;
    }

    public function getBody()
    {
        return $this->body;
    }

}
