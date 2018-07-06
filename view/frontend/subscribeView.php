<?php $title = "Inscrivez-vous"; ?>

<?php ob_start(); ?>

<section id="subscribeFrame">
	<div class="formBlock">
		<form action="index.php?action=addMember" method="post">
			<label for="pseudo">Pseudo</label>
			<input type="text" name="pseudo" id="pseudo" required /><br />
			<label for="pass">Mot de passe</label>
			<input type="password" name="pass" id="pass" required /><br />
			<label for="pass_confirm">Retapez votre mot de passe</label>
			<input type="password" name="pass_confirm" id="pass_confirm" required /><br />
			<label for="mail">Adresse email</label>
			<input type="email" name="mail" id="mail" required /><br />
			<input type="submit" value="S'inscrire" />
		</form>
	</div>

<?php 
if (isset($_GET['error']) && $_GET['error'] == 'invalidUsername') {
	echo '<p id="error">Pseudo déjà utilisé</p>';
}

if (isset($_GET['error']) && $_GET['error'] == 'invalidMail') {
	echo '<P id="error">Adresse email déjà utilisée</p>';
}

?>


</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>