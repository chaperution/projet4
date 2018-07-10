<?php 

$title = "Panneau d'administration"; ?>

<?php ob_start(); ?>

<section id="adminPanel">
	<h1>Panneau d'administration</h1>

</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>