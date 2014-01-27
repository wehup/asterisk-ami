<?php

namespace Wehup\AMI\Request;

/**
 * @returns CommandResponse
 * @returns PermissionDeniedResponse
 */
class CommandRequest implements RequestInterface
{

    protected $command;

    public function __construct($command)
    {
        $this->command = $command;
    }

    public function getAction()
    {
        return 'Command';
    }

    public function getParams()
    {
        return array(
            'Command' => $this->command,
        );
    }

    public function getCommand()
    {
        return $this->command;
    }

}
