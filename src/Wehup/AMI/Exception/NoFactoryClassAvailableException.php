<?php

namespace Wehup\AMI\Exception;

class NoFactoryClassAvailableException extends \Exception
{

    protected $fqcn;

    public function __construct($message, $fqcn)
    {
        parent::__construct($message);

        $this->fqcn = $fqcn;
    }

    public function getFqcn()
    {
        return $this->fqcn;
    }

}
