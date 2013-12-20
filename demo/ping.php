<?php

include '_bootstrap.php';

$request = new Wehup\AMI\Request\PingRequest();
$response = $manager->send($request);
var_dump($response);
