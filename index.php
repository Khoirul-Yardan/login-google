<?php
require 'config.php';
$login_url = $client->createAuthUrl();
?>
<a href="<?= $login_url ?>">Login dengan Google</a>
