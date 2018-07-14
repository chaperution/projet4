<?php 

$title = "Panneau d'administration"; ?>

<?php ob_start(); ?>

<section id="adminPanel">
	<h1>Panneau d'administration</h1>
	<div id=adminFrame>
		<button id="writePost"><a href="index.php?action=createPost">Ecrire un article</a></button>
		<div id="postManage">
			<h3 class="headPost">Gestion des Articles</h3>
<?php
	while ($data = $posts->fetch()) {
		if (!empty($data)) {
?>
			<div class="listPanel">
				<p><a class="linkAdmin" href="index.php?action=updatePost&amp;id=<?= $data['id']; ?>"><?= $data['title']; ?></a></p>
				<a class="report" href="index.php?action=deletePost&amp;id=<?= $data['id']; ?>"><i class="fas fa-trash-alt"></i></a>
				<a class="report" href="index.php?action=updatePost&amp;id=<?= $data['id']; ?>"><i class="fas fa-edit"></i></a>
				<p><em><?= $data['date_fr']; ?></em></p>	
			</div>
<?php
		} else {
			echo "<p>Pas d'articles !</p>";
		}
	}
	$posts->closeCursor();
?>
		</div>
		<div id="commentManage">
			<h3 class="headPost">Gestion des commentaires signalés</h3>
<?php 
	while ($report = $reports->fetch()) {
?>
			<div class="listPanel">
				<p><a class="linkAdmin" href="#"><?= $report['author']; ?></a></p>
				<p><em><?= $report['comment_date']; ?></em></p>
				<a class="report" href="index.php?action=deleteComment&amp;id=<?= $report['comment_id']; ?>"><i class="fas fa-trash-alt"></i></a>
				<p class="nbReports"><?= $report['nb_reports']; ?> signalements</p>
				<p><?= $report['comment']; ?></p>	
			</div>

<?php
	}
	$reports->closeCursor();
?>
		</div>
		<div id="memberManage">
			<h3 class="headPost">Gestion des membres</h3>
			<table>
				<tr>
					<th>Identifiant</th>
					<th>Groupe</th>
					<th>Pseudo</th>
					<th>Date d'inscription</th>
					<th>Supprimer</th>
				</tr>
<?php
	while ($member = $members->fetch()) {
		if(!empty($member)) {
?>
		
				<tr>
					<td><?= $member['id']; ?></td>
					<td><?= $member['groups_id']; ?></td>
					<td><?= $member['pseudo']; ?></td>
					<td><em><?= $member['date_sub']; ?></em></td>
					<td><a href="index.php?action=deleteMember&amp;id=<?= $member['id']; ?>"><i class="fas fa-user-times"></i></a></td>
				</tr>
<?php
		} else {
			echo "<p>Pas de membres enregistrés</p>";
		}
	}
?>
			</table>
<?php
	$members->closeCursor();
?>
		</div>
	</div>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>