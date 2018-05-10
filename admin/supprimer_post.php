<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=testOC', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
	die('Erreur : ' .$e->getMessage());
}

$req = $bdd->prepare('DELETE FROM billets WHERE ID = ?');
$req->execute(array($_GET['billet']));

header("location: supprimer.php");
?>