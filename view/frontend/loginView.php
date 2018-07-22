<?php $title = "Connexion"; ?>

<?php ob_start(); ?>


<section id="loginFrame">
	<div class="formBlock">
		<form action="index.php?action=loginSubmit" method="post">
			<label for="pseudo">Pseudo</label><br/>
			<input type="text" name="pseudo" id="pseudo" required /></br>
			<label for="pass">Mot de passe</label><br />
			<input type="password" name="pass" id="pass" required /></br>
			<input type="submit" value="Se connecter" />
		</form>
		<a href="index.php?action=subscribe">Pas encore inscrit? C'est par ici ;)</a>
	</div>
</section>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>