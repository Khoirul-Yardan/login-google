<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=lo", "root", "");
} catch (PDOException $e) {
    die("DB Error: " . $e->getMessage());
}
