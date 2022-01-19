<?php

namespace Wehup\AMI\Request;

/**
 * @returns PermissionDeniedResponse
 * @returns QueueInterfaceNotThereResponse
 * @returns NoSuchQueueResponse
 * @returns SuccessResponse
 */
class QueueRemoveRequest implements RequestInterface
{

    protected $queue;
    protected $interface;

    public function __construct($queue, $interface)
    {
        $this->queue = $queue;
        $this->interface = $interface;
    }

    public function getAction()
    {
        return 'QueueRemove';
    }

    public function getParams()
    {
        return array(
            'Queue' => $this->queue,
            'Interface' => $this->interface
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
}
