<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mon super blog !</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Mon super Blog !</h1>
	<a href="index.php">Retour à la liste des billets</a>
	<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=testOC;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
		die('Erreur : ' .$e->getMessage());
	}
	$req = $bdd->prepare('SELECT id,titre,contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id=?');
	$req->execute(array($_GET['billet']));
	$donnees = $req->fetch();
	?>
	<div class="news">
		<h3>
			<?php echo htmlspecialchars($donnees['titre']);?> 
			<em>le <?php echo $donnees['date_creation_fr']; ?></em>
		</h3>
		<p>
			<?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?>
		</p>
	</div>

	<h2>Commentaires</h2>
	<?php
	$req->closeCursor();
	// recuperation des commentaires
	$req = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
	$req->execute(array($_GET['billet']));
	while($donnees = $req->fetch())
	{
		?>
		<div>
			<p><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?> </p>
			<p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
		</div>
		<?php
	} // fin de la boucle des commentaires
	$req->closeCursor();
	?>
	<form method="POST" action="commentaires_post.php?billet=<?php echo $_GET['billet'] ?>">
		<label for="auteur">Auteur : </label><input type="text" name="auteur"><br>
		<label for="commentaire">Commentaire : </label><textarea name="commentaire"></textarea><br>
		<input type="submit" value="Valider">
	</form>
</body>
</html>