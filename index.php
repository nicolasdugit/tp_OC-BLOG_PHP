<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Mon super blog !</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Mon super Blog !</h1>
	<p>Derniers billets du blog :  à</p>
	<?php 
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=testOC;charset=utf8', 'root', '');
	}
	catch (Exception $e)
	{
		die('Erreur : ' .$e->getMessage());
	}
	//recuperation des 5 derniers messages
	$reponse = $bdd->query('SELECT * FROM billets');
	//affichage de chaques message
	while ($donnees = $reponse->fetch())
	{
		?>
		<div class="news">
			<h3><?php echo htmlspecialchars($donnees['titre']);?> le <?php echo htmlspecialchars($donnees['date_creation']); ?>  </h3>
			<p>
				<?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?>
			</p>
			<a href="commentaires.php">Commentaire</a>
		</div>
		<?php
	}
	?>
</body>
</html>