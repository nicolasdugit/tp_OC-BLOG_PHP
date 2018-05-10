<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=testOC', 'root', '');
}
catch (Exception $e)
{
	die('Erreur : ' .$e->getMessage());
}
if ($_POST['titre'] AND $_POST['contenu'] ) 
{
$req = $bdd->prepare('INSERT INTO billets (titre, contenu, date_creation) VALUES (?,?, NOW() )');
$req->execute(array(htmlspecialchars($_POST['titre']), htmlspecialchars($_POST['contenu'])));
}
//redirection vers commentaires.php
header("location: ajouter.php");
?>