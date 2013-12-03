<?php

namespace Wehup\Asterisk\Ami;

use Guzzle\Http\Message\Response as HttpResponse;
use Guzzle\Parser\Cookie\CookieParser;

class ResponseFactory
{

    public static function buildFromHttpResponse(HttpResponse $httpResponse)
    {
        $bodyText = $httpResponse->getBody(true);
        $response = new Response();

        if (preg_match('/Response: Error\r\nMessage: Authentication Required/', $bodyText)) {
            $response->setStatus(Response::AUTHENTICATION_REQUIRED);
            return $response;
        }

        if (preg_match('/Response: Success\r\nMessage: Authentication accepted/', $bodyText)) {
            $response->setStatus(Response::AUTHENTICATION_ACCEPTED);

            $cookieParser = new CookieParser();
            $cookie = $cookieParser->parseCookie($httpResponse->getHeader('Set-Cookie'));
            $response->addData('loginCookie', $cookie['cookies']['mansession_id']);

            return $response;
        }

        if (preg_match('/Response: Error\r\nMessage: Authentication failed/', $bodyText)) {
            $response->setStatus(Response::AUTHENTICATION_FAILED);
            return $response;
        }

        if (preg_match('/Response: Error\r\nMessage: Permission denied/', $bodyText)) {
            $response->setStatus(Response::PERMISSION_DENIED);
            return $response;
        }

        var_dump($bodyText);
        die;

        return $response;
    }

}
