<?php

namespace Wehup\AMI\Request;

/**
 * @returns PermissionDeniedResponse
 * @returns NoSuchQueueResponse
 * @returns SuccessResponse
 */
class QueueStatusRequest implements RequestInterface
{

    protected $queue;
    protected $member;    

    public function __construct($queue = "", $member = "")
    {
        $this->queue = $queue;
        $this->member = $member;
    }

    public function getAction()
    {
        return 'QueueStatus';
    }

    public function getParams()
    {
        return array(
            'Queue' => $this->queue,
            'Member' => $this->member            
        );
    }

    public function getQueue()
    {
        return $this->queue;
    }

    public function getMember()
    {
        return $this->member;
    }    

}
