<?php

namespace Wehup\AMI\Response;

class AuthenticationAcceptedResponse implements ResponseInterface
{

    protected $cookie;

    public function __construct($cookie)
    {
        $this->cookie = $cookie;
    }

    public function getCookie()
    {
        return $this->cookie;
    }

    public function setCookie($cookie)
    {
        $this->cookie = $cookie;
    }

}
