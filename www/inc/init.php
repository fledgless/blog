<?php session_start(); ?>
<?php

$host = $_ENV['MYSQL_HOST'];
$username = $_ENV['MYSQL_USER'];
$password = $_ENV['MYSQL_PASSWORD'];
$database = $_ENV['MYSQL_DATABASE'];

$mysqli = new mysqli($host, $username, $password, $database);
if ($mysqli->connect_error) die("Un problème est survenu lors de la tentative de connexion à la BDD :" . $mysqli->connect_error);

require('function.php');

$contenu = '';

// $mysqli->query("INSERT INTO user (pseudo, email, passwrd) VALUES ('fledgless', 'cameriancardinal@gmail.com', '12345')");

// $pdo = new PDO('mysql:host=localhost;dbname=blog', "db_user", "Asterion*1911", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

// $result = $pdo->exec("INSERT INTO user (pseudo, email, passwrd) VALUES ('crowling', 'cameriancardinal@gmail.com', '12345')");

