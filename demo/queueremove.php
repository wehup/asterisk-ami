<?php

include '_bootstrap.php';

$request = new Wehup\AMI\Request\QueueRemoveRequest('queue-2', 'Local/3000@from-queue');
$response = $manager->send($request);
var_dump($response);
