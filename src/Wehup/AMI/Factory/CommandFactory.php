<?php

namespace Wehup\AMI\Factory;

use Wehup\AMI\Response;
use Wehup\AMI\Exception;

class CommandFactory implements FactoryInterface
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

        if (preg_match('#^Response: Follows\r\nPrivilege: Command\r\n(.*)--END COMMAND--\r\n\r\n$#s', $body, $matches)) {
            return new Response\CommandResponse(trim($matches[1]));
        }

        throw new Exception\UnexpectedResponseException($body);
    }

}
