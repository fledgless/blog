<?php require("./inc/unit.php") ?>
<?php 
executeRequete("INSERT INTO user 
(pseudo, email, passwrd) VALUES 
('crowless', 'cameriancardinal@gmail.com', '12345')") ?>

<?php include_once("./inc/templates/haut.php") ?>
<h1>Inscription</h1>
<form action=""></form>
<?php include_once("./inc/templates/bas.php") ?>

