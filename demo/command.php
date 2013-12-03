<?php

include '_bootstrap.php';

$command = new Wehup\Asterisk\Ami\Action\CommandAction('sip show channels');
$response = $manager->send($command);
var_dump($response);