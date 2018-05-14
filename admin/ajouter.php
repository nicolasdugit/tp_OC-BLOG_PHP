<!DOCTYPE html>
<html>
<head>
	<script src="../node_modules/tinymce/tinymce.min.js"></script>
  	<script>tinymce.init({ selector:'#tunymce' });</script>
  	<title>Ajouter article</title>
</head>
<body>
	<form action="ajouter_post.php" method="POST">
		<label for="titre">Titre du message : </label> <input type="text" name="titre">
		<label for="contenu">Message : </label> <textarea id="tinymce" name="contenu"></textarea>
		<input type="submit">
	</form>
	<a href="administrateur.php">Retour page admin</a>
</body>
</html>