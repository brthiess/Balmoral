<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
include_once 'upload.form.php';
 
sec_session_start();
?>
<?php
	$post = $_POST['post'];
	$postNumber = intval($_POST['postNumber']);
	$sql = "UPDATE Post SET Content='$post' WHERE ID = $postNumber";
	$mysqli->query($sql);
?>