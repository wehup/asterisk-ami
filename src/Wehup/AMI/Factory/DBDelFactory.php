<?php

namespace Wehup\AMI\Factory;

use Wehup\AMI\Response;
use Wehup\AMI\Exception;

class DBDelFactory implements FactoryInterface
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

        if (preg_match('#^Response: Success\r\nMessage: Key deleted successfully#', $body)) {
            return new Response\SuccessResponse();
        }

        if (preg_match('#^Response: Error\r\nMessage: Database entry not found#', $body)) {
            return new Response\InvalidDBEntryResponse($this->request->getFamily(), $this->request->getKey());
        }

        throw new Exception\UnexpectedResponseException($body);
    }

}
