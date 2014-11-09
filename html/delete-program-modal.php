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
    <title>Delete Description</title>
</head>
<body>
	<form class="pure-form pure-form-stacked">
		<fieldset>
			<p>This will delete the selected Description and Title.  Are you sure?</p>
			<button type="submit" class="pure-button pure-button-primary" onclick="DeleteProgram()">Delete</button>
		</fieldset>
	</form>
	<?php
		$programNumber = $_GET['number'];
	?>
    <script type="text/javascript">
        function DeleteProgram() {
            PassValueToParentWindow();
        }

        function PassValueToParentWindow() {

			var programNumber = <?php echo($programNumber); ?>;
			console.log(programNumber);
			window.parent.DeleteProgram(programNumber);
        }
    </script>
</body>
</html>
