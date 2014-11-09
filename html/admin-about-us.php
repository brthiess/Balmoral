<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link rel="stylesheet" type="text/css" href="../css/960.css" />
<link rel="stylesheet" type="text/css" href="../css/blue.css" />
<link type="text/css" href="../css/smoothness/ui.css" rel="stylesheet" />  
<link rel="stylesheet" type="text/css" href="../css/accordion.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<link rel="stylesheet" type="text/css" href="../css/about-us-admin.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
	<script type="text/javascript" src="../js/blend/jquery.blend.js"></script>
	<script src="../js/jquery-2.1.0.min.js"></script>
	<script src="../js/app.js"></script>
	<script src="../js/ModalPopupWindow.js"type="text/javascript"></script>

    <!--[if IE]>
    <script language="javascript" type="text/javascript" src="js/flot/excanvas.pack.js"></script>
    <![endif]-->
	<!--[if IE 6]>
	<link rel="stylesheet" type="text/css" href="css/iefix.css" />
	<script src="js/pngfix.js"></script>
    <script>
        DD_belatedPNG.fix('#menu ul li a span span');
    </script>        
    <![endif]-->

</head>

<body>
        <?php if (login_check($mysqli) == true) : ?>
		
		<script>

 var modalWin = new CreateModalPopUpObject();
 modalWin.SetLoadingImagePath("../images/loading.gif");
 modalWin.SetCloseButtonImagePath("../images/remove.png");

function ShowCreateProgramPage(){
 modalWin.ShowURL('create-program-modal.php' ,350,490,'Create Post',null);
 }
 

function ShowHelpPage() {
modalWin.ShowURL('http://five.squarespace.com/display/ShowHelp?section=Markdown', 500,800, Markdown Help, null);
}

function CreateProgram(content, title) {
	console.log(title);
	 var http = new XMLHttpRequest();
	 var url = "create-program.php"
	 var params = "content=" + content + "&title=" + title;
	 console.log(params);
	 http.open("POST",url,true);
	 //Send the proper header information along with the request
	 http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	 http.send(params);
	 modalWin.HideModalPopUp();
	 location.reload();
}


 function ShowDeleteProgramPage(programNumber) {
 console.log(programNumber);
 modalWin.ShowURL('delete-program-modal.php?number=' + programNumber,164,490,'Delete Description',null);
 }
 
   function DeleteProgram(programNumber) {
    console.log(programNumber);

	 var http = new XMLHttpRequest();
	 var url = "delete-program.php"
	 var params ="programNumber=" + programNumber;
	 console.log(params);
	 http.open("POST",url,true);
	 //Send the proper header information along with the request
	 http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	 http.send(params);
	 modalWin.HideModalPopUp();
	 location.reload();
}


 </script>
		
		
		
<!-- WRAPPER START -->

<div class="container_16" id="wrapper">	

  	<!--LOGO-->
	<div class="grid_8" id="logo">Balmoral - Website Administration</div>
		<h2><a href='../includes/logout.php'>Logout</a></h2>
<!-- USER TOOLS END -->    
<div class="grid_16" id="header">
<!-- MENU START -->
<div id="menu">
	<ul class="group" id="menu_group_main">
		<li class="item first" id="one"><a href="admin.php" ><span class="outer"><span class="inner dashboard">Homepage <br>Manager</span></span></a></li>
        <li class="item middle" id="two"><a href="blog-admin.php"><span class="outer"><span class="inner content">Blog/News<br>Manager</span></span></a></li>
        <li class="item middle" id="three"><a href="#" class="main current"><span class="outer"><span class="inner reports png">What We Do</span></span></a></li>
        <li class="item last" id="four"><a href="admin-contact.php"><span class="outer"><span class="inner users">Change <br>Contact Info</span></span></a></li>
       
    </ul>
</div>
<!-- MENU END -->
</div>

<!-- HIDDEN SUBMENU START -->

<!-- HIDDEN SUBMENU END -->  

<!-- CONTENT START -->
    <div class="grid_16" id="content">
	<div class="grid_9">
    <h1 class="dashboard">Edit <i>What We Do</i> Page  <a href="#"><img  src="../images/add.png" onclick="ShowCreateProgramPage()"></a>  <a href="#"><img  src="../images/help.png" onclick="ShowHelpPage()"></a></h1>
    </div>
	<div style="clear: both;">&nbsp;</div>
    <!-- #PORTLETS START -->
    <div id="portlets">
	

			
		<div class="pure-form pure-form-stacked">
			<fieldset>
			
			
			
			<?php
				$sql = "SELECT ID, Title, Description FROM Program";
				$result = $mysqli->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<br><br><div class='program-form'> <a href='#title-" . $row["ID"] . "'><img class='icon-trash' src='../images/trash.png' onclick='ShowDeleteProgramPage(" . $row["ID"] . ")'></a><form id='form-" . $row["ID"] . "' name='program-" . $row["ID"] . "' method='post' action='../includes/change-program.php'><div class='input-line'>
																					<input id='hidden-" . $row["ID"] . "' type='hidden' placeholder='ID' value='" . $row["ID"] . "' name='identification'></input>
																					<strong>Title</strong><input id='title-" . $row["ID"] . "' type='text' placeholder='Title'  value='" . $row["Title"] . "' name='title'  maxlength='50'></input>
																					<br><strong>Description</strong><textarea id='description-" . $row["ID"] . "' type='text' placeholder='Description' name='description'  rows='12' cols='50'>" . $row["Description"] . "</textarea>

																					<button class='pure-button pure-button-primary'>Change Description</button><div class='form-" . $row["ID"] . "'></div></div></form></div>";
					}
				}
						else {
				echo "No Contact Info";
				}
			?>	

		
			</fieldset>
		</div>
	</div>
	
<!-- WRAPPER END -->
<!-- FOOTER START -->
<div class="container_16" id="footer">
</div>
<!-- FOOTER END -->
	   <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
</body>
</html>
















