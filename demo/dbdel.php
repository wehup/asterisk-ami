<?php

include '_bootstrap.php';

$request = new Wehup\AMI\Request\DBDelRequest('Family', 'Key');
$response = $manager->send($request);
var_dump($response);
