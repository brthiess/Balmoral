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
    <title>Edit Post</title>
</head>
<body>
	<form class="pure-form pure-form-stacked">
		<fieldset>
		
		<?php
				$postNumber = $_GET['number'];
				$sql = "SELECT ID, Title, PostDate, Content FROM Post WHERE ID=$postNumber";
				$result = $mysqli->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<input id='title' type='text' placeholder='Title' value='" . $row["Title"] . "' size='88' name='title'></input>
						<textarea id='post' type='text' placeholder='Edit Post' name='post' cols='90' rows='20'>" .  $row["Content"] . "</textarea>";
					}
				} else {
				echo "0 results";
				}
			?> 
			
			<button type="submit" class="pure-button pure-button-primary" onclick="EditPost()">Save</button>
		</fieldset>
	</form>
	<?php
		$postNumber = $_GET['number'];
	?>
    <script type="text/javascript">
        function EditPost() {
            PassValueToParentWindow();
        }

        function PassValueToParentWindow() {

			var postNumber = <?php echo($postNumber); ?>;

            var post = document.getElementById("post").value;
			console.log(postNumber);
			window.parent.ChangePost(post, postNumber);
        }
    </script>
</body>
</html>
