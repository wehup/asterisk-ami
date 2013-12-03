<?php

namespace Wehup\Asterisk\Ami;

use Wehup\Asterisk\Ami\Action\ActionInterface;
use Guzzle\Http\Client;
use Wehup\Asterisk\Ami\Action\LoginAction;

class Manager implements ManagerInterface
{

    protected $username;
    protected $password;
    protected $http;
    protected $loginCookie;
    protected $prefix;

    public function __construct($host, $port, $username, $password, $prefix = null)
    {
        $this->http = new Client("http://{$host}:{$port}");
        $this->username = $username;
        $this->password = $password;
        $this->prefix = (empty($prefix) ? null : "/{$prefix}");
    }

    /**
     * Send Action to Asterisk
     * 
     * @param \Wehup\Asterisk\Ami\Action\ActionInterface $action
     * @return \Wehup\Asterisk\Ami\Response
     */
    protected function _send(ActionInterface $action)
    {
        $query = http_build_query(array_merge($action->getParams(), array('Action' => $action->getName())));
        $url = $this->prefix . '/rawman?' . $query;

        $request = $this->http->get($url);
        $request->addCookie('mansession_id', $this->loginCookie);
        $httpResponse = $request->send();

        if ($httpResponse->getStatusCode() != 200) {
            throw new \Exception('Something wrong with HTTP AMI.');
            /** @todo Throw specific exception */
        }

        return ResponseFactory::buildFromHttpResponse($httpResponse);
    }

    public function send(ActionInterface $action)
    {
        if ($this->loginCookie) {
            $response = $this->_send($action);

            if ($response->getStatus() != Response::PERMISSION_DENIED) {
                return $response;
            }
        }

        $this->authenticate();
        $response = $this->_send($action);

        return $response;
    }

    protected function authenticate()
    {
        $loginAction = new LoginAction($this->username, $this->password);
        $response = $this->_send($loginAction);

        if ($response->getStatus() != Response::AUTHENTICATION_ACCEPTED) {
            throw new \Exception('Could not authenticate.');
            /** @todo Throw specific exception */
        }

        $this->loginCookie = $response->getData('loginCookie');
    }

}
