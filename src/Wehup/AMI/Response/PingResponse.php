<?php

namespace Wehup\AMI\Response;

class PingResponse implements ResponseInterface
{

    protected $time;

    public function getTime()
    {
        return $time;
    }

    public function setTime($time)
    {
        $this->time = $time;
    }

}
