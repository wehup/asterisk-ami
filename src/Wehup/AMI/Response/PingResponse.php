<?php

namespace Wehup\AMI\Response;

class PingResponse implements ResponseInterface
{

    protected $time;

    public function getTime()
    {
        return $this->time;
    }

    public function setTime(\DateTime $time)
    {
        $this->time = $time;
    }

}
