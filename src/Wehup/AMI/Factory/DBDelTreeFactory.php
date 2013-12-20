<?php

namespace Wehup\AMI\Factory;

use Wehup\AMI\Response;

class DBDelTreeFactory implements FactoryInterface
{

    protected $request;

    public function __construct(\Wehup\AMI\Request\RequestInterface $request)
    {
        $this->request = $request;
    }

    public function createResponse(\Guzzle\Http\Message\Response $response)
    {
        $body = $response->getBody(true);

        if (preg_match('#^Response: Error\r\nMessage: Permission denied#', $body)) {
            return new Response\PermissionDeniedResponse();
        }

        if (preg_match('#^Response: Success\r\nMessage: Key tree deleted successfully#', $body)) {
            return new Response\SuccessResponse();
        }

        throw new Exception\UnexpectedResponseException();
    }

}
