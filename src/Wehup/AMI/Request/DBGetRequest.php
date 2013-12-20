<?php

namespace Wehup\AMI\Request;

/**
 * @returns ListCommandsResponse
 * @returns PermissionDeniedResponse
 */
class DBGetRequest implements RequestInterface
{

    protected $family;
    protected $key;

    public function __construct($family, $key)
    {
        $this->family = $family;
        $this->key = $key;
    }

    public function getAction()
    {
        return 'DBGet';
    }

    public function getParams()
    {
        return array(
            'Family' => $this->family,
            'Key' => $this->key
        );
    }

}
