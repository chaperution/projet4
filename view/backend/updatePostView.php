<?php 

$title = "Panneau d'administration"; ?>

<?php ob_start(); ?>

<section id="adminPanel">
	<h1>Panneau d'administration</h1>
	<a href="index.php?action=admin">Retour au menu</a>
	<div id="managerBlock">
		<div id="updateBlock">
			<form action="index.php?action=submitUpdate&amp;id=<?= $post['id']; ?>" method="post">
				<input type="text" name="title" value="<?= $post['title'];?>" size="158" /><br/>
				<textarea name="content" rows="40" cols="160"><?= nl2br($post['content']);?></textarea>
				<input type="submit" value="Poster" />
			</form>
		</div>
	</div>

</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>