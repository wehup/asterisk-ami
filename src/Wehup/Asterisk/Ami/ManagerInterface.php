<?php

namespace Wehup\Asterisk\Ami;

use Wehup\Asterisk\Ami\Action\ActionInterface;

interface ManagerInterface
{

    public function __construct($host, $port, $username, $password);

    public function send(ActionInterface $command);
}
