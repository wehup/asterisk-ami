<?php

namespace Wehup\AMI;

class Manager
{

    /**
     * @var \Guzzle\Http\ClientInterface
     */
    protected $httpClient;

    /**
     * @param string $host
     * @param int $port
     * @param string $prefix
     */
    public function __construct($host, $port = 8088, $prefix = null)
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

    /**
     * @param \Wehup\AMI\Request\RequestInterface $request
     * @return \Wehup\AMI\Response\ResponseInterface
     */
    protected function sendRequest(Request\RequestInterface $request)
    {
        $httpRequest = $this->createHttpRequest($request);
        $httpResponse = $httpRequest->send();

        $factory = FactoryProvider::getFactoryByRequest($request);
        $response = $factory->createResponse($httpResponse);

        return $response;
    }

    /**
     * 
     * @param \Wehup\AMI\Request\RequestInterface $request
     * @return \Guzzle\Http\Message\Response
     */
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
