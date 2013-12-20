<?php

include '_bootstrap.php';

$request = new Wehup\AMI\Request\DBPutRequest('Family', 'Key', 'Value');
$response = $manager->send($request);
var_dump($response);
