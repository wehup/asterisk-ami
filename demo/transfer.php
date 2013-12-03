<?php

include '_bootstrap.php';

$command = new Wehup\Asterisk\Ami\Action\RedirectAction('SIP/7005', '7000', 'transferencias');
$response = $manager->send($command);
var_dump($response);
