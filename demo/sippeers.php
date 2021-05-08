<?php

include '_bootstrap.php';

$request = new Wehup\AMI\Request\SIPpeersRequest();
$response = $manager->send($request);
var_dump($response);
