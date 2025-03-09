<?php

require 'vendor/autoload.php';

$client = new WebSocket\Client("ws://localhost:8081");
$client->text("user@user.com:new-comment");
$client->close();