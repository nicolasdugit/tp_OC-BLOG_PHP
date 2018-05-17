<?php $title = "Mon blog - connection" ?>

<?php ob_start(); ?>
<h1>Connexion</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>



<form action="index.php?action=connection" method="post">
    <div>
        <label for="pseudo">Votre Pseudo : </label><br />
        <input type="text" id="pseudo" name="pseudo" />
    </div>
    <div>
        <label for="pass">Mot de passe</label><br />
        <input type="password" name="pass" id="pass">
    </div>
    <div>
        <input type="submit" />
    </div>
</form>



<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>