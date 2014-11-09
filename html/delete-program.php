<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
include_once 'upload.form.php';
 
sec_session_start();
?>
<?php
	$program = $_POST['program'];
	$programNumber = intval($_POST['programNumber']);
	$sql = "DELETE FROM Program WHERE ID = $programNumber";
	$mysqli->query($sql);
?>