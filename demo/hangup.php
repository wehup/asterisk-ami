<?php

include '_bootstrap.php';

$request = new Wehup\AMI\Request\HangupRequest("/^SIP/3000-.*$/",0);
$response = $manager->send($request);
var_dump($response);
