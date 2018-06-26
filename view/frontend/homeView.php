<?php $title = "Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

<div class="framePost">

<?php
while ($data = $posts->fetch()) {
	if (!empty($data)) {
?>
	
	<div class="post">
		<div class="headPost">
			<h3>
				<?= htmlspecialchars($data['title']); ?>
				<em>le <?= $data['date_fr']; ?></em>
			</h3>
		</div>
		<p class="chapters">
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

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>