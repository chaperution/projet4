<?php 

$title = "À propos"; ?>

<?php ob_start(); ?>

<section id="about">
	<div class="parAbout">
		<h3>À propos de l'auteur</h3>
		<img src="public/img/personnage.png" alt="un personnage" />
		<p>Né en 1983 dans le sud de la France, je suis ingénieur en aéronautique et passe mon temps libre à l'écriture. J'ai toujours été passionné par l'écriture et la littérature. À côté de ces passions, je m'intéresse aussi à la peinture, essentiellement contemporaine, ainsi qu'aux sports d'équipe.</p>
		<p>J'ai commencé par écrire quelques poèmes pendant mon enfance. C'est à l'adolescence que j'ai commencé l'écriture de mon premier roman <em>"Âme sensible en terre inconnue"</em> que je n'ai publié que bien plus tard en 2008. C'est à partir de cette publication que la sortie de mes romans suivants s'est enchainée.</p> 
			<ul>
				<li><em>"Mange ma main"</em> en 2010</li>
				<li><em>"Les pieds dans l'eau"</em> en 2011</li>
				<li><em>"La girafe perdue"</em> en 2012</li>
				<li><em>"Le côté sombre de la force"</em> en 2013</li>
				<li><em>"Les lamas n'ont pas de dents"</em> en 2015</li>
				<li><em>"Cailloux"</em> en 2016</li>
				<li><em>"Billet simple pour l'Alaska"</em> est mon 8ème roman.</li>
			</ul>
	</div>

	<div class="parAbout">
		<h3>Pourquoi ce mode de publication ?</h3>
		<img src="public/img/keyboard.jpg" alt="une personne écrivant avec un clavier" />
		<p><span class="boldSentence">Vous vous posez sûrement cette question: pourquoi ai-je choisi de publier ce roman sur mon blog au lieu de le publier via une maison d'édition comme les précédents?</span></p>
		<p>Une première partie de réponse est qu'il faut évoluer avec son temps. Aujourd'hui, la plupart des supports se dématérialisent et le format papier pour les livres pourra, dans l'avenir, devenir désuet. Je souhaite donc innover de cette façon. De plus, la dématérialisation des supports a aussi un impact écologique. Moins de livres publiés sous format papier, moins de déforestation.</p>
		<p>L'autre partie de la réponse est que je souhaite publier ce roman avec plus d'intéractions. En effet, en publiant épisodiquement des chapitres sur un blog, je laisse l'opportunité à mes lecteurs de commenter ceux-ci et de me donner leur avis. Ces avis peuvent alors m'aiguiller sur mon travail d'écriture et donc possiblement changer le scénario du livre. L'écriture n'est alors plus cloisonnée. C'est pourquoi, chacun peut se créer un espace membre et commenter ses ressentis sous chaque chapitre.</p>
	</div>

	<div class="parAbout">
		<h3>Quatrième de couverture</h3>
		<img src="public/img/book.jpg" alt="un livre" />
		<p><em>"L'ordre a été donné par l'état major. Nous devons partir dès demain pour l'Alaska. Nous n'avons pas beaucoup de détails sur la mission mais j'ai un mauvais pressentiment. Depuis deux semaines, des rumeurs enflent sur la situation là-bas. Des êtres, qui ont peu de choses communes avec un être humain, auraient été aperçus par la population aux abords de la ville de Sitka. Des enlèvements auraient eu lieu et la situation serait chaotique. Que va-t-on trouver là-bas? En reviendrons-nous vivants?"</em></p>
	</div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>