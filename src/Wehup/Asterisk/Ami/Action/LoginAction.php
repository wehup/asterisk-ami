<?php

namespace Wehup\Asterisk\Ami\Action;

class LoginAction implements ActionInterface
{

    protected $username;
    protected $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function getName()
    {
        return 'Login';
    }

    public function getParams()
    {
        return array('Username' => $this->username, 'Secret' => $this->password);
    }

}
