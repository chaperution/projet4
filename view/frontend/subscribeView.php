<?php $title = "Inscrivez-vous"); ?>

<?php ob_start(); ?>

<div id="subscribeFrame">
	<form action="index.php?action=addMember" method="post">
		<label for="pseudo">Pseudo</label></br>
		<input type="text" name="pseudo" id="pseudo" required />
		<label for="pass">Mot de passe</label></br>
		<input type="password" name="pass" id="pass" required />
		<label for="pass">Retapez votre mot de passe</label></br>
		<input type="password" name="pass" id="pass" required />
		<label for="mail">Adresse email</label></br>
		<input type="email" name="mail" id="mail" required />
		<input type="submit" value="S'inscrire" />
	</form>
</div>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>