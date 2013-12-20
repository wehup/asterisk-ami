<?php

namespace Wehup\AMI\Response;

class CommandListResponse implements ResponseInterface
{

    protected $commands = array();

    public function getCommands()
    {
        return $this->commands;
    }

    public function addCommand($command, $description)
    {
        $this->commands[$command] = $description;
    }

}
