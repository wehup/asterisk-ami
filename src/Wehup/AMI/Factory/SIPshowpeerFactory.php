<?php

namespace Wehup\AMI\Factory;

use Wehup\AMI\Response;
use Wehup\AMI\Exception;

class SIPshowpeerFactory implements FactoryInterface
{

    protected $request;

    public function __construct(\Wehup\AMI\Request\RequestInterface $request)
    {
        $this->request = $request;
    }

    public function createResponse(\Guzzle\Http\Message\Response $response)
    {        
        $body = $response->getBody(true);
        
        if (preg_match('#^Response: Error\r\nMessage: Permission denied#', $body)) {
            return new Response\PermissionDeniedResponse();
        }

        if (preg_match('#^Response: Error\r\n#', $body)) {
            return new Response\PeerNotFoundResponse();
        }

        if (preg_match('#^Response: Success\r\n#', $body)) {
            $response = new Response\SIPshowpeerResponse();                        
            
            $data = array_filter(explode("\r\n", $body));                        
            array_shift($data);            

            $response->setPeer($data);            

            return $response;
        }

        throw new Exception\UnexpectedResponseException($body);
    }

}
