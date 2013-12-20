<?php

namespace Wehup\AMI\Factory;

use Wehup\AMI\Response;

class ListCommandsFactory implements FactoryInterface
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
            $response = new Response\CommandListResponse();

            $data = explode("\r\n", $body);
            array_shift($data);

            foreach ($data as $row) {
                $match = explode(':', $row, 2);
                $response->addCommand($match[0], trim($match[1]));
            }

            return $response;
        }

        throw new Exception\UnexpectedResponseException();
    }

}
