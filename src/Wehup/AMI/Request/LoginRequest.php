<?php

namespace Wehup\AMI\Request;

/**
 * @returns AuthenticationAcceptedResponse
 * @returns AuthenticationFailedResponse
 * @returns PermissionDeniedResponse
 */
class LoginRequest implements RequestInterface
{

    public function getAction()
    {
        return 'Login';
    }

    public function getParams()
    {
        return array(
            'Username' => 'admin',
            'Secret' => 'admin'
        );
    }

}
