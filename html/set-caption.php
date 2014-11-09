<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
include_once 'upload.form.php';
 
sec_session_start();
?>
<?php
	$caption = $_POST['caption'];
	$sliderNumber = intval($_POST['sliderNumber']);
	$sql = "UPDATE Slider SET Caption='$caption' WHERE ID = $sliderNumber";
	$mysqli->query($sql);
?>