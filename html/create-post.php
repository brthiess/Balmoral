<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
include_once 'upload.form.php';
 
sec_session_start();
?>
<?php
	$content = $_POST['content'];
	$title = $_POST['title'];
	$sql = "INSERT INTO Post VALUES ('', '$title', Now(), '$content')";
	$mysqli->query($sql);
?>

