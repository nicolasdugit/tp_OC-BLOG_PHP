<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $title ?></title>
	<link rel="stylesheet" href="public/css/style.css">

</head>
<body>
	<header>
		<?php 
		if (isset($_SESSION['pseudo'])) {
			
			echo "Bonjour " . $_SESSION['pseudo'] . ". Vous etes connnecté" ;
			?>
				<a href="index.php?action=deconnection">Se déconnecter</a>
			<?php
		}
		else {
			
			?>
				<a href="index.php?action=connectionPage">Connexion</a>

				<a href="index.php?action=inscriptionPage">Inscription</a>
			<?php
		}
		?>
	</header>
	<?= $content ?>
	<a href="admin/index.php?action=connection">admin</a>
</body>
</html>