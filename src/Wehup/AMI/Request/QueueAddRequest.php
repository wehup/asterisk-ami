<?php

namespace Wehup\AMI\Request;

/**
 * @returns PermissionDeniedResponse
 * @returns QueueInterfaceAlreadyThereResponse
 * @returns NoSuchQueueResponse
 * @returns SuccessResponse
 */
class QueueAddRequest implements RequestInterface
{

    protected $queue;
    protected $interface;
    protected $memberName;
    protected $penalty;
    protected $paused;

    public function __construct($queue, $interface, $memberName = "", $penalty = 0, $paused = false)
    {
        $this->queue = $queue;
        $this->interface = $interface;
        $this->memberName = $memberName;
        $this->penalty = $penalty;
        $this->paused = ($paused === true ? "true" : ($paused === false ? "false" : $penalty));
    }

    public function getAction()
    {
        return 'QueueAdd';
    }

    public function getParams()
    {
        return array(
            'Queue' => $this->queue,
            'Interface' => $this->interface,
            'MemberName' => $this->memberName,
            'Penalty' => $this->penalty,
            'Paused' => $this->paused
        );
    }

    public function getQueue()
    {
        return $this->queue;
    }

    public function getInterface()
    {
        return $this->interface;
    }

    public function getMemberName()
    {
        return $this->memberName;
    }

    public function getPenalty()
    {
        return $this->penalty;
    }

    public function getPaused()
    {
        return $this->paused;
    }

}
