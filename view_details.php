<?php 
include("dbconnect.php");
extract($_POST);
session_start();
$admin = $_SESSION['user'];

if($admin=="")
{
header("location:admin.php");
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/grid.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<!--[if lt IE 9]>
-->

<style>
td{
color:#990000;
font-size:14px;
font-stretch:expanded;
font-weight:800;
}
#tabdata{
padding:15px;
}
tr{
margin-bottom:30px;
}
.style1 {color: #990000}
.style4 {font-size: 12px; color: #000000; }
</style>
</head>

<body>
	<header>
		<nav>
			<div class="container">
				<div class="wrapper">
					<h1><a href="index.php"><strong>SOFTWARE FOR JOURNEY PLANNER</strong></a></h1>
					<ul>
						<li><a href="view_details.php" class="current">Users</a></li>
						<li><a href="add_tourist.php" >Add Tourist</a></li>
						<li><a href="view_tour.php" >View Tourist</a></li>
						<li><a href="arrange_hotel.php" >Arrange Hotel</a></li>
						<li><a href="arrange_tour.php" >Arrange Bus</a></li>
					<li><a href="view_bookedticket.php" >Booking Details</a></li>
						<li><a href="logout.php" >Logout</a></li>
					</ul>
			  </div>
			</div>
		</nav>
		<section class="adv-content">
			<div class="container">
				<ul class="breadcrumbs">
					<li></li>
				</ul>
				<form action="" id="search-form">
					<fieldset>
						<input type="text" value=""><input type="submit" value="" >
					</fieldset>
				</form>
			</div>
		</section><div class="ic"></div>
	</header>
	<section id="content">
		<div class="top">
			<div class="container">
			<h2>User Details </h2>
			<div align="center">
			
			<p>&nbsp;</p>	
			<p>
			<table width="" border="1" cellpadding="10">
  <tr>
    <td><span class="style1">SNo</span></td>
    <td><span class="style1">Name</span></td>
    <td><span class="style1">User Name</span></td>
    <td><span class="style1">Gender</span></td>
    <td><span class="style1">D-O-B</span></td>
    <td><span class="style1">Address</span></td>
    <td><span class="style1">Contact</span></td>
    <td><span class="style1">Registered Date</span></td>
  </tr>
  
			<?php
			$i=0;
			$tquery = mysql_query("select * from user");
			while($tres = mysql_fetch_Array($tquery))
			{
			$i++;
			?>
			
  <tr>
    <td align="center"><span class="style4"><?php echo $i; ?></span></td>
    <td align="center"><span class="style4"><?php echo $tres['Name']; ?></span></td>
    <td align="center"><span class="style4"><?php echo $tres['username']; ?></span></td>
    <td align="center"><span class="style4"><?php echo $tres['gender']; ?></span></td>
    <td align="center"><span class="style4"><?php echo $tres['dob']; ?></span></td>
    <td align="center"><span class="style4"><?php echo $tres['address']; ?></span></td>
    <td align="center"><span class="style4"><?php echo $tres['contact']; ?></span></td>
    <td align="center"><span class="style4"><?php echo $tres['rdate']; ?></span></td>
  </tr>
  <?php
  }
	  ?>
</table>

			
			
			
			
			</p>	
			<p>&nbsp;</p>	
			<p>&nbsp;</p>	
			<p>&nbsp;</p>		
			
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
</body>
</html>