<?php

include '_bootstrap.php';

$request = new Wehup\AMI\Request\CommandRequest('core show version');
$response = $manager->send($request);
var_dump($response);
