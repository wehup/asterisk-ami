<?php

namespace Wehup\AMI;

class Manager implements ManagerInterface
{

    /**
     * @var \Guzzle\Http\ClientInterface
     */
    protected $httpClient;

    /**
     * @var \Wehup\AMI\Request\RequestInterface
     */
    protected $loginRequest;

    /**
     * @var string
     */
    protected $cookie;

    /**
     * @param string $host
     * @param int $port
     * @param string $prefix
     */
    public function __construct($host, $port = 8088, $prefix = null, Request\RequestInterface $loginRequest = null)
    {
        $url = "http://{$host}:{$port}/";

        if ($prefix) {
            $url .= "{$prefix}/";
        }

        $this->httpClient = new \Guzzle\Http\Client($url);
        $this->loginRequest = $loginRequest;
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
            $loginRequest = $this->getLoginRequest();

            if (!$loginRequest) {
                return $response;
            }

            $loginResponse = $this->sendRequest($loginRequest);

            if ($loginResponse instanceof Response\AuthenticationAcceptedResponse) {
                $this->cookie = $loginResponse->getCookie();
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
        $httpRequest->addCookie('mansession_id', $this->cookie);

        foreach ($request->getParams() as $key => $value) {
            $httpRequest->getQuery()->set($key, $value);
        }

        $httpRequest->getQuery()->set('Action', $request->getAction());

        return $httpRequest;
    }

    /**
     * @return \Wehup\AMI\Request\RequestInterface
     */
    public function getLoginRequest()
    {
        return $this->loginRequest;
    }

    /**
     * @param \Wehup\AMI\Request\RequestInterface $loginRequest
     */
    public function setLoginRequest(Request\RequestInterface $loginRequest)
    {
        $this->loginRequest = $loginRequest;
    }

}
