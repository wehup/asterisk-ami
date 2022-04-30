<?php

namespace Wehup\AMI\Factory;

use Wehup\AMI\Response;
use Wehup\AMI\Exception;

class HangupFactory implements FactoryInterface
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

        if (preg_match('#^Response: Error\r\nMessage: No such channel#', $body)) {
            return new Response\NoSuchChannelResponse();
        }

        if (preg_match('#^Response: Success\r\n#', $body)) {
            return new Response\SuccessResponse();
        }
        
        throw new Exception\UnexpectedResponseException($body);
    }

}
