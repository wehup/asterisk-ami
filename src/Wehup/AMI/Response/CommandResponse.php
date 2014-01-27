<?php

namespace Wehup\AMI\Response;

class CommandResponse implements ResponseInterface
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
