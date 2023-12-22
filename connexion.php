<?php require('./inc/unit.php');

$contenu .= "<div class='validation'>Vous êtes inscrit à notre site web. <u>Cliquez ici pour vous connecter</u></div>";

include_once('.inc/templates/haut.php');

echo $contenu; ?>

<form method="post">
  <div class="form-group">
    <label for="exampleInputUser" class="form-label">Votre pseudo</label>
    <input name="pseudo" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Votre mot de passe</label>
    <input name="passwrd" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>