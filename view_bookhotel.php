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
$usr=$r1['isername'];
$tour_id=$r1['tour_id'];
$q2=mysql_query("select * from user where username='$usr'");
$r2=mysql_fetch_array($q2);
$mobile=$r2['contact'];
$email=$r2['username'];

$q11=mysql_query("select * from add_tour where id=$tour_id");
$r11=mysql_fetch_array($q11);
$place=$r1['place'];
$tra_time=$r1['tra_time'];


mysql_query("update book_tour set status='1' where id='$id'");
$message="Your Ticket is confirmed. Travel Place: $place, Date & Time:$tra_time";

$objEmail	=	new CI_Email();
					$objEmail->from('tour@gmail.com', "Ticket");
					$objEmail->to("$email");
					$objEmail->subject("Ticket Booking Confirmation");
					$objEmail->message($message);
						
							if ($objEmail->send())
							{	
							//echo 'mail sent successfully';
							}
							else
							{
							//echo "not sent";
							}

echo '<iframe src="http://bulksms.mysmsmantra.com:8080/WebSMS/SMSAPI.jsp?username=AccessContr&password=733763493&sendername=Access&mobileno=91'.$mobile.',&message='.$message.'" style="display:block"></iframe>';
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
						<li><a href="view_bookhotel.php" class="current" >Booking Hotel</a></li>
					<li><a href="view_bookedticket.php"  >Booking Details</a></li>
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
				<h2>Booking Details </h2>
			    <div align="center">
			      <h3 class="style1">New Booking Details </h3>
			      <table width="700" border="1" cellspacing="5" cellpadding="5">
                    <tr>
                      <th width="25" scope="col"><span class="style1">Sno</span></th>
                      <th width="69" scope="col"><span class="style1">Booking ID </span></th>
                      <th width="84" scope="col"><span class="style1">IN  Date </span></th>
                      <th width="72" scope="col"><span class="style1">No. of Days </span></th>
                      <th width="94" scope="col"><span class="style1">No. of Persons </span></th>
                      <th width="64" scope="col"><span class="style1">Room Type </span></th>
                      <th width="64" scope="col"><span class="style1">Rate (Rs.) </span></th>
                      <th width="85" scope="col"><span class="style1">Total Amount </span></th>
                    </tr>
                    <?php
						$i=0;
						$qry=mysql_query("select * from hotel_booking where status=0");
						while($row=mysql_fetch_array($qry))
						{ $i++;
						$hid=$row['id'];
						$ds=(strtotime($row['in_date'])-strtotime($cdate))/(60*60*24);	
						$ds2=(strtotime($row['out_date'])-strtotime($cdate))/(60*60*24);	
						
							if($ds<=0 && $ds2>=0)
							{
							mysql_query("update hotel_booking set status=1 where id=$hid");
							}
							else if($ds<0 && $ds2<0)
							{
							mysql_query("update hotel_booking set status=2 where id=$hid");
							}
						?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $row['book_id']; ?></td>
                      <td><?php echo $row['in_date']; ?></td>
                      <td><?php echo $row['no_days']; ?></td>
                      <td><?php echo $row['persons']; ?></td>
                      <td><?php echo $row['room_type']; ?></td>
                      <td><?php echo $row['rate']; ?></td>
                      <td><?php echo $row['tot_amt']; ?></td>
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