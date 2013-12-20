<?php

namespace Wehup\AMI\Factory;

class PingFactory implements FactoryInterface
{

    protected $request;

    public function __construct(\Wehup\AMI\Request\RequestInterface $request)
    {
        $this->request = $request;
    }

    public function createResponse(\Guzzle\Http\Message\Response $response)
    {
        return new \Wehup\AMI\Response\PingResponse();
    }

}
