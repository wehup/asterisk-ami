<?php

namespace Wehup\AMI\Request;

/**
 * @returns PermissionDeniedResponse 
 * @returns InterfaceNotFoundResponse 
 * @returns SuccessResponse
 */
class QueuePauseRequest implements RequestInterface
{

    protected $interface;
    protected $paused;
    protected $queue;
    protected $reason;     

    public function __construct($interface, $paused, $queue = "", $reason = "")
    {
        $this->interface = $interface;
        $this->paused = ($paused === true ? "true" : "false");
        $this->queue = $queue;
        $this->reason = (empty($reason) ? $interface . " " . ($this->paused ? "paused" : "unpaused") : $reason);
    }

    public function getAction()
    {
        return 'QueuePause';
    }

    public function getParams()
    {
        return array(
            'Interface' => $this->interface,
            'Paused' => $this->paused,
            'Queue' => $this->queue,
            'Reason' => $this->reason                                                
        );
    }

    public function getInterface()
    {
        return $this->interface;
    }

    public function getPaused()
    {
        return $this->paused;
    }

    public function getQueue()
    {
        return $this->queue;
    }    

    public function getReason()
    {
        return $this->reason;
    }    

}
