<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
include_once 'upload.form.php';
 
sec_session_start();
?>
<?php
	$title = $_POST['title'];
	$sliderNumber = intval($_POST['sliderNumber']);
	$sql = "UPDATE Slider SET Title='$title' WHERE ID = $sliderNumber";
	$mysqli->query($sql);
?>