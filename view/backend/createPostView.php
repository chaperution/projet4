<?php 

$title = "Nouvel article"; ?>

<?php ob_start(); ?>

<section id="createPost">
	<h1>Panneau d'administration</h1>
		<div id="managerBlock">
			<p class="returnLink"><a href="index.php?action=admin">Retour au menu</a></p>
			<div id="updateBlock">
				<form action="index.php?action=submitPost" method="post">
					<label for="title">Titre : </label>
					<input type="text" name="title" id="title" placeholder="Votre titre" size="80" /><br/>
					<textarea name="content" rows="40" cols="160"></textarea>
					<input type="submit" value="Poster" />
				</form>
			</div>
		</div>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>