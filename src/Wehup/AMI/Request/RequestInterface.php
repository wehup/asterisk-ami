<?php

namespace Wehup\AMI\Request;

interface RequestInterface
{

    public function getAction();

    public function getParams();
}
