<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">

<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

<link rel="stylesheet" href="../css/modal.css">
    <title>Delete Post</title>
</head>
<body>
	<form class="pure-form pure-form-stacked">
		<fieldset>
			<p>This will delete the selected post.  Are you sure?</p>
			<button type="submit" class="pure-button pure-button-primary" onclick="DeletePost()">Delete</button>
		</fieldset>
	</form>
	<?php
		$postNumber = $_GET['number'];
	?>
    <script type="text/javascript">
        function DeletePost() {
            PassValueToParentWindow();
        }

        function PassValueToParentWindow() {

			var postNumber = <?php echo($postNumber); ?>;
			console.log(postNumber);
			window.parent.DeletePost(postNumber);
        }
    </script>
</body>
</html>
