<?php

include '_bootstrap.php';

$request = new Wehup\AMI\Request\CommandRequest('sip reload');
$response = $manager->send($request);
var_dump($response);
