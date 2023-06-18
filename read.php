<?php
include 'functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 5;


// Prepare the SQL statement and get records from our budi2s table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM budi2 ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$budi2s = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Get the total number of budi2s, this is so we can determine whether there should be a next and previous button
$num_budi2s = $pdo->query('SELECT COUNT(*) FROM budi2')->fetchColumn();
?>


<?=template_header('Read')?>

<div class="content read">
	<h2>Daftar Anggota Keluarga Budi</h2>
	<a href="create.php" class="create-contact">Create Keturunan</a>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Nama</td>
                <td>Jenis Kelamin</td>
                <td>Ortu_id</td>
                <td>Cucu_id</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($budi2s as $budi2): ?>
            <tr>
                <td><?=$budi2['id']?></td>
                <td><?=$budi2['name']?></td>
                <td><?=$budi2['jk']?></td>
                <td><?=$budi2['ortu_id']?></td>
                <td><?=$budi2['cucu_id']?></td>
                <td class="actions">
                    <a href="update.php?id=<?=$budi2['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=<?=$budi2['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_budi2s): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>