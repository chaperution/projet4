<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title><?= $title ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	    <link href="public/css/style.css" rel="stylesheet" /> 
	    <link href="https://fonts.googleapis.com/css?family=IM+Fell+English+SC|Pacifico|Roboto|Slabo+27px" rel="stylesheet">
	    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
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
                            echo '<li><a href="index.php?action=admin-login-view"><i class="fas fa-key"></i> Administration</a></li>';
                        }
                        if (!empty($_SESSION))  {
                            echo '<li><a href="index.php?action=logout">Déconnexion</a></li>';
                        } else {
                            echo '<li><a href="index.php?action=login">Connexion / Inscription</a></li>';
                        }
						?>
						
					</ul>
				</nav>

				<div id="headerFrame">
					<div id="headerImg">
						<a href="index.php"><img src="public/img/headhome.jpg" alt="bureau avec une machine à écrire et un livre" /></a>
					</div>
					<div id="header_content">
						<h1>Billet simple pour l'Alaska</h1>
						<p id="authorName">Jean Forteroche</p>
					</div>
				</div>
			</header>

			<?= $content ?>

			<footer>
				<ul>
					<li><a href="index.php?action=privacy"> Mentions Légales</a></li>
					<li>Images libres de droit</li>
				</ul>
			</footer>
		</main>

		<script src="public/js/app.js"></script>
	</body>
</html>

