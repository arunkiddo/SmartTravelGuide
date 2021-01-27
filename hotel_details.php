<?php 
session_start();
include("dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['user'];
$rdate=date("Y-m-d");

$bid=$_REQUEST['bid'];
$qs2=mysql_query("select * from hotel_booking where id=$bid");
$rs2=mysql_fetch_array($qs2);
$hid=$rs2['hid'];

$q1=mysql_query("select * from user where username='$uname'");
$r1=mysql_fetch_array($q1);
$mobile=$r1['contact'];
$name=$r1['name'];
$bookid=$rs2['book_id'];
$rn=rand(10000,99999);
$service=$rs2['id']."S".$hid."D".$rn;
mysql_query("update hotel_booking set scode='$service' where id=$bid");
$message="Dear $name, Your Booking ID:$bookid, Click to go this link for Add your reviews, Link: http://projectone.in/service_rating/rating.php?service=$service";

echo '<iframe src="http://pay4sms.in/sendsms/?token= b81edee36bcef4ddbaa6ef535f8db03e&credit=2&sender= RandDC&message='.$message.'&number=91'.$mobile.'" style="display:block"></iframe>';

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
.style5 {color: #666666; font-size: 14px; }
.style7 {color: #666666; font-weight: bold; font-size: 14px; }
</style>
		<script language="javascript">
function rateWin(id)
{
window.open("rate_view.php?sid="+id,"Rating","width=400,height=500,menubar=0,toolbar=0,statusbar=0,scrollbars=1");
}
</script>

</head>

<body>
	<header>
		<nav>
			<div class="container">
				<div class="wrapper">
					<h1><a href="index.php"><strong>SOFTWARE FOR JOURNEY PLANNER</strong></a></h1>
					<ul>
						<li><a href="userhome.php">Home</a></li>
					<li><a href="Book_tour.php" class="current">Book Tour</a></li>
						<li><a href="booked_details.php" >View Ticket Details</a></li>
						<li></li>
						<li><a href="tourist.php">Tourist spot</a></li>
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
			  <h2> Hotel </h2>
            <div align="center">
		
			  <p>&nbsp;</p>
			   <p><?php echo $tourid;?></p>
<form name="form1" action="" method="post">
  <h3>Hotel Booking Details </h3>
  <p><strong>Booking ID : <?php echo $rs2['book_id']; ?></strong></p>
  <table width="90%" border="0" cellpadding="5" cellspacing="0" bgcolor="#FFEBD7">
    <tr>
      <td width="19%" align="left" scope="col"><strong>In Date </strong></td>
      <td width="31%" align="left" scope="col"><?php echo $rs2['in_date']; ?></td>
      <td width="26%" align="left" scope="col"><strong>No. of Days </strong></td>
      <td width="24%" align="left" scope="col"><?php echo $rs2['no_days']; ?></td>
    </tr>
    <tr>
      <td align="left"><strong>Out Date </strong></td>
      <td align="left"><?php echo $rs2['out_date']; ?></td>
      <td align="left"><strong>No. of Rooms </strong></td>
      <td align="left"><?php echo $rs2['rooms']; ?></td>
    </tr>
    <tr>
      <td align="left"><strong>No. of Persons </strong></td>
      <td align="left"><?php echo $rs2['persons']; ?></td>
      <td align="left"><strong>Room Rate </strong></td>
      <td align="left">Rs. <?php echo $rs2['rate']; ?></td>
    </tr>
    <tr>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left"><strong>Total Amount </strong></td>
      <td align="left">Rs. <?php echo $rs2['tot_amt']; ?></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p><a href="status.php">View</a></p>
</form>
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