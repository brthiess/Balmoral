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
    <title>Create Description</title>
</head>
<body>
	<form class="pure-form pure-form-stacked">
		<fieldset>
			<textarea id="title" type="text" placeholder="Title" name="title" cols="55" rows="1"></textarea>
			<textarea id="content" type="text" placeholder="Content" name="content" cols="55" rows="9"></textarea>
			<button type="submit" class="pure-button pure-button-primary" onclick="CreateProgram()">Submit</button>
		</fieldset>
	</form>

    <script type="text/javascript">
        function CreateProgram() {
            PassValueToParentWindow();
        }

        function PassValueToParentWindow() {
            var content = document.getElementById("content").value;
			var title = document.getElementById("title").value;
			
			console.log(content);
			console.log(title);
			window.parent.CreatePost(content, title);
        }
    </script>
</body>
</html>
