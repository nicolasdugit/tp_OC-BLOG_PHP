<div class="news">
	<h3>
		<?php echo htmlspecialchars($donnees['titre']);?> 
		<em>le <?php echo $donnees['date_creation_fr']; ?></em>
	</h3>
	<p>
		<?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?>
		<br>
		<em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
	</p>
</div>
	