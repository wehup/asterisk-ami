<?php

include '_bootstrap.php';

$request = new Wehup\AMI\Request\UserEventRequest("evento-teste",array("cab1" => "val1", "cab2" => "val2"));
$response = $manager->send($request);
var_dump($response);
