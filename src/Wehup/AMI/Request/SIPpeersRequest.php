<?php

namespace Wehup\AMI\Request;

/**
 * @returns SIPpeersResponse
 * @returns PermissionDeniedResponse
 */
class SIPpeersRequest implements RequestInterface
{

    public function getAction()
    {
        return 'SIPpeers';
    }

    public function getParams()
    {
        return array();
    }

}
