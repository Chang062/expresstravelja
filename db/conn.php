<?php

$host = 'localhost';
$db = 'expresstravelja_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage());
}
require_once 'crud.php';
$crud = new crud($pdo);
require_once 'user.php';
$users = new user($pdo);
require_once 'admin.php';
$admins = new admin($pdo);
//$admins->insertAdmin("admin", "admin@admin.org", "@dministrat0r");
