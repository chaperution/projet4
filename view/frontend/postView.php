<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<section id="postFrame">
	<p class="returnLink"><a href="index.php">Retour à la liste des chapitres</a></p>
	<div class="fullPost">
		<div class="head-full-post">
			<h3>
				<?= htmlspecialchars($post['title']); ?>
			</h3>
		</div>
		<div class="chapters"><?= nl2br($post['content']); ?></div>
		<em>le <?= $post['date_fr']; ?></em>
	</div>

	<div id="commentsFrame">
		<h3>Commentaires</h3>

<?php
if (isset($_GET['report']) && $_GET['report'] == 'success') {
	echo '<p id="success">Le commentaire a bien été signalé.</p>';
}

while ($comment = $comments->fetch()) {
?>
		<div class="commentBlock">
			<p><strong><?= htmlspecialchars($comment['author']); ?></strong> le <?= $comment['date_fra']; ?></p>

<?php
	if (!empty($_SESSION)) {
		if (!in_array($comment['id'], $idComment) && $comment['author'] !== $_SESSION['pseudo']) {
			echo '<p class="report"><a href="index.php?action=report&amp;id=' . $comment['id_post'] . '&amp;comment-id=' . $comment['id'] . '"><i class="fas fa-exclamation-triangle"></i>Signaler</a></p>';
		}

	}
	
?>
			<p><?= nl2br(htmlspecialchars($comment['comment'])); ?></p>
		</div>
<?php 
}
?>
	</div>

<?php 
	if (!empty($_SESSION)) {
?>
		<div id="commentForm">
			<p>N'hésitez pas à me laisser un commentaire ! ;)</p>
			<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
				<label for="comment">Commentaire :</label></br>
				<textarea id="comment" name="comment" cols="85" rows="10"></textarea> 
				</br>
				<input type="submit" value="Envoyer"/>
			</form>
		</div>
<?php
	} else {
		echo '<div id="info">Pour me laisser un commentaire, veuillez vous <a href="index.php?action=login">connecter</a></div>';
	}
?>
	
</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>