<?php

include 'vendor/autoload.php';

$loginRequest = new Wehup\AMI\Request\LoginRequest('admin', 'admin');
$manager = new Wehup\AMI\Manager('127.0.0.1', 8088, 'asterisk', $loginRequest);
