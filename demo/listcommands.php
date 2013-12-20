<?php

include '_bootstrap.php';

$request = new Wehup\AMI\Request\ListCommandsRequest();
$response = $manager->send($request);
var_dump($response);
