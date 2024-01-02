<?php require("./inc/init.php") ?>
<?php 



?>

<?php
if($_POST) {
    $utilisateur = executeRequete("select * from utilisateur where slug='$_POST[pseudo]'");
    if ($utilisateur->num_rows > 0) {
        $contenu .= "<div class='erreur'>Pseudo indisponible. Veuillez en choisir un autre svp.</div>";
    } else {
        $_POST['passwrd'] = password_hash($_POST['passwrd'], PASSWORD_BCRYPT);
        executeRequete("INSERT INTO utilisateur
        (slug, email, passwrd, is_admin)
        VALUES('$_POST[pseudo]', '$_POST[email]', '$_POST[passwrd]', 0);");
        header("location connexion.php");
    }
}
?>

<?php include_once("./inc/templates/haut.php") ?>

<h1>Inscription</h1>
<?php echo $contenu ?>
<form method="post">
  <div class="form-group">
    <label for="exampleInputUser" class="form-label">Votre pseudo</label>
    <input name="pseudo" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1" class="form-label">Votre email</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Votre mot de passe</label>
    <input name="passwrd" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php include_once("./inc/templates/bas.php") ?>

