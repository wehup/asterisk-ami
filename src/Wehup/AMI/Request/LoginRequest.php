<?php

namespace Wehup\AMI\Request;

/**
 * @returns AuthenticationAcceptedResponse
 * @returns AuthenticationFailedResponse
 * @returns PermissionDeniedResponse
 */
class LoginRequest implements RequestInterface
{

    protected $username;
    protected $secret;

    public function __construct($username, $secret)
    {
        $this->username = $username;
        $this->secret = $secret;
    }

    public function getAction()
    {
        return 'Login';
    }

    public function getParams()
    {
        return array(
            'Username' => $this->username,
            'Secret' => $this->secret
        );
    }

}
