<?php

namespace Wehup\AMI\Factory;

use Wehup\AMI\Response;
use Wehup\AMI\Exception;

class LoginFactory implements FactoryInterface
{

    protected $request;

    public function __construct(\Wehup\AMI\Request\RequestInterface $request)
    {
        $this->request = $request;
    }

    public function createResponse(\Guzzle\Http\Message\Response $response)
    {
        $body = $response->getBody(true);

        if (preg_match('#^Response: Success\r\nMessage: Authentication accepted#', $body)) {
            $setCookie = $response->getSetCookie();

            if (!preg_match('#^mansession_id=\"([a-z0-9]+)\"#', $setCookie, $matches)) {
                throw new Exception\UnexpectedResponseException();
            }

            return new Response\AuthenticationAcceptedResponse($matches[1]);
        }

        if (preg_match('#^Response: Error\r\nMessage: Permission denied#', $body)) {
            return new Response\PermissionDeniedResponse();
        }

        throw new Exception\UnexpectedResponseException();
    }

}
