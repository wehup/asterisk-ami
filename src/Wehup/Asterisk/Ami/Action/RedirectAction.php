<?php

namespace Wehup\Asterisk\Ami\Action;

class RedirectAction implements ActionInterface
{

    protected $channel;
    protected $exten;
    protected $context;
    protected $priority;

    public function __construct($channel, $exten, $context = 'default', $priority = '1')
    {
        $this->channel = $channel;
        $this->exten = $exten;
        $this->context = $context;
        $this->priority = $priority;
    }

    public function getName()
    {
        return 'Redirect';
    }

    public function getParams()
    {
        return array(
            'Channel' => $this->channel,
            'Exten' => $this->exten,
            'Context' => $this->context,
            'Priority' => $this->priority
        );
    }

}
