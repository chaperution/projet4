<?php $title = "Se connecter au panneau d'administration"; ?>

<?php ob_start(); ?>

<section id="adminLoginFrame">
	<h3>Se connecter au panneau d'administration</h3>
	<div class="formBlock">
		<form action="index.php?action=adminLogin" method="post">
			<label for="pass">Entrez le mot de passe :</label>
			<input type="password" name="pass" id="pass" required />
			<input type="submit" value="Se connecter" />
		</form>
	</div>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>