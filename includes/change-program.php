		<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
 
sec_session_start();
?>
<?php
    // My modifications to mailer script from:
    // http://blog.teamtreehouse.com/create-ajax-contact-form
    // Added input sanitizing to prevent injection

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $description = $_POST["description"];
		$title = $_POST["title"];
		$id = $_POST["identification"];
		
		

		$sql = "UPDATE Program SET Description='$description', Title='$title' WHERE ID=$id";

		
        // Change the email in database
        if ($mysqli->query($sql)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't change the email";
        }
    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>
