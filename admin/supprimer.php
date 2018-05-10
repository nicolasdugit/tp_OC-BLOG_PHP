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
			<h3><?php echo htmlspecialchars($donnees['titre']);?> 
				<em>le <?php echo $donnees['date_creation_fr']; ?></em>
			</h3>
			<p>
				<?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?>
				<br>
				<em><a href="supprimer_post.php?billet=<?php echo $donnees['id']; ?>">Supprimer</a></em>
			</p>
		</div>
		<?php
	} // fin bloucle billets
	$req->closeCursor();
	?>
</body>
</html>