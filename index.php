<?php 
include("dbconnect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>JOURNEY & TOURISTRY INFO</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/grid.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/jquery-ui-1.8.5.custom.css" type="text/css" media="all">
	<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
	<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.5.custom.min.js"></script>
	<!--[if lt IE 9]>
		<script type="text/javascript" src="js/html10.js"></script>
	<![endif]-->
    <style type="text/css">
<!--
.style5 {color: #666666; font-size: 14px; }
.style7 {color: #666666; font-weight: bold; font-size: 14px; }
.style8 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
-->
    </style>
</head>

<body>
	<header>
		<nav>
			<div class="container">
				<div class="wrapper">
					<h1><a href="index.php"><strong>SOFTWARE FOR JOURNEY PLANNER</strong></a></h1>
					<ul>
						<li><a href="index.php" class="current">about</a></li>
					    <li><a href="user_register.php">User Register</a></li>
						<li><a href="user_login.php">Login</a></li>
						<li><a href="admin.php">Admin Login</a></li>
							
					</ul>
			  </div>
			</div>
		</nav>
		<section class="adv-content">
		
			<div class="container">
				<ul class="breadcrumbs">
					<li>Home</li>
				</ul>
				<form action="" id="search-form">
					<fieldset>
						<input type="text" value=""><input type="submit" value="">
					</fieldset>
				</form>
			</div>
		</section><div class="ic"></div>
	</header>
	<section id="content">
		<div class="top">
			<div class="container">
				<div class="clearfix">
				  <section id="gallery">
						<div class="pics">
							<img src="pondicherry/1.1236697260.welcome-to-puducherry.jpg" alt="" width="4910" height="329">
							<img src="pondicherry/12249_0.jpg" alt="" width="4910" height="329">
							<img src="pondicherry/dscn3675.jpg" alt="" width="4910" height="329">
							<img src="pondicherry/Pondicherry-Harbour1.jpg" alt="" width="4910" height="329">
							<img src="pondicherry/Pondy Beach (18)-769332.jpg" alt="" width="4910" height="329">
						</div>
					  <a href="#" id="prev"></a>
				    <a href="#" id="next"></a></section>
					<section id="intro">
						<div class="inner">
							<h2 align="left" class="style8">HAPPY JOURNEY </h2>
							<p>Travel is the movement of people between relatively distant geographical locations, and can involve travel by foot, bicycle, automobile, train, boat, bus, airplane, or other means, with or without luggage, and can be one way or round trip. Travel can also include relatively short stays between successive movements.</p>
							<br>
							<a href="history.php" class="extra-button">Read More</a>
						</div>
					</section>
				</div>
			</div>
		</div>
		<div class="middle">
			<div class="container">
				<div class="wrapper">
					<div class="grid3 first">
						<ul class="categories">
							<li><a href="history.php">History</a></li>
							<li><a href="location.php">Location</a></li>
							<li><a href="tourist.php">Tourist Spots </a></li>
						</ul>
					</div>
					<div class="grid9" style="line-height:20px;">
						<h2>Tour News</h2>
						<marquee>
						<?php $query = mysql_query("select * from add_tour");
						while($res = mysql_fetch_array($query))
						{
						?>
						<table width="" border="1" cellpadding="20" cellspacing="20">
                          <tr>
                            <td rowspan="3" align="center" valign="middle"><img src="Arrange/<?php echo $res['tourimage'];?>" height="100" width="100"/></td>
                            <td><span class="style5"><a href="user_login.php?id=<?php echo $res['id'];?>"><?php echo $res['tourname']; ?></a></span></td>
                          </tr>
                          <tr>
                            <td><span class="style7">From:&nbsp;&nbsp;</span><span class="style5"><?php echo $res['tourdate']; ?><strong> To</strong>:&nbsp;&nbsp;<?php echo $res['returndate'];?></span></td>
                          </tr>
                          <tr>
                            <td><span class="style7">Amount:&nbsp;&nbsp;Rs.</span> <span class="style5"><?php echo $res['touramount'];?></span></td>
                          </tr>
                        </table>
						<?php
						}
						?>
						</marquee>
						<p>&nbsp;</p>
						<section class="images"></section>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom">
			<div class="container">
				<div class="wrapper">
				  <div class="grid3">
						<h3>Quick Links</h3>
						<ul class="list2">
								<li><a href="history.php">History</a></li>
							<li><a href="location.php">Location</a></li>
							<li><a href="tourist.php">Tourist Spots </a></li>
							<li><a href="contact.php"></a></li>
							<li><a href="admin.php">Admin</a></li>
					</ul>
					</div>
					<div class="grid34">
						<h3>Gallery</h3>
						<div id="imag1" style="margin:10px; float:left">
					<img src="pondicherry/12249_0.jpg" height="100" width="100">
					</div>
					<div id="imag1" style="margin:10px; float:left">
					<img src="pondicherry/dscn3675.jpg" height="100" width="100">
					</div>
					<div id="imag1" style="margin:10px; float:left">
					<img src="pondicherry/Pondy Beach (18)-769332.jpg" height="100" width="100">
</div><div id="imag1" style="margin:10px; float:left"><img src="pondicherry/Pondicherry-Harbour1.jpg" height="100" width="100"></div>
					
					
					</div>
					<div class="grid34">
						<div id="datepicker"></div>
					</div>
				</div>
					
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer>
		<div class="container">
			<div class="wrapper">
				<div class="copy">Our city Pondicherry &copy; 2014</div>
				<address class="phone">
					We're glad to help you. Please email or call us. <strong>1-123-456-7890</strong>
				</address>
			</div>
		</div>
	</footer>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.pics').cycle({
				fx: 'toss',
				next:	 '#next', 
				prev:	 '#prev' 
			});
			
			// Datepicker
			$('#datepicker').datepicker({
				inline: true
			});
			
		});
	</script>
</body>
</html>