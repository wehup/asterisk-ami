<?php

namespace Wehup\AMI\Request;

/**
 * @returns PermissionDeniedResponse
 * @returns SuccessResponse
 */
class UserEventRequest implements RequestInterface
{

    protected $userevent;
    protected $headers;

    public function __construct($userevent, $headers)
    {
        $this->userevent = $userevent;
        $this->headers = $headers;
    }

    public function getAction()
    {
        return 'UserEvent';
    }

    public function getParams()
    {
        $params = array('UserEvent' => $this->userevent);

        foreach ($this->headers as $key => $value) {
            $params[$key] = $value;
        }

        return $params;
    }

    public function getUserEvent()
    {
        return $this->userevent;
    }

    public function getHeaders()
    {
        $headers = array();

        foreach ($this->headers as $key => $value) {
            $headers[$key] = $value;
        }

        return $headers;
    }

}
