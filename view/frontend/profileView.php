<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>




<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>