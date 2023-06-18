<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the budi2 id exists, for example update.php?id=1 will get the budi2 with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $jk = isset($_POST['jk']) ? $_POST['jk'] : '';
        $ortu_id = isset($_POST['ortu_id']) ? $_POST['ortu_id'] : '';
        $cucu_id = isset($_POST['cucu_id']) ? $_POST['cucu_id'] : '';
        
        // Update the record
        $stmt = $pdo->prepare('UPDATE budi2 SET id = ?, name = ?, jk = ?, ortu_id = ?, cucu_id = ? WHERE id = ?');
        $stmt->execute([$id, $name, $jk, $ortu_id, $cucu_id, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the budi2 from the budi2s table
    $stmt = $pdo->prepare('SELECT * FROM budi2 WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $budi2 = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$budi2) {
        exit('Child doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>



<?=template_header('Read')?>

<div class="content update">
	<h2>Update Keluarga budi #<?=$budi2['id']?></h2>
    <form action="update.php?id=<?=$budi2['id']?>" method="post">
        <label for="id">ID</label>
        <label for="nama">Nama</label>
        <input type="text" name="id" value="<?=$budi2['id']?>" id="id">
        <input type="text" name="name" value="<?=$budi2['name']?>" id="name">
        <label for="jk">Jenis Kelamin </label>
        <label for="ortu_id">Ortu_id</label>
        <input type="text" name="jk" value="<?=$budi2['jk']?>" id="jk">
        <input type="text" name="ortu_id" value="<?=$budi2['ortu_id']?>" id="ortu_id">
        <label for="cucu_id">cucu_id</label>
        <input type="text" name="cucu_id" value="<?=$budi2['cucu_id']?>" id="title">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>