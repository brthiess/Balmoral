<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
include_once 'upload.form.php';
 
sec_session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Balmoral Admin</title>
<link rel="stylesheet" type="text/css" href="../css/admin-style.css" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
<script src="../js/ModalPopupWindow.js"type="text/javascript"></script>
</head>
	<body>
        <?php if (login_check($mysqli) == true) : ?>
		
		
		<div class="header">
			<h1>Balmoral Administration Page</h1>
			<h2>Log Out</h2>
		</div>
		
		
		
			   <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
		
		
	</body>
</html>