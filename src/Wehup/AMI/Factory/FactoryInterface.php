<?php

namespace Wehup\AMI\Factory;

use Wehup\AMI\Request\RequestInterface;
use Guzzle\Http\Message\Response;

interface FactoryInterface
{

    public function __construct(RequestInterface $request);

    public function createResponse(Response $response);
}
