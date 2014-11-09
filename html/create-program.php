<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
 
sec_session_start();
?>
<?php
	$content = $_POST['content'];
	$title = $_POST['title'];
	$sql = "INSERT INTO Program VALUES ('', '$title', '$content')";
	$mysqli->query($sql);
?>

