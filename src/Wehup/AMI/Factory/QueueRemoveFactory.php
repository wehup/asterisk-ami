<?php

namespace Wehup\AMI\Factory;

use Wehup\AMI\Response;
use Wehup\AMI\Exception;

class QueueRemoveFactory implements FactoryInterface
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

        if (preg_match('#^Response: Error\r\nMessage: Unable to remove interface from queue: No such queue#', $body)) {
            return new Response\NoSuchQueueResponse();
        }

        if (preg_match('#^Response: Error\r\nMessage: Unable to remove interface: Not there#', $body)) {
            return new Response\QueueInterfaceNotThereResponse();
        }

        if (preg_match('#^Response: Success\r\n#', $body)) {
            return new Response\SuccessResponse();
        }

        throw new Exception\UnexpectedResponseException($body);
    }

}
