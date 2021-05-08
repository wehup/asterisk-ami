Asterisk AMI
============

PHP 5.3 abstraction of Asterisk 1.6 AMI

Installation
------------

Add to your `composer.json`:

    {"require":{
        "wehup/asterisk-ami": "dev-master"
    }}

Run:

    composer install

Usage
-----

    // Create the LoginRequest
    $loginRequest = new \Wehup\AMI\Request\LoginRequest('username', 'password');
    
    // Create the Manager
    $manager = new \Wehup\AMI\Manager('127.0.0.1', 8088, 'asterisk', $loginRequest);
    
    // Create the request
    $request = new \Wehup\AMI\Request\PingRequest();
    
    // Send request
    $response = $manager->send($request);

Supported commands
------------------

* [Command](https://wiki.asterisk.org/wiki/display/AST/ManagerAction_Command)
* [DBDel](https://wiki.asterisk.org/wiki/display/AST/ManagerAction_DBDel)
* [DBDelTree](https://wiki.asterisk.org/wiki/display/AST/ManagerAction_DBDelTree)
* [DBGet](https://wiki.asterisk.org/wiki/display/AST/ManagerAction_DBGet)
* [DBPut](https://wiki.asterisk.org/wiki/display/AST/ManagerAction_DBPut)
* [ListCommands](https://wiki.asterisk.org/wiki/display/AST/ManagerAction_ListCommands)
* [Login](https://wiki.asterisk.org/wiki/display/AST/ManagerAction_Login)
* [Ping](https://wiki.asterisk.org/wiki/display/AST/ManagerAction_Ping)
* [SIPpeers](https://wiki.asterisk.org/wiki/display/AST/ManagerAction_SIPpeers)
* [SIPshowpeer](https://wiki.asterisk.org/wiki/display/AST/ManagerAction_SIPshowpeer)

Are you missing support to an useful command? Open an [issue](https://github.com/wehup/asterisk-ami/issues/new), so we can add it.
