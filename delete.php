<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check that the contact ID exists
if (isset($_GET['id'])) {
    // Select the record that is going to be deleted
    $stmt = $pdo->prepare('SELECT * FROM budi2 WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $budi2 = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$budi2) {
        exit('Child doesn\'t exist with that ID!');
    }
    // Make sure the user confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // User clicked the "Yes" button, delete record
            $stmt = $pdo->prepare('DELETE FROM budi2 WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'You have deleted the child!';
        } else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: read.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>


<?=template_header('Delete')?>

<div class="content delete">
	<h2>Delete Child #<?=$budi2['id']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete Child #<?=$budi2['id']?>?</p>
    <div class="yesno">
        <a href="delete.php?id=<?=$budi2['id']?>&confirm=yes">Yes</a>
        <a href="delete.php?id=<?=$budi2['id']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>