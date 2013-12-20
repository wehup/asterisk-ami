<?php

namespace Wehup\Asterisk\Ami\Action;

class ListCommandsAction implements ActionInterface
{

    public function getName()
    {
        return 'ListCommands';
    }

    public function getParams()
    {
        return array();
    }

}
