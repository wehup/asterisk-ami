<?php

namespace Wehup\AMI;

use Wehup\AMI\Request\RequestInterface;

class Manager
{

    /**
     * @param \Wehup\AMI\Request\RequestInterface $request
     * @return \Wehup\AMI\Response\ResponseInterface
     */
    public function send(RequestInterface $request)
    {
        // $httpRequest = HttpFactory::createRequest($request)
        // $httpResponse = $guzzle->send($httpRequest);
        // $factory = FactoryFactory::createFactoy($request)
        // $response = $factory->getResponse($httpResponse);
        // return $response;
    }

}
