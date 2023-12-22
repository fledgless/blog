<!-- mysqli -->
<?php

$mysqli = new mysqli("localhost", "db_user", "Asterion*1911", "blog");
if ($mysqli->connect_error) die("Un problème est survenu lors de la tentative de connexion à la BDD :" . $mysqli->connect_error);

require('function.php');

$contenu = '';

// $mysqli->query("INSERT INTO user (pseudo, email, passwrd) VALUES ('fledgless', 'cameriancardinal@gmail.com', '12345')");

// $pdo = new PDO('mysql:host=localhost;dbname=blog', "db_user", "Asterion*1911", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

// $result = $pdo->exec("INSERT INTO user (pseudo, email, passwrd) VALUES ('crowling', 'cameriancardinal@gmail.com', '12345')");

