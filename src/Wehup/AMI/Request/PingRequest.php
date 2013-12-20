<?php

namespace Wehup\AMI\Request;

/**
 * @returns PingResponse
 * @returns PermissionDeniedResponse
 */
class PingRequest implements RequestInterface
{

    public function getAction()
    {
        return 'Ping';
    }

    public function getParams()
    {
        return array();
    }

}
