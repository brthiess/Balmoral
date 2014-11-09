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
<title>Dashboard | Modern Admin</title>
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
<div class="container_16" id="wrapper">	

  	<!--LOGO-->
	<div class="grid_8" id="logo">Balmoral - Website Administration</div>
		<h2><a href='../includes/logout.php'>Logout</a></h2>

<!-- USER TOOLS END -->    
<div class="grid_16" id="header">
<!-- MENU START -->
<div id="menu">
	<ul class="group" id="menu_group_main">
		<li class="item first" id="one"><a href="#" class="main current"><span class="outer"><span class="inner dashboard">Homepage<br>Manager</span></span></a></li>
        <li class="item middle" id="two"><a href="blog-admin.php" class="main"><span class="outer"><span class="inner content">Blog/News<br>Manager</span></span></a></li>
        <li class="item middle" id="three"><a href="admin-about-us.php"><span class="outer"><span class="inner reports png">What We Do</span></span></a></li>
        <li class="item last" id="four"><a href="admin-contact.php" class="main"><span class="outer"><span class="inner users">Contact Us</span></span></a></li>
       
    </ul>
</div>
<!-- MENU END -->
</div>
<div class="grid_16">

</div>
<!-- HIDDEN SUBMENU START -->


<script>

 var modalWin = new CreateModalPopUpObject();
 modalWin.SetLoadingImagePath("../images/loading.gif");
 modalWin.SetCloseButtonImagePath("../images/remove.png");

function ShowEditTitlePage(sliderNumber){
 modalWin.ShowURL('title-modal.php?number=' + sliderNumber,168,470,'Change Title',null);
 }
 
 function ShowEditCaptionPage(sliderNumber){
 console.log(sliderNumber);
 modalWin.ShowURL('caption-modal.php?number=' + sliderNumber,193,490,'Change Caption',null);
 
 }
  function ChangeCaption(caption, sliderNumber) {
    console.log(sliderNumber);

	 var http = new XMLHttpRequest();
	 var url = "set-caption.php"
	 var params = "caption=" + caption + "&sliderNumber=" + sliderNumber;
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
	 modalWin.HideModalPopUp();
	 location.reload();
}

 </script>

<!-- HIDDEN SUBMENU END -->  

<!-- CONTENT START -->
    <div class="grid_16" id="content">
    <!--  TITLE START  --> 
    <div class="grid_9">
    <h1 class="dashboard">Homepage Manager</h1>
    </div>

    <!--  TITLE END  -->    
    <!-- #PORTLETS START -->
    <div id="portlets">
    <!-- FIRST SORTABLE COLUMN START -->
      <div class="column" id="left">
      <!--THIS IS A PORTLET-->
	  <div id='accordion'>
	  	<?php
				$sql = "SELECT ID, Photo, Caption, Title FROM Slider";
				$result = $mysqli->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<h3>Slider " . $row["ID"] . "</h3><div>
						<div class='button' onclick='ShowNewPage()' id='change-photo'>Change Photo</div> <img src='../images/slider" . $row["ID"] . ".jpg'>
						<div class='button' onclick='ShowEditTitlePage(" . $row["ID"] . ")'>Change Title</div><h1>" . $row["Title"] . "</h1>
						<div class='button' onclick='ShowEditCaptionPage(" . $row["ID"] . ")'>Change Caption</div><p>" . $row["Caption"] . "</p></div>";
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
		<div class='hidden'>
			<div id="inline_example1" title="This is a modal box" style='padding:10px; background:#fff;'>
			<p><strong>This content comes from a hidden element on this page.</strong></p>
            			
			<p><strong>Try testing yourself!</strong></p>
            <p>You can call as many dialogs you want with jQuery UI.</p>
			</div>
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
















