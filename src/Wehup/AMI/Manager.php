<?php

namespace Wehup\AMI;

class Manager
{

    /**
     * @param \Wehup\AMI\Request\RequestInterface $request
     * @return \Wehup\AMI\Response\ResponseInterface
     */
    public function send(Request\RequestInterface $request)
    {
        $response = $this->sendRequest($request);

        // if unauthenticated, try Login and resend request
        if ($response instanceof Response\PermissionDeniedResponse) {
            $loginRequest = new Request\LoginRequest();
            $loginResponse = $this->sendRequest($loginRequest);

            if ($loginResponse instanceof Response\AuthenticationAcceptedResponse) {
                return $this->sendRequest($request);
            }
        }

        return $response;
    }

    protected function sendRequest(Request\RequestInterface $request)
    {
        throw new \Exception('To implement.');

        // $httpRequest = HttpFactory::createRequest($request)
        // $httpResponse = $guzzle->send($httpRequest);
        // $factory = FactoryFactory::createFactoy($request)
        // $response = $factory->getResponse($httpResponse);
        // return $response;
    }

}
