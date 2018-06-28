<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<div id="postFrame">
	<p id="returnLink"><a href="index.php">Retour à la liste des chapitres</a></p>
	<div class="fullPost">
		<div class="head-full-post">
			<h3>
				<?= htmlspecialchars($post['title']); ?>
			</h3>
		</div>
		<p class="chapters"><?= nl2br(htmlspecialchars($post['content'])); ?></p>
		<em>le <?= $post['date_fr']; ?></em>
	</div>

	<div id="commentsFrame">
		<h3>Commentaires</h3>

<?php
while ($comment = $comments->fetch()) {
?>
		<div class="commentBlock">
			<p><strong><?= htmlspecialchars($comment['author']); ?></strong> le <?= $comment['date_fra']; ?></p>
			<p><?= nl2br(htmlspecialchars($comment['comment'])); ?></p>
		</div>
<?php 
}
?>

	</div>
	<div id="commentForm">
		<p>N'hésitez pas à me laisser un commentaire ! ;)</p>
		<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
			<label for="author">Pseudo :</label></br>
			<input type="text" name="author" id="author" size="40"/></br>
			<label for="comment">Commentaire :</label></br>
			<textarea id="comment" name="comment" cols="85" rows="10"></textarea> 
			</br>
			<input type="submit" value="Envoyer"/>
		</form>
	</div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>