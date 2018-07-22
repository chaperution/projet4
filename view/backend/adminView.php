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
	if (isset($_GET['update-status']) &&  $_GET['update-status'] == 'success') {
		echo '<p id="success">L\'article a bient été modifié !<p>';
	}
	elseif (isset($_GET['new-post']) &&  $_GET['new-post'] == 'success') {
		echo '<p id="success">L\'article a bient été posté !<p>';
	}
	elseif (isset($_GET['remove-post']) &&  $_GET['remove-post'] == 'success') {
		echo '<p id="success">L\'article a bien été supprimé !</p>';
	}

	$countPost = 0;
	while ($data = $posts->fetch()) {
		if (!empty($data)) {
?>
			<div class="listPanel">
				<p><a class="linkAdmin" href="index.php?action=updatePost&amp;id=<?= $data['id']; ?>"><?= $data['title']; ?></a></p>
				<button class="report removePost"><i class="fas fa-trash-alt"></i></button>
					<div id="postModal<?= $countPost ?>" class="modal">
						<div class="modalContent">
							<p>Voulez-vous vraiment supprimer l'article <em><?= $data['title']; ?></em> ?</p>
							<a class="confirmDelete" href="index.php?action=deletePost&amp;id=<?= $data['id']; ?>">Oui</a>
							<span id="closePostModal<?= $countPost++ ?>" class="closeModal">Non</span>
						</div>
					</div>
				<a class="report" href="index.php?action=updatePost&amp;id=<?= $data['id']; ?>"><i class="fas fa-edit"></i></a>
				<p><em><?= $data['date_fr']; ?></em></p>	
			</div>
<?php
		} else {
			echo "<p>Pas d'articles !</p>";
		}
	}
	$posts->closeCursor();

	if ($nbPage >= 2) {
?>
		<div id="pageFrame">
<?php
		for ($i = 1; $i <= $nbPage; $i++) {
			if ((!isset($_GET['page']) && $i == 1) || (isset($_GET['page']) && $_GET['page'] == $i)) {
				echo "<span class='cPageFrame'>$i</span>";
			} else {
				echo "<a class='pageBlock' href=\"index.php?action=admin&amp;page=$i\">$i</a>";
			}
		}
?>
		</div>
<?php
	}

?>
		</div>
		<div id="commentManage">
			<h3 class="headPost">Gestion des commentaires signalés</h3>
<?php 
	if (isset($_GET['remove-comment']) &&  $_GET['remove-comment'] == 'success') {
		echo '<p id="success">Le commentaire a bien été supprimé !</p>';
	}

	$countReport = 0;
	while ($report = $reports->fetch()) {
?>
			<div class="listPanel">
				<p><a class="linkAdmin" href="#"><?= $report['author']; ?></a></p>
				<p><em><?= $report['date_c']; ?></em></p>
				<button class="report removeComment"><i class="fas fa-trash-alt"></i></button>
					<div id="reportModal<?= $countReport ?>" class="modal">
						<div class="modalContent">
							<p>Voulez-vous vraiment supprimer le commentaire de <em><?= $report['author']; ?></em> ?</p>
							<a class="confirmDelete" href="index.php?action=deleteComment&amp;id=<?= $report['comment_id']; ?>">Oui</a>
							<span id="closeCommentModal<?= $countReport++ ?>" class="closeModal">Non</span>
						</div>
					</div>
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
<?php 
	if (isset($_GET['remove-member']) &&  $_GET['remove-member'] == 'success') {
		echo '<p id="success">Le membre a bien été supprimé !</p>';
	}
?>
			<table>
				<tr>
					<th>Identifiant</th>
					<th>Groupe</th>
					<th>Pseudo</th>
					<th>Date d'inscription</th>
					<th>Supprimer</th>
				</tr>
<?php
	$countMember = 0;
	while ($member = $members->fetch()) {
		if(!empty($member)) {
?>
				<tr>
					<td><?= $member['id']; ?></td>
					<td><?= $member['groups_id']; ?></td>
					<td><?= $member['pseudo']; ?></td>
					<td><em><?= $member['date_sub']; ?></em></td>
					<td><button class="removeMember"><i class="fas fa-user-times"></i></button>
						<div id="memberModal<?= $countMember ?>" class="modal">
							<div class="modalContent">
								<p>Voulez-vous vraiment supprimer le membre <em><?= $member['pseudo']; ?></em> ?</p>
								<a class="confirmDelete" href="index.php?action=deleteMember&amp;id=<?= $member['id']; ?>">Oui</a>
								<span id="closeMemberModal<?= $countMember++ ?>" class="closeModal">Non</span>
							</div>
						</div>
					</td>
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