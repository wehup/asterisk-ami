<?php

include '_bootstrap.php';

$request = new Wehup\AMI\Request\SIPpeerRequest('1234');
$response = $manager->send($request);
var_dump($response);
