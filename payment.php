<?php 
session_start();
include("dbconnect.php");
extract($_POST);
$rdate=date("Y-m-d");
$tourid = 2;
$day = date("d");
$month = date("m");
$year=date("Y");
$uname = $_SESSION['user'];

$tid=$_REQUEST['tid'];




$tquery = mysql_query("select * from add_tour where id='$tourid'");
$tres = mysql_fetch_array($tquery);
$amount = $tres['touramount'];
$from = $tres['tourdate'];
$to = $tres['returndate'];
$tourname = $tres['tourname'];

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
						<li><a href="index.php">Home</a></li>
					<li><a href="Book_tour.php" class="current">Book Tour</a></li>
						<li><a href="view_ticket.php">View Ticket Details</a></li>
						<li><a href="logout.php">Logout</a></li>
					
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
				<h2>Payment Confirmation </h2>
			  <div align="center">
<h3>&nbsp;</h3>
<form name="form1" method="post" action="">
  <table width="263" height="149" border="1">

    <tr>
      <th width="86" align="left" scope="row"> Account No. </th>
      <td width="98" align="left"><input type="text" name="account"></td>
    </tr>

    <tr>
      <th align="left" scope="row">&nbsp;</th>
      <td align="left"><input type="submit" name="btn" value="Submit"></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <?php
  
  if(isset($btn))
  {
  $q3=mysql_query("select * from user where username='$uname' && account='$account'");
  $n3=mysql_num_rows($q3);
  	if($n3>0)
	{
  ?>
  <h3>Your Payment is been Confirmed....</h3>
  <p style="color:#FF0000;font-size:14px;"><a href="booked_details.php">View Booked ticket</a></p>
  <p>&nbsp;</p>
  <?php
  	}
	else
	{
	?>
	<script language="javascript">
	alert("Invalid Account!");
	</script>
	<?php
	}
  }
  ?>
  <p>&nbsp;</p>
  </form>
<h3>&nbsp;</h3>
<h3>&nbsp;</h3>
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