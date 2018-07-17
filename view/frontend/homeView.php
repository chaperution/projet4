<?php 

$title = "Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

<section class="framePost">

<?php

// si compte bien créé, affiche message de confirmation à l'utilisateur
if (isset($_GET['account-status']) && $_GET['account-status'] == 'account-successfully-created') {
	echo '<p id="success">Votre compte a bien été créé. <a href="index.php?action=login">Se connecter</a></p>';
}

if (isset($_GET['logout']) && $_GET['logout'] == 'success') {
	echo '<p id="success">Vous êtes bien deconnecté.</p>';
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
			<div class="chapters">
			<?php
				$extract = substr($data['content'], 0, 1000);
				echo $extract . " ...";
			?>
			<br />
				<div class="readMore">
					<a href="index.php?action=post&amp;id=<?= $data['id']; ?>">Lire la suite ...</a>
				</div>
			</div>
		</div>
	</div>

	
<?php
	} else {
		echo "Ce billet n'existe pas.";
	}
}

	$posts->closeCursor();

?>



</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

