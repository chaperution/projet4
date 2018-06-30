<?php $title = "Inscrivez-vous"; ?>

<?php ob_start(); ?>

<div id="loginFrame">
	<form action="index.php?action=" method="post">
		<label for="pseudo">Pseudo</label></br>
		<input type="text" name="pseudo" id="pseudo" required />
		<label for="pass">Mot de passe</label></br>
		<input type="password" name="pass" id="pass" required />
		<input type="submit" value="Se connecter" />
	</form>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>