<?php

include '_bootstrap.php';

$request = new Wehup\AMI\Request\DBDelTreeRequest('Family');
$response = $manager->send($request);
var_dump($response);
