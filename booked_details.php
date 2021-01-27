<?php 
session_start();
include("dbconnect.php");
extract($_POST);
$uname=$_SESSION['user'];
$rdate=date("Y-m-d");
$tourid = 2;
$day = date("d");
$month = date("m");
$year=date("Y");
$uname = $_SESSION['user'];


$tquery = mysql_query("select * from book_tour where username='$uname'");
$tnum = mysql_num_rows($tquery);


if($uname=="")
{
header("location:user_login.php?msg=login");
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
padding:20px;
}
tr{
margin-bottom:30px;
}
.style1 {color: #000000}
</style>
</head>

<body>
	<header>
		<nav>
			<div class="container">
				<div class="wrapper">
					<h1><a href="index.php"><strong>SOFTWARE FOR JOURNEY PLANNER</strong></a></h1>
					<ul>
								<li><a href="userhome.php">Home</a></li>
					<li><a href="Book_bus.php" >Book Bus</a></li>
						<li><a href="booked_details.php"class="current"> View Ticket Details</a></li>
						<li><a href="slogout.php">Logout</a></li>
					
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
				<h2>Ticket Details </h2>
			  <div align="center">
<table width="500" border="1">
  <tr>
    <td bgcolor="#E86D6A"><span class="style1">S.No</span></td>
    <td bgcolor="#E86D6A"><span class="style1">Name</span></td>
    <td bgcolor="#E86D6A"><span class="style1">Age</span></td>
	 <td bgcolor="#E86D6A"><span class="style1">SeatNo</span></td>
    <td bgcolor="#E86D6A"><span class="style1">Status</span></td>
    </tr>
	<?php
	$i=0; 
	while($tres = mysql_fetch_array($tquery))
	{
	$i++;
	?>
  <tr>
    <td bgcolor="#F0D9D2"><?php echo $i; ?></td>
    <td bgcolor="#F0D9D2"><?php echo $tres['person'];?></td>
    <td bgcolor="#F0D9D2"><?php echo $tres['age'];?></td>
	<td bgcolor="#F0D9D2"><?php echo $tres['seatno'];?></td>
    <td bgcolor="#F0D9D2"><?php 
	if($tres['status']==0)
	{
	echo "Process..";
	}else{
	echo "Confirmed..";
	}
?></td>
    </tr>
	<?php
	}
	?>
</table>
<h3>&nbsp;</h3>
<p style="color:#FF0000;font-size:14px;"><a href="booked_details.php"></a></p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
                <h3 style="color:#333333;">&nbsp;</h3>
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