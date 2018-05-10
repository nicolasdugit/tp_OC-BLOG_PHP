<!DOCTYPE html>
<html>
<head>
	<title>Ajouter article</title>
</head>
<body>
	<form action="ajouter_post.php" method="POST">
		<label for="titre">Titre du message : </label> <input type="text" name="titre">
		<label for="contenu">Message : </label> <textarea name="contenu"></textarea>
		<input type="submit">
	</form>
	<a href="administrateur.php">Retour page admin</a>
</body>
</html>