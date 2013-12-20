<?php

namespace Wehup\AMI\Request;

/**
 * @returns ListCommandsResponse
 * @returns PermissionDeniedResponse
 */
class ListCommandsRequest implements RequestInterface
{

    public function getAction()
    {
        return 'ListCommands';
    }

    public function getParams()
    {
        return array();
    }

}
