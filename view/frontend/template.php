<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title><?= $title ?></title>
	    <link href="public/css/style.css" rel="stylesheet" /> 
	    <link href="https://fonts.googleapis.com/css?family=IM+Fell+English+SC|Pacifico|Roboto|Slabo+27px" rel="stylesheet">
	    <!-- ajouter meta -->
	</head>

	<body>
		<header>
			<nav id="menu">
				<ul>
					<li><a>Accueil</a></li>
					<li><a>A propos</a></li>
					<li><a>Connexion/ Inscription</a></li>
				</ul>
			</nav>

			<div id="header_Img">
					<img src="public/img/headhome.jpg" alt="bureau avec une machine à écrire et un livre" />
					<div id="header_content">
						<h1>Billet simple pour l'Alaska</h1>
						<p id="authorName">Jean Forteroche</p>
					</div>
			</div>
		</header>
		<?= $content ?>

		<footer>
			<p>Mentions Légales</p>
			<p>Images libres de droit</p>
		</footer>
	</body>
</html>