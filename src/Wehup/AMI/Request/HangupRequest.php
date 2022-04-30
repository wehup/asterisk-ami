<?php

namespace Wehup\AMI\Request;

/**
 * @returns PermissionDeniedResponse
 * @returns NoSuchChannelResponse
 * @returns SuccessResponse
 */
class HangupRequest implements RequestInterface
{

    protected $channel;
    protected $cause;

    public function __construct($channel, $cause)
    {        
        $this->channel = $channel;
        $this->cause = $cause;
    }

    public function getAction()
    {
        return 'Hangup';
    }

    public function getParams()
    {
        return array(
            'Channel' => $this->channel,
            'Cause' => $this->cause
        );
    }

    public function getChannel()
    {
        return $this->channel;
    }

    public function getCause()
    {
        return $this->cause;
    }

}
