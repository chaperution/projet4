<?php $title = "Connexion"; ?>

<?php ob_start(); ?>

<div id="loginFrame">
	<form action="index.php?action=" method="post">
		<label for="pseudo">Pseudo</label></br>
		<input type="text" name="pseudo" id="pseudo" required />
		<label for="pass">Mot de passe</label></br>
		<input type="password" name="pass" id="pass" required /></br>
		<input type="submit" value="Se connecter" />
	</form>
	<a href="index.php?action=subscribe">Pas encore inscrit? C'est par ici ;)</a>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>