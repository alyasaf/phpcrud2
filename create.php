<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $jk = isset($_POST['jk']) ? $_POST['jk'] : '';
    $ortu_id = isset($_POST['ortu_id']) ? $_POST['ortu_id'] : '';
    $cucu_id = isset($_POST['cucu_id']) ? $_POST['cucu_id'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO budi2 VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$id, $name, $jk, $ortu_id, $cucu_id]);
    // Output message
    $msg = 'Created Successfully!';
}
?>


<?=template_header('Create')?>

<div class="content update">
	<h2>Create Contact</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <label for="name">Nama</label>
        <input type="text" name="id" value="auto" id="id">
        <input type="text" name="name" id="name">
        <label for="jk">Jenis Kelamin</label>
        <label for="ortu_id">Ortu_id</label>
        <input type="text" name="jk" id="jk">
        <input type="text" name="ortu_id" id="ortu_id">
        <label for="cucu_id">Cucu_id</label>
        <input type="text" name="cucu_id" id="cucu_id">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>