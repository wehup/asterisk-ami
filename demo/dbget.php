<?php

include '_bootstrap.php';

$request = new Wehup\AMI\Request\DBGetRequest('Family', 'Key');
$response = $manager->send($request);
var_dump($response);
