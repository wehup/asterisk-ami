<?php

namespace Wehup\AMI\Factory;

use Wehup\AMI\Response;
use Wehup\AMI\Exception;

class SIPpeersFactory implements FactoryInterface
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

        if (preg_match('#^Response: Success\r\n#', $body)) {
            $response = new Response\SIPpeersResponse();

            $data = explode("\r\n\r\n", $body);            

            array_shift($data);
            array_pop($data);            

            foreach ($data as $row) {
                if (preg_match('#^Event: PeerEntry\r\n#', $row)) {
                    $entry = array_filter(explode("\r\n", $row)); 
                                                            
                    array_shift($entry);                                                            

                    $response->addPeer($entry);
                }
            }

            return $response;            
        }

        throw new Exception\UnexpectedResponseException($body);
    }

}
