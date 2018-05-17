<?php $title = "Mon Blog - page administrateur - connexion"; ?>

<?php ob_start(); ?>
<h1>Mon super blog ! - PAGE ADMINISTRATEUR</h1>


<form action="admin/index.php?action=connexion" method="post">
    <div>
        <label for="pseudo">Votre pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo">
    </div>
    <div>
        <label for="pass">Modifier le commentaire</label><br>
        <input type="password" id="pass" name="pass">
    </div>
    <div>
        <input type="submit">
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
