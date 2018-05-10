<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=testOC', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
	die('Erreur : ' .$e->getMessage());
}

$req = $bdd->prepare('UPDATE billets SET titre = ?, contenu = ? WHERE ID = ?');
$req->execute(array($_POST['titre'], $_POST['contenu'], $_GET['billet']));

header("location: modifier.php");
?>
