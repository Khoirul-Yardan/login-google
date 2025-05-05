<?php
require 'config.php';
require 'db.php';

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    if (!isset($token['error'])) {
        $client->setAccessToken($token['access_token']);
        $oauth2 = new \Google\Service\Oauth2($client);
$data = $oauth2->userinfo->get();


        // Ambil data user
        $email = $data['email'];
        $name = $data['name'];
        $google_id = $data['id'];

        // Simpan ke DB
        $check = $db->prepare("SELECT * FROM users WHERE google_id = ?");
        $check->execute([$google_id]);
        if ($check->rowCount() == 0) {
            $insert = $db->prepare("INSERT INTO users (google_id, name, email) VALUES (?, ?, ?)");
            $insert->execute([$google_id, $name, $email]);
        }

        // Login berhasil
        session_start();
        $_SESSION['user'] = $name;
        echo "Login berhasil, halo $name!";
    }
}
