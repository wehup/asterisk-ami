<?php

include '_bootstrap.php';

$request = new Wehup\AMI\Request\SIPPeersRequest();
$response = $manager->send($request);
var_dump($response);
