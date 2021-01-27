<?php 
session_start();
$admin = $_SESSION['user'];
include("email.php"); 
if($admin=="")
{
header("location:admin.php");
}
include("dbconnect.php");
extract($_POST);

$rdate=date("Y-m-d");
$tourid = 2;
$day = date("d");
$month = date("m");
$year=date("Y");
$uname = $_SESSION['user'];

$id = $_REQUEST['id'];
$act = $_REQUEST['act'];

if($act == "cancel")
{
mysql_query("update book_tour set status='2' where id='$id'");
header("location:view_bookedticket.php");

}
if($act == "confirm")
{
$q1=mysql_query("select * from book_tour where id=$id");
$r1=mysql_fetch_array($q1);
$usr=$r1['username'];
$tour_id=$r1['tour_id'];
$q2=mysql_query("select * from user where username='$usr'");
$r2=mysql_fetch_array($q2);
$mobile=$r2['contact'];
$email=$r2['username'];

$q11=mysql_query("select * from add_tour where id=$tour_id");
$r11=mysql_fetch_array($q11);
$source=$r11['source'];
$dest=$r11['dest'];


mysql_query("update book_tour set status='1' where id='$id'");
$message="Your Ticket is confirmed. Travel Place: From:$source,To:$dest";

echo '<iframe src="http://pay4sms.in/sendsms/?token= b81edee36bcef4ddbaa6ef535f8db03e&credit=2&sender= RandDC&message='.$message.'&number=91'.$mobile.'" style="display:block"></iframe>';
//header("location:view_bookedticket.php");

}

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
							<li><a href="view_details.php" >Users</a></li>
						
						<li><a href="add_tourist.php"  >Add Tourist</a></li>
						<li><a href="view_tour.php" >View Tourist</a></li>
						<li><a href="view_bookhotel.php" >Booking Hotel</a></li>
					<li><a href="view_bookedticket.php" class="current" >Booking Details</a></li>
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
				<h2>Ticket Details </h2>
			  <div align="center">
<table width="500" border="1" cellpadding="10">
  <tr>
    <td bgcolor="#E86D6A"><span class="style1">S.No</span></td>
    <td bgcolor="#E86D6A"><span class="style1"><strong>UserName</strong></span></td>
    <td bgcolor="#E86D6A"><span class="style1">Name</span></td>
    <td bgcolor="#E86D6A"><span class="style1">Age</span></td>
	 <td bgcolor="#E86D6A"><span class="style1">SeatNo</span></td>
    <td bgcolor="#E86D6A"><span class="style1">Status</span></td>
    </tr>
	<?php
	$i=0; 
	$tquery = mysql_query("select * from book_tour");
	while($tres = mysql_fetch_array($tquery))
	{
	$i++;
	?>
  <tr>
    <td bgcolor="#F0D9D2"><?php echo $i; ?></td>
    <td bgcolor="#F0D9D2"><?php echo $tres['username'];?></td>
    <td bgcolor="#F0D9D2"><?php echo $tres['person'];?></td>
    <td bgcolor="#F0D9D2"><?php echo $tres['age'];?></td>
	<td bgcolor="#F0D9D2"><?php echo $tres['seatno'];?></td>
    <td bgcolor="#F0D9D2"><?php 
	if($tres['status']==0)
	{
	?>
<a href="view_bookedticket.php?id=<?php echo $tres['id'];?>&act=confirm">Confirm</a>||<a href="view_bookedticket.php?id=<?php echo $tres['id'];?>&act=cancel">Cancel</a>
<?php
	}elseif($tres['status']==1)
	{
	echo "Confirmed..";?>||<a href="view_bookedticket.php?id=<?php echo $tres['id'];?>&act=cancel">Cancel</a><?php

	}else{
?><a href="view_bookedticket.php?id=<?php echo $tres['id'];?>&act=confirm">Confirmed</a>||<?php
echo "Cancelled..";
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