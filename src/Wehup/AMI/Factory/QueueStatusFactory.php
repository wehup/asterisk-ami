<?php

namespace Wehup\AMI\Factory;

use Wehup\AMI\Response;
use Wehup\AMI\Exception;

class QueueStatusFactory implements FactoryInterface
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
            $response = new Response\QueueStatusResponse();

            $data = explode("\r\n\r\n", $body);            

            array_shift($data);
            array_pop($data);

            foreach ($data as $row) {
                if (preg_match('#^Event: QueueParams\r\n#', $row)) $response->addQueue($row);                                    
                if (preg_match('#^Event: QueueMember\r\n#', $row)) $response->addMember($row);                                    
                if (preg_match('#^Event: QueueEntry\r\n#', $row)) $response->addCaller($row);                                    
            }            

            return count($response->getQueues()) == 0 ? new Response\NoSuchQueueResponse() : $response;
        }

        throw new Exception\UnexpectedResponseException($body);
    }

}
