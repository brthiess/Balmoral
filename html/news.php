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
<div id="about-us-header">
	<div id="header" class="container">
		<div id="logo">
			<img src="../images/logo.gif">
		</div>
		<div id="menu">
			<ul>
				<li><a href="index.php">Homepage</a></li>
				<li><a href="aboutus.php">What We Do</a></li>
				<li class="current_page_item"><a href="news.php">Recent News</a></li>
				<li><a href="register.php">Registration</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</div>
	</div>
	<div id="title"> 
		<h2>Recent News</h2>
	</div>
</div>
<div id="wrapper">
	<div id="splash" class="container"><span>The BCCS</span> is committed to the pursuit of excellence.  As a group we support our community through financial support and funding programs for youth. </div>
	<div id="page" class="container">
		<div id="content-about-us">
			
					<?php
				if (isset($_GET["identification"])) {
					$i = $_GET["identification"];
					$nextpage = $i;
				}
				else {
					$i = 0;
					$nextpage = 0;
				}
				$max = $i + 3;
				$base = 0;
				$sql = "SELECT ID, Content, Title, PostDate FROM Post ORDER BY PostDate DESC";
				$result = $mysqli->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($base < $i) {
						$row = $result->fetch_assoc();
						$base += 1;
					}
					while(($i < $max) && $row = $result->fetch_assoc()) {
						echo "<div class='post-about-us'><h2 class='title'><a href='news.php?article-number=" . $row["ID"] . "'>" . $row["Title"] . "</a></h2>
						<div class='date'>". $row["PostDate"]. "</div>
						<div class='entry'>" . Markdown::defaultTransform($row["Content"]) . "</div>
						</div>
						<div style='clear:both;'>&nbsp;</div>";
						$i += 1;
					}
				} else {
				echo "No blog posts";
				}
				if (isset($_GET["identification"])) {
					if($_GET["identification"] > 0) {
						echo "<a href='news.php?identification=" . strval($nextpage - 3) . "'> Previous Page</a>";
					}
				}				
				if ($result->fetch_assoc() != null) {
					
					echo "<a href='news.php?identification=" . strval($nextpage + 3) . "'> Next Page</a>";
				}
			?>
		

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
