<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=testOC', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
	die('Erreur : ' .$e->getMessage());
}
$req = $bdd->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire, date_commentaire) VALUES (?,?,?, NOW() )');
$req->execute(array($_GET['billet'],$_POST['auteur'],$_POST['commentaire']));
//redirection vers commentaires.php
$redirect = $_GET['billet'];
header("location: commentaires.php?billet=$redirect");
?>