<?php

include '_bootstrap.php';

$request = new Wehup\AMI\Request\QueuePauseRequest('Local/3000@from-queue/n',false);
$response = $manager->send($request);
var_dump($response);
