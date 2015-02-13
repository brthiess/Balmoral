<?php
include_once '../includes/db_connect.php';

# Install PSR-0-compatible class autoloader
spl_autoload_register(function($class){
	require preg_replace('{\\\\|_(?!.*\\\\)}', DIRECTORY_SEPARATOR, ltrim($class, '\\')).'.php';
});

# Get Markdown class
use \Michelf\Markdown;
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
<div id="header-wrapper">
<a class="twitter-timeline"
  href="https://twitter.com/twitterdev"
  data-widget-id="YOUR-WIDGET-ID-HERE">
Tweets by @twitterdev
</a>
<script>window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));</script>
	<div id="header" class="container">
		<div id="logo">
			<img src="../images/logo.gif">
		</div>
		<div id="menu">
			<ul>
				<li class="current_page_item"><a href="#">Homepage</a></li>
				<li><a href="aboutus.php">What We Do</a></li>
				<li><a href="news.php">Recent News</a></li>
				<li><a href="register.php">Registration</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</div>
	</div>
<div id="banner" class="container">
	<div id="content-slider">
    	<div id="slider">
        	<div id="mask">
            <ul>
           	<li id="third" class="thirdanimation">
            <a href="#">
            <img src="../images/slider3.jpg" alt="Curling Equipment"/>
            </a>
            <div class="tooltip">
			<?php
				$sql = "SELECT Caption, Title, Photo FROM Slider WHERE ID = 3";
				$result = $mysqli->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<h1>". $row["Title"]. "</h1>" . "<p>" . $row["Caption"]. "</p>";
					}
				} else {
				echo "0 results";
				}
			?>

            </div>
            </li>

            <li id="fourth" class="fourthanimation">
            <a href="#">
            <img src="../images/slider4.jpg" alt="Junior Curling"/>
            </a>
            <div class="tooltip">
				<?php
				$sql = "SELECT Caption, Title, Photo FROM Slider WHERE ID = 4";
				$result = $mysqli->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<h1>". $row["Title"]. "</h1>" . "<p>" . $row["Caption"]. "</p>";
					}
				} else {
				echo "Balmoral Society";
				}
			?>
            </div>
            </li>
            
            <li id="first" class="firstanimation">
            <a href="#">
            <img src="../images/slider1.jpg" alt="BCCS"/>
            </a>
            <div class="tooltip">
				<?php
				$sql = "SELECT Caption, Title, Photo FROM Slider WHERE ID = 1";
				$result = $mysqli->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<h1>". $row["Title"]. "</h1>" . "<p>" . $row["Caption"]. "</p>";
					}
				} else {
				echo "0 results";
				}
			?>
            </div>
            </li>
                        
            <li id="second" class="secondanimation">
            <a href="#">
            <img src="../images/slider2.jpg" alt="SSC"/>
            </a>
            <div class="tooltip">
				<?php
				$sql = "SELECT Caption, Title, Photo FROM Slider WHERE ID = 2";
				$result = $mysqli->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<h1>". $row["Title"]. "</h1>" . "<p>" . $row["Caption"]. "</p>";
					}
				} else {
				echo "0 results";
				}
			?>
            </div>
            </li>
                        
            <li id="fifth" class="fifthanimation">
            <a href="#">
            <img src="../images/slider5.jpg" alt="High School Curling"/>
            </a>
            <div class="tooltip">
				<?php
				$sql = "SELECT Caption, Title, Photo FROM Slider WHERE ID = 5";
				$result = $mysqli->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<h1>". $row["Title"]. "</h1>" . "<p>" . $row["Caption"]. "</p>";
					}
				} else {
				echo "0 results";
				}
			?>
            </div>
            </li>
            </ul>
            </div>
            <div class="progress-bar"></div>
        </div>
    </div>
</div>
</div>
<div id="wrapper">
	<div id="splash" class="container"><span>Welcome to the Balmoral Curling Club Society</span>  </div>
	<div id="page" class="container">
		<div id="content">
			<div class="post">
				<h2 class="title"><a href="#">Recent News </a></h2>
					<?php
				$sql = "SELECT Title, Content, PostDate, ID FROM Post ORDER BY PostDate DESC LIMIT 3";
				$result = $mysqli->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<div class='entry'>
								<div class='entry-title'>" . $row["Title"]. "</div>
								<div class='date'><p>" . $row["PostDate"] . "</p></div>
								<p>" . Markdown::defaultTransform($row["Content"]) . "</p></div>";
					}
				} else {
				echo "No Recent News";
				}
			?>			
				
			</div>
			<div style="clear: both;">&nbsp;</div>
		</div>
		<!-- end #content -->
		<div id="sidebar">
			<div>
				<h2>Recent Posts</h2>
				<ul class="list-style1">
					<?php
				$sql = "SELECT Title, PostDate, ID FROM Post ORDER BY PostDate DESC LIMIT 6";
				$result = $mysqli->query($sql);
				$i = 0;
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						if ($i == 0) {
							echo "<li class='first'><a href='news.php?id=" . $row["ID"] . "'>" . $row["Title"] . " - <i>" . $row["PostDate"] . "</i></a></li>";
						}
						else {
							echo "<li><a href='news.php?id=" . $row["ID"] . "'>" . $row["Title"] . " - <i>" . $row["PostDate"] . "</i></a></li>";
						}
						$i += 1;
					}
				} else {
				echo "No Recent News";
				}
			?>	
				</ul>
			</div>
		</div>
		<!-- end #sidebar -->
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
