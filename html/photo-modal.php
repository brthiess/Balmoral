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
    <title>Change Photo</title>
</head>
<body>

   <form class="pure-form pure-form-stacked">
		<fieldset>
			<a href="http://www.google.ca">google</a>
			<?php
				print_r($_GET);
				if (isset($_GET['number'])) {
					$sliderNumber = $_GET['number'];
				}
			?>
			<?php
				echo "<form action='upload-photo.php' method='post' enctype='multipart/form-data'>";
			?>
				Select image to upload:
				<input type="file" name="fileToUpload" id="fileToUpload">
			<?php	echo "<input type='hidden' name='number' value='$sliderNumber'></input>";
			?>
				<input type="submit" name="submit" class="pure-button pure-button-primary">Submit</input>
			</form>
				</fieldset>
	</form>

    <script type="text/javascript">
        function EditPhoto() {
            PassValueToParentWindow();
        }

        function PassValueToParentWindow() {
			window.parent.ChangePhoto();
        }
    </script>
</body>
</html>
