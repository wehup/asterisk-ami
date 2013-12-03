<?php

namespace Wehup\Asterisk\Ami\Action;

class CommandAction implements ActionInterface
{

    protected $command;

    public function __construct($command)
    {
        $this->command = $command;
    }

    public function getName()
    {
        return 'Command';
    }

    public function getParams()
    {
        return array('Command' => $this->command);
    }

}
