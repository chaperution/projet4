<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title><?= $title ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	    <link href="public/css/style.css" rel="stylesheet" /> 
	    <link href="https://fonts.googleapis.com/css?family=IM+Fell+English+SC|Pacifico|Roboto|Slabo+27px" rel="stylesheet">
	    <!-- ajouter meta -->
	</head>

	<body>
		<main>
			<header>
				<nav id="menu">
					<ul>
						<li><a href="index.php">Accueil</a></li>
						<li><a>À propos</a></li>
						<li><a href="index.php?action=login">Connexion/ Inscription</a></li>
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
			<section>
			<?= $content ?>
			</section>
			<footer>
				<p>Mentions Légales</p>
				<p>Images libres de droit</p>
			</footer>
		</main>
	</body>
</html>