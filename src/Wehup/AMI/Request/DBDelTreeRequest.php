<?php

namespace Wehup\AMI\Request;

/**
 * @returns SuccessResponse
 * @returns PermissionDeniedResponse
 */
class DBDelTreeRequest implements RequestInterface
{

    protected $family;

    public function __construct($family)
    {
        $this->family = $family;
    }

    public function getAction()
    {
        return 'DBDelTree';
    }

    public function getParams()
    {
        return array(
            'Family' => $this->family
        );
    }

}
