<?php require('./inc/init.php'); ?>
<?php if(isset($_GET['action']) && $_GET['action'] === "deconnexion") {
  session_destroy();
  header("location:/");
}
if (internauteEstConnecte()) {
  header ("location: profil.php");
}
if($_POST) {
  $resultat = executeRequete("SELECT * FROM utilisateur WHERE slug='$_POST[slug]'");
  if($resultat->num_rows != 0) {
    $utilisateur = $resultat->fetch_assoc();
    if(password_verify($_POST['passwrd'], $utilisateur['passwrd'])) {
      foreach($utilisateur as $indice => $element) {
        if($indice != 'passwrd') {
          $_SESSION['utilisateur'][$indice] = $element;
        }
      };
      header('location: profil.php');
    } else {
      $contenu .= '<div class="erreur">Erreur : mot de passe incorrect.</div>';
    };
  } else {
    $contenu .= '<div class="erreur">Erreur : pseudo inexistant.</div>';
  }
}
?>
<?php include_once("./inc/templates/haut.php") ?>
<?php echo $contenu ?>
<form method="post">
  <div class="form-group">
    <label class="form-label">Identifiant</label>
    <input type="text" name="slug" minlength="1" class="form-control">
  </div>
  <div class="form-group">
    <label class="form-label">Mot de passe</label>
    <input name="passwrd" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
<?php include_once('./inc/templates/bas.php'); ?>