<?php $title = "Mon blog - inscription" ?>

<?php ob_start(); ?>
<h1>Connexion</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>



<form action="index.php?action=inscription" method="post">
    <div>
        <label for="pseudo">Votre Pseudo : </label><br />
        <input type="text" id="pseudo" name="pseudo" />
    </div>
    <div>
        <label for="mail">Votre courriel : </label><br />
        <input type="email" id="mail" name="mail" />
    </div>
    <div>
        <label for="pass">Votre mot de passe</label><br />
        <input type="password" name="pass" id="pass">
    </div>
    <div>
        <label for="pass-confirm">Confirmer votre mot de passe</label><br />
        <input type="password" name="pass-confirm" id="pass-confirm">
    </div>
    <div>
        <input type="submit" />
    </div>
</form>


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>