<?php $title = "Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>
<h1>Retrouvez les derniers chapitres publiés de "Billet simple pour l'Alaska"</h1>

<?php
while ($data = $posts->fetch()) {
	if (!empty($data)) {
		// récupère le contenu du billet dans le fichier billet.php
?>
		<div class="news">
		<h3>
			<?= htmlspecialchars($data['title']); ?>
			<em>le <?= $data['date_fr']; ?></em>
		</h3>
		<p>
		<?=
			nl2br(htmlspecialchars($data['content']));
		?>
		<br />
		<em><a href="index.php?action=post&amp;id=<?= $data['id']; ?>">Lire la suite ...</a></em>
		</p>
	</div>
<?php
	} else {
		echo "Ce billet n'existe pas.";
	}
}

	$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>