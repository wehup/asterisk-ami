<?php

namespace Wehup\AMI;

class Manager
{

    protected $httpClient;

    public function __construct($host, $port, $prefix = null)
    {
        $url = "http://{$host}:{$port}/";

        if ($prefix) {
            $url .= "{$prefix}/";
        }

        $this->httpClient = new \Guzzle\Http\Client($url);
    }

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
        $httpRequest = $this->createHttpRequest($request);
        $httpResponse = $httpRequest->send();

        throw new \Exception('To implement.');
        $factory = $this->createFactory($request);
        $response = $factory->createResponse($httpResponse);

        return $response;
    }

    protected function createHttpRequest(Request\RequestInterface $request)
    {
        $httpRequest = $this->httpClient->get('rawman');

        foreach ($request->getParams() as $key => $value) {
            $httpRequest->getQuery()->set($key, $value);
        }

        $httpRequest->getQuery()->set('Action', $request->getAction());

        return $httpRequest;
    }

}
