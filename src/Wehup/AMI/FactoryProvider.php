<?php

namespace Wehup\AMI;

class FactoryProvider
{

    /**
     * @param \Wehup\AMI\Request\RequestInterface $request
     * @return \Wehup\AMI\Factory\FactoryInterface
     */
    public static function getFactoryByRequest(Request\RequestInterface $request)
    {
        $reflection = new \ReflectionObject($request);
        $classname = substr($reflection->getShortName(), 0, -7); // remove "Request" suffix
        $fqcn = "\\Wehup\\AMI\Factory\\{$classname}Factory";

        if (!class_exists($fqcn)) {
            throw new Exception\NoFactoryClassAvailableException("There is no available Factory class for \"{$classname}\"", $fqcn);
        }

        return new $fqcn($request);
    }

}
