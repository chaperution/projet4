<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title><?= $title ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	    <link href="public/css/style.css" rel="stylesheet" /> 
	    <link href="https://fonts.googleapis.com/css?family=IM+Fell+English+SC|Pacifico|Roboto|Slabo+27px" rel="stylesheet">
	    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
	    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  		<script>tinymce.init({ selector:'textarea', content_css : '/public/css/style.css', 
  			language_url: 'https://olli-suutari.github.io/tinyMCE-4-translations/fr_FR.js',
			language: 'fr_FR' });</script>
	    <!-- ajouter meta -->
	</head>

	<body>
		<main>
			<header>
				<nav id="menu">
					<ul>
						<li><a href="index.php">Accueil</a></li>
						<li><a href="index.php?action=about">À propos</a></li>
						<?php
						if (!empty($_SESSION)) {
                            echo '<li><a href="#"><i class="fas fa-user"></i> ' . htmlspecialchars($_SESSION['pseudo']) . '</a></li>';
                        }
                      	if(!empty($_SESSION) && $_SESSION['groups_id'] == '1') {
                            echo '<li><a href="index.php?action=admin"><i class="fas fa-key"></i> Administration</a></li>';
                        }
                        if (!empty($_SESSION))  {
                            echo '<li><a href="index.php?action=logout">Déconnexion</a></li>';
                        } else {
                            echo '<li><a href="index.php?action=login">Connexion / Inscription</a></li>';
                        }
						?>
						
					</ul>
				</nav>
			</header>

			<?= $content ?>

			<footer>
				<p>Mentions Légales</p>
				<p>Images libres de droit</p>
			</footer>
		</main>

		<script src="public/js/app.js?"<?= time() ?>></script>
	</body>
</html>
