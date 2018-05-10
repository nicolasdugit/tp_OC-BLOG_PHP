<!DOCTYPE html>
<html>
<head>
	<title>Supprimer un message</title>
</head>
<body>
		<h1>Mon super Blog !</h1>
	<a href="administrateur.php">admin</a>
	<p>Derniers billets du blog : </p>
	<?php 
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=testOC;charset=utf8', 'root', '');
	}
	catch (Exception $e)
	{
		die('Erreur : ' .$e->getMessage());
	}
	//recuperation des derniers messages
	$req = $bdd->query('SELECT id,titre,contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0,5');
	//affichage de chaques message
	while ($donnees = $req->fetch())
	{
		?>
		<div class="news">
			<form action="modifier_post.php?billet=<?php echo $donnees['id'] ?>" method="POST">
				<label for="titre">Titre</label><input type="text" name="titre" value="<?php echo htmlspecialchars($donnees['titre']);?>">
				<label for="contenu">Message : </label><textarea name="contenu"><?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?></textarea>
				<input type="submit">
			</form>
		</div>
		<?php
	} // fin bloucle billets
	$req->closeCursor();
	?>
</body>
</html>