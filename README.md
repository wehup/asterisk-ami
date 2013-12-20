Asterisk AMI
============

PHP 5.3 abstraction of Asterisk 1.6 AMI

Installation
------------

Run:

    composer install

Usage
-----

    // Create the Manager
    $manager = new Wehup\AMI\Manager('127.0.0.1', 8088, 'asterisk');
    
    // Create the request
    $request = new Wehup\AMI\Request\PingRequest();
    
    // Send request
    $response = $manager->send($request);