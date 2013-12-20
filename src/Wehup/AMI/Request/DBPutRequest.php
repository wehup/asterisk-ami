<?php

namespace Wehup\AMI\Request;

/**
 * @returns ListCommandsResponse
 * @returns PermissionDeniedResponse
 */
class DBPutRequest implements RequestInterface
{

    protected $family;
    protected $key;
    protected $value;

    public function getAction()
    {
        return 'DBPut';
    }

    public function getParams()
    {
        return array(
            'Family' => $this->family,
            'Key' => $this->key,
            'Val' => $this->value
        );
    }

}
