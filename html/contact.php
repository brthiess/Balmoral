<?php
include_once '../includes/db_connect.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Good-Natured
   
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20120817

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Balmoral Curling Club Society</title>
<link rel="stylesheet" type="text/css" media="screen" href="../css/slider-style.css"/>
<link rel="stylesheet" type="text/css" media="screen" href="../css/style.css"/>
<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="about-us-header">
	<div id="header" class="container">
		<div id="logo">
			<img src="../images/logo.gif">
		</div>
		<div id="menu">
			<ul>
				<li><a href="index.php">Homepage</a></li>
				<li><a href="aboutus.php">What We Do</a></li>
				<li><a href="news.php">Recent News</a></li>
				<li><a href="register.php">Registration</a></li>
				<li  class="current_page_item"><a href="#">Contact</a></li>
			</ul>
		</div>
	</div>
	<div id="title"> 
		<h2>Contact Us</h2>
	</div>
</div>
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div id="contact-main">
				<div id="contact-div">
					<form class="contact" id="form1">
      
						<p class="name">
						<input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Name" id="name" />
						</p>
      
						<p class="email">
						<input name="email" type="text" class="validate[required,custom[email]] feedback-input" id="email" placeholder="Email" />
						</p>
      
						<p class="text">
						<textarea name="text" class="validate[required,length[6,300]] feedback-input" id="comment" placeholder="Comment"></textarea>
						</p>
      
      
						<div class="submit">
							<input type="submit" value="SEND" id="button-blue"/>
								<div class="ease"></div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- end #content -->
		<div id="sidebar">
			<div id="contacts-container">
			
			
				<?php
				$sql = "SELECT * FROM Contact LIMIT 1";
				$result = $mysqli->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$first3 = substr($row["Phone"], 0, 3);
						$last4 = substr($row["Phone"], 3);
						if(isset($row["Extension"])) {
							echo "<div class='contact-icon'><p><img src='../images/phone.png'> (" . $row["AreaCode"] . ") " . $first3 . "-" . $last4 . " Ext. " . $row["Extension"] . "</p></div>";
						}
						else {
							echo "<div class='contact-icon'><p><img src='../images/phone.png'> (" . $row["AreaCode"] . ") " . $first3 . "-" . $last4 . "</p></div>";
						}
							echo "<div style='clear: both;'>&nbsp;</div>";
							echo "<div class='contact-icon'><p><img src='../images/mail.png'> " . $row["Email"] . "</p></div>";
							echo "<div style='clear: both;'>&nbsp;</div>";
							echo "<div class='contact-icon'><p><img src='../images/home.gif'> " . $row["Address"] . " " . $row["City"] . ", " . $row["Province"] . " " . $row["PostalCode"] . "</p></div>";
							
					}
				} else {
				echo "No Contact Info";
				}
			?>				
			</div>
			
		</div>
		
		<!-- end #content -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page --> 
</div>
<div id="footer-content" class="container">
	<div id="footer-bg">

		<div id="column1">
			<h2>Contact Info</h2>
			<ul class="list-style2">
<?php
				$sql = "SELECT Address, AreaCode, Extension, Phone, Email, PostalCode, City, Province FROM Contact LIMIT 1";
				$result = $mysqli->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						if(isset($row["Extension"])) {
							echo "<li class='first'>(" . $row["AreaCode"] . ") " . $row["Phone"] . " Ext. " . $row["Extension"] . "</li>";
						}
						else {
							echo "<li class='first'>(" . $row["AreaCode"] . ") " . $row["Phone"] . "</li>";
						}
							echo "<li>" . $row["Email"] . "</li>";
							echo "<li>" . $row["Address"] . "</li>";
							echo "<li>" . $row["City"] . ", " . $row["Province"] . " " . $row["PostalCode"] . "</li>";
					}
				} else {
				echo "No Contact Info";
				}
			?>	

			</ul>
		</div>
		<div class="form" id="column3">
			<h2>Email Us</h2>
			
			<form name="contactform" method="post" action="send_form_email.php"> 
				<table width="450px">
				<tr> 
					<td valign="top"> 
						<label for="first_name">Name *</label> 
					</td> 
						<td valign="top">
						<input  type="text" name="first_name" maxlength="50" size="30">
					</td>
				</tr> 
				<tr> 
				<td valign="top">
				<label for="email">Email Address *</label>
				</td> 
				<td valign="top"> 
					<input  type="text" name="email" maxlength="80" size="30">
				</td>
				</tr> 
				<tr>
					<td valign="top"> 
						<label for="comments">Comments *</label>
					</td>
					<td valign="top">
						<textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="text-align:center">
						<input type="submit" href="http://www.freecontactform.com/email_form.php" value="Submit" class="submit-button">
					</td>
				</tr>
				</table>
			</form>
		</div>
	</div>
</div>
<div id="footer">
	<p>© 2014 Balmoral Curling Club Society. All rights reserved.  Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.  Photos by <a href="http://curling.ca">CCA</a>.</p>
</div>
<!-- end #footer -->
</body>
</html>
