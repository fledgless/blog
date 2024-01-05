<?php require('./inc/init.php'); ?>
<?php

// executeRequete("INSERT INTO utilisateur (id_user, slug, email, passwrd, is_admin) VALUES (0, 'test', 'test@test.fr', '12345', 1);")

if ($_POST) {
    // debug($_POST);
    $verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['slug']);
    if (!$verif_caractere || (strlen($_POST['slug']) < 1 || strlen($_POST['slug']) > 20)) // 
    {
        $contenu .= "<div class='erreur'>Le pseudo doit contenir entre 1 et 20 caractères. <br> Caractère accepté : Lettre de A à Z et chiffre de 0 à 9</div>";
    } else {
        $utilisateur = executeRequete("SELECT * FROM utilisateur WHERE slug='$_POST[slug]'");
        if ($utilisateur->num_rows > 0) {
            $contenu .= "<div class='erreur'>Pseudo indisponible. Veuillez en choisir un autre svp.</div>";
        } else {
            $_POST['passwrd'] = password_hash($_POST['passwrd'], PASSWORD_BCRYPT);
            foreach ($_POST as $indice => $valeur) {
                $_POST[$indice] = htmlEntities(addSlashes($valeur));
            }
            executeRequete("INSERT INTO utilisateur (slug, email, passwrd, is_admin) VALUES ('$_POST[slug]', '$_POST[email]', '$_POST[passwrd]', 0)");
            // $contenu .= "<div class='validation'>Vous êtes inscrit à notre site web. <a href="connexion.php"><u>Cliquez ici pour vous connecter</u></a></div>";
            header('location: connexion.php');
        }
    }
}

?>
<?php include_once("./inc/templates/haut.php"); ?>
<?php echo $contenu ?>
<form method="post" id="inscription">
    <!-- Slug input -->
    <div class="form-outline mb-4">
        <input type="text" name="slug" id="slug" class="form-control" />
        <label class="form-label" for="slug">Identifiant</label>
    </div>
    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="email" name="email" id="form2Example1" class="form-control" />
        <label class="form-label" for="form2Example1">Email address</label>
    </div>
    <!-- Password input -->
    <div class="form-outline mb-4">
        <input type="password" name="passwrd" id="form2Example2" class="form-control" />
        <label class="form-label" for="form2Example2">Password</label>
    </div>
    <!-- Submit button -->
    <button class="btn btn-primary btn-block mb-4">S'inscrire</button>
</form>
<?php include_once('./inc/templates/bas.php'); ?>