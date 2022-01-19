<?php

include '_bootstrap.php';

$request = new Wehup\AMI\Request\QueueAddRequest('queue-2', 'Local/3000@from-queue','Teste');
$response = $manager->send($request);
var_dump($response);
