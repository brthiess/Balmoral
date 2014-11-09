<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
 
 
 # Install PSR-0-compatible class autoloader
spl_autoload_register(function($class){
	require preg_replace('{\\\\|_(?!.*\\\\)}', DIRECTORY_SEPARATOR, ltrim($class, '\\')).'.php';
});

# Get Markdown class
use \Michelf\Markdown;
 
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
<link rel="stylesheet" type="text/css" href="../css/blog-admin.css" />
    
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type="text/javascript" src="../js/blend/jquery.blend.js"></script>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
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
	<script>
  $(function() {
    $( "#accordion" ).accordion();
  });
  </script>
</head>

<body>
        <?php if (login_check($mysqli) == true) : ?>
<!-- WRAPPER START -->
<script>

 var modalWin = new CreateModalPopUpObject();
 modalWin.SetLoadingImagePath("../images/loading.gif");
 modalWin.SetCloseButtonImagePath("../images/remove.png");

function ShowCreatePostPage(){
 modalWin.ShowURL('create-post-modal.php' ,350,490,'Create Post',null);
 }
 
 function ShowEditPostPage(postNumber){
 modalWin.ShowURL('edit-post-modal.php?number=' + postNumber,540,800,'Edit Post',null);
 }
 
 
 function ShowHelpPage() {
	modalWin.ShowURL('http://five.squarespace.com/display/ShowHelp?section=Markdown', 500,800, 'Markdown Help', null);
}
 
 function ShowDeletePostPage(postNumber) {
 modalWin.ShowURL('delete-post-modal.php?number=' + postNumber,164,490,'Delete Post',null);
 }
 
   function DeletePost(postNumber) {
    console.log(postNumber);

	 var http = new XMLHttpRequest();
	 var url = "delete-post.php"
	 var params ="postNumber=" + postNumber;
	 console.log(params);
	 http.open("POST",url,true);
	 //Send the proper header information along with the request
	 http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	 http.send(params);
	 modalWin.HideModalPopUp();
	 location.reload();
}

function CreatePost(content, title) {

	 var http = new XMLHttpRequest();
	 var url = "create-post.php"
	 var params = "content=" + content + "&title=" + title;
	 console.log(params);
	 http.open("POST",url,true);
	 //Send the proper header information along with the request
	 http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	 http.send(params);
	 modalWin.HideModalPopUp();
	 location.reload();
}
  function ChangePost(post, postNumber) {
    console.log(postNumber);

	 var http = new XMLHttpRequest();
	 var url = "edit-post.php"
	 var params = "post=" + post + "&postNumber=" + postNumber;
	 console.log(params);
	 http.open("POST",url,true);
	 //Send the proper header information along with the request
	 http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	 http.send(params);
	 modalWin.HideModalPopUp();
	 location.reload();
}

  function ChangeTitle(title, sliderNumber) {
    console.log(sliderNumber);

	 var http = new XMLHttpRequest();
	 var url = "set-title.php"
	 var params = "title=" + title + "&sliderNumber=" + sliderNumber;
	 console.log(params);
	 http.open("POST",url,true);
	 //Send the proper header information along with the request
	 http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	 http.send(params);
}

 </script>
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
        <li class="item middle" id="two"><a href="#" class="main current"><span class="outer"><span class="inner content">Blog/News<br>Manager</span></span></a></li>
        <li class="item middle" id="three"><a href="admin-about-us.php"><span class="outer"><span class="inner reports png">What We Do</span></span></a></li>
        <li class="item last" id="four"><a href="admin-contact.php" class="main"><span class="outer"><span class="inner users">Change <br>Contact Info</span></span></a></li>
       
    </ul>
</div>
<!-- MENU END -->
</div>

<!-- HIDDEN SUBMENU START -->

<!-- HIDDEN SUBMENU END -->  

<!-- CONTENT START -->
    <div class="grid_16" id="content">
    <!--  TITLE START  --> 
    <div class="grid_9">
    <h1 class="dashboard">Blog/News Post Manager  <a href="#"><img  src="../images/add.png" onclick="ShowCreatePostPage()"></a> <a href="#"><img  src="../images/help.png" onclick="ShowHelpPage()"></a></h1>
	<br>
    </div>

    <!--  TITLE END  -->    
    <!-- #PORTLETS START -->
    <div id="portlets">
    <!-- FIRST SORTABLE COLUMN START -->
      <div class="column" id="left">
      <!--THIS IS A PORTLET-->
	  <div id='accordion'>
	  	<?php
				$sql = "SELECT ID, Title, PostDate, Content FROM Post ORDER BY PostDate DESC";
				$result = $mysqli->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<h3><i>" . $row["PostDate"] . "</i>" . $row["Title"] . "<img src='../images/trash.png' onclick='ShowDeletePostPage(" . $row["ID"] . ")'> <img src='../images/edit.png' onclick='ShowEditPostPage(" . $row["ID"] . ")'></h3><div>
						<p>" . Markdown::defaultTransform($row["Content"]) . "</p></div>";
					}
				} else {
				echo "0 results";
				}
			?> 
      
   </div>
    <div class="clear"> </div>
<!-- END CONTENT-->    
  </div>
<div class="clear"> </div>

		<!-- This contains the hidden content for modal box calls -->
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
















