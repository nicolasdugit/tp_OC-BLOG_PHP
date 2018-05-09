<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=testOC;charset=utf8', 'root', '');
}
catch (Exception $e)
{
	die('Erreur : ' .$e->getMessage());
}
$req = $bdd->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire, date_commentaire VALUES (? ,? ,? ,NOW())) ');
$req->execute(array($_POST['billet'],$_POST['auteur'],$_POST['commentaire']));
//redirection vers commentaires.php
header('location: commentaires.php');
?>