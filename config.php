<?php
require_once 'vendor/autoload.php';

$client = new Google_Client();
$client->setClientId('391661783928-74h1f9ivuoutjigrh6a25jndmk1q9met.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/login/callback.php');
$client->addScope("email");
$client->addScope("profile");
