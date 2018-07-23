<?php $title = "Inscrivez-vous"; ?>

<?php ob_start(); ?>

<section id="subscribeFrame">
<?php 
if (isset($_GET['error']) && $_GET['error'] == 'invalidUsername') {
	echo '<p id="error">Pseudo déjà utilisé</p>';
}

if (isset($_GET['error']) && $_GET['error'] == 'invalidMail') {
	echo '<P id="error">Adresse email déjà utilisée</p>';
}

if (isset($_GET['error']) && $_GET['error'] == 'google-recaptcha') {
	echo '<P id="error">Vous devez cocher la case du captcha.</p>';
}

?>
	<div class="formBlock">
		<form action="index.php?action=addMember" method="post">
			<label for="pseudo">Pseudo</label><br />
			<input type="text" name="pseudo" id="pseudo" required /><br />
			<label for="pass">Mot de passe</label><br />
			<input type="password" name="pass" id="pass" required /><br />
			<label for="pass_confirm">Retapez votre mot de passe</label><br />
			<input type="password" name="pass_confirm" id="pass_confirm" required /><br />
			<label for="mail">Adresse email</label><br />
			<input type="email" name="mail" id="mail" required /><br />
			<input type="submit" value="S'inscrire" />
			<div class="g-recaptcha" data-sitekey="6Lc_sGUUAAAAAJ7FSCKD9_fmjDzDYeiMLP0LgP2K"></div>
		</form>
	</div>




</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>