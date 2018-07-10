<?php 

$title = "Panneau d'administration"; ?>

<?php ob_start(); ?>

<section id="adminPanel">
	<h1>Panneau d'administration</h1>

	<nav id="adminMenu">
		<ul>
			<li>Gestion des billets</li>
			<li>Gestion des commentaires</li>
			<li>Gestion des membres</li>
		</ul>
	</nav>

	<div id="panelFrame">

	</div>


</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>