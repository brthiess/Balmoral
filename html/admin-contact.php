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
<link rel="stylesheet" type="text/css" href="../css/contact-admin.css" />
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<link type="text/css" href="../css/smoothness/ui.css" rel="stylesheet" />  
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
<script src="../js/jquery-2.1.0.min.js"></script>
<script src="../js/app.js"></script>
    <script type="text/javascript" src="../js/blend/jquery.blend.js"></script>
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
<!-- WRAPPER START -->

<div class="container_16" id="wrapper">	

  	<!--LOGO-->
	<div class="grid_8" id="logo">Balmoral - Website Administration
	

	</div>
		<h2><a href='../includes/logout.php'>Logout</a></h2>
<!-- USER TOOLS END -->    
<div class="grid_16" id="header">
<!-- MENU START -->
<div id="menu">
	<ul class="group" id="menu_group_main">
		<li class="item first" id="one"><a href="admin.php" ><span class="outer"><span class="inner dashboard">Homepage <br>Manager</span></span></a></li>
        <li class="item middle" id="two"><a href="blog-admin.php"><span class="outer"><span class="inner content">Blog/News<br>Manager</span></span></a></li>
        <li class="item middle" id="three"><a href="admin-about-us.php"><span class="outer"><span class="inner reports png">What We Do</span></span></a></li>
        <li class="item last" id="four"><a href="#" class="main current"><span class="outer"><span class="inner users">Change <br>Contact Info</span></span></a></li>
       
    </ul>
</div>
<!-- MENU END -->
</div>

<!-- HIDDEN SUBMENU START -->

<!-- HIDDEN SUBMENU END -->  

<!-- CONTENT START -->
    <div class="grid_16" id="content">
	<div class="grid_9">
    <h1 class="dashboard">Edit Contact Info</h1>
    </div>
	<div style="clear: both;">&nbsp;</div>
    <!-- #PORTLETS START -->
    <div id="portlets">
	

			
		<div class="pure-form pure-form-stacked">
			<fieldset>
			
			
			
			<?php
				$sql = "SELECT Address, AreaCode, Extension, Phone, Email, PostalCode, City, Province FROM Contact LIMIT 1";
				$result = $mysqli->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<form id='form-phone' name='phone-form' method='post' action='../includes/change-phone.php'><div class='input-line'><img src='../images/phone.png'><br>Area Code<input id='areacode' type='text' placeholder='Area Code' value='" . $row["AreaCode"] . "' name='areacode'  maxlength='3'></input>
																					<br>Phone Number<input id='phonenumber' type='text' placeholder='Number'  value='" . $row["Phone"] . "' name='phonenumber'  maxlength='7'></input>
																					<br>Extension<input id='extension' type='text' placeholder='Extension' value='" . $row["Extension"] . "' name='extension'  maxlength='4'></input>
																			<button type='submit' class='pure-button pure-button-primary'>Change Phone</button><div class='form-phone'></div></form>
																			<div style='clear: both;'>&nbsp;</div>
							  <form id='form-address' name='address-form'method='post' action='../includes/change-address.php'><div class='input-line'><img src='../images/home.gif'><br>Street Address<input id='address' type='text' placeholder='Street Address' value='" . $row["Address"] . "'name='address'  maxlength='50'></input>
																					<br>City<input id='city' type='text' placeholder='City' value='" . $row["City"] . "' name='city'  maxlength='20'></input>
																					<br>Province<input id='province' type='text' placeholder='Province' value='" . $row["Province"] . "' name='province'  maxlength='20'></input>
																					<br>Postal Code<input id='postalcode' type='text' placeholder='PostalCode' value='" . $row["PostalCode"] . "' name='postalcode'  maxlength='7'></input>
																			<button type='submit' class='pure-button pure-button-primary'>Change Address</button><div class='form-address'></div></form>
							  <div style='clear: both;'>&nbsp;</div>
							  <form id='form-email' name='email-form' method='post' action='../includes/change-email.php'><div class='input-line'><img src='../images/mail.png'><br>Email<input id='email' type='text' placeholder='Email' value='" . $row["Email"] . "' name='email'  maxlength='50'></input>
				
								<button class='pure-button pure-button-primary'>Change Email</button><div class='form-email'></div></form>";
					}
				} else {
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
















