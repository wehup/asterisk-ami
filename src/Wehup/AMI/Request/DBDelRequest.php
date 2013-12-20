<?php

namespace Wehup\AMI\Request;

/**
 * @returns SuccessResponse
 * @returns InvalidDBEntryResponse
 * @returns PermissionDeniedResponse
 */
class DBDelRequest implements RequestInterface
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
        return 'DBDel';
    }

    public function getParams()
    {
        return array(
            'Family' => $this->family,
            'Key' => $this->key
        );
    }

    public function getFamily()
    {
        return $this->family;
    }

    public function getKey()
    {
        return $this->key;
    }

}
