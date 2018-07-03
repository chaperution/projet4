<?php $title = "Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

<div class="framePost">

<?php
// si compte bien créé, affiche message de confirmation à l'utilisateur
if (isset($_GET['account-status']) && $_GET['account-status'] == 'account-successfully-created') {
	echo '<p id="success">Votre compte a bien été créé. <a href="index.php?action=login">Se connecter</a></p>';
}

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
		<div class="content">
			<p class="chapters">
			<?php
				$extract = substr($data['content'], 0, 1000);
				echo nl2br(htmlspecialchars($extract)) . " ...";
			?>
			<br />
				<div class="readMore">
					<a href="index.php?action=post&amp;id=<?= $data['id']; ?>">Lire la suite ...</a>
				</div>
			</p>
		</div>
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