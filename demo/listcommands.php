<?php

include '_bootstrap.php';

$command = new Wehup\Asterisk\Ami\Action\ListCommandsAction();
$response = $manager->send($command);
var_dump($response);