<?php

include '_bootstrap.php';

$request = new Wehup\AMI\Request\QueueStatusRequest();
$response = $manager->send($request);
var_dump($response);
