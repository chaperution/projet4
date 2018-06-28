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
		<p><strong><?= htmlspecialchars($comment['author']); ?></strong> le <?= $comment['date_fra']; ?></p>
		<p><?= nl2br(htmlspecialchars($comment['comment'])); ?></p>
<?php 
}
?>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>