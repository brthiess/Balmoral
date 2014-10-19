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
				$myFile = "../text/slider3caption.txt";
				$fh = fopen($myFile, 'r');
				$theData = fread($fh, filesize($myFile));
				fclose($fh);
				echo $theData;
				?>

            </div>
            </li>

            <li id="fourth" class="fourthanimation">
            <a href="#">
            <img src="../images/slider4.jpg" alt="Junior Curling"/>
            </a>
            <div class="tooltip">
				<?php
				$myFile = "../text/slider4caption.txt";
				$fh = fopen($myFile, 'r');
				$theData = fread($fh, filesize($myFile));
				fclose($fh);
				echo $theData;
				?>
            </div>
            </li>
            
            <li id="first" class="firstanimation">
            <a href="#">
            <img src="../images/slider1.jpg" alt="BCCS"/>
            </a>
            <div class="tooltip">
				<?php
				$myFile = "../text/slider1caption.txt";
				$fh = fopen($myFile, 'r');
				$theData = fread($fh, filesize($myFile));
				fclose($fh);
				echo $theData;
				?>
            </div>
            </li>
                        f
            <li id="second" class="secondanimation">
            <a href="#">
            <img src="../images/slider2.jpg" alt="SSC"/>
            </a>
            <div class="tooltip">
				<?php
				$myFile = "../text/slider2caption.txt";
				$fh = fopen($myFile, 'r');
				$theData = fread($fh, filesize($myFile));
				fclose($fh);
				echo $theData;
				?>
            </div>
            </li>
                        
            <li id="fifth" class="fifthanimation">
            <a href="#">
            <img src="../images/slider5.jpg" alt="High School Curling"/>
            </a>
            <div class="tooltip">
				<?php
				$myFile = "../text/slider5caption.txt";
				$fh = fopen($myFile, 'r');
				$theData = fread($fh, filesize($myFile));
				fclose($fh);
				echo $theData;
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
				<div class="entry">
					<div class="entry-title">
					Balmoral Society Creates a Website!
					</div>
					<div class="date">
					<p>October 17, 2014</p>
					</div>
					<p>Welcome to our brand new Website!
					The purpose of the <strong>BCCS</strong> is to promote the sport of curling, primarily in
						Edmonton, Alberta, and secondarily in Canada, by offering financial and other incentives for youth
							curling programs held at the Saville Community Sports Centre (successor to the Balmoral Curling Club).</p>
					<p></p>
				</div>
			</div>
			<div style="clear: both;">&nbsp;</div>
		</div>
		<!-- end #content -->
		<div id="sidebar">
			<div>
				<h2>Recent Blog Posts</h2>
				<ul class="list-style1">
					<li class="first"><a href="#">Balmoral Society Creates A Website! - <i>October 17, 2014</i></a></li>
					<li><a href="#">Balmoral Funds New Program - <i>October 13, 2014</i></a></li>
					<li><a href="#">Fundraising - <i>September 18, 2014</i> </a></li>
					<li><a href="#">New Season - <i>September 1, 2014</i></a></li>

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
				<li class="first">(780) 123-4567</li>
				<li>balmoral@balmoralsociety.ca</li>
				<li>123 Saville Street NW</li>
				<li>Edmonton, AB T6E 2E3</li>

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
