<?php 
session_start();
include("dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['user'];
$rdate=date("Y-m-d");

$_SESSION['id'] = $_REQUEST['id'];
$day = date("d");
$month = date("m");
$year=date("Y");
$uname = $_SESSION['user'];
$tourid= $_SESSION['id'];
//echo $tourid;
$tquery = mysql_query("select * from add_tour where id='$tourid'");
$tres = mysql_fetch_array($tquery);
$amount = $tres['touramount'];
$from = $tres['tourdate'];
$to = $tres['returndate'];
$tourname = $tres['tourname'];

if($uname=="")
{
header("location:user_login.php?msg=login&id=$tourid");
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
.style5 {color: #666666; font-size: 14px; }
.style7 {color: #666666; font-weight: bold; font-size: 14px; }
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
					<li><a href="Book_bus.php" class="current">Book Bus</a></li>
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
				<h2>Book Bus </h2>
		      <div align="center">
		
			  <p>&nbsp;</p>
			   <p><?php echo $tourid;?></p>
<form name="form1" action="" method="post">
	<table width="500" border="1">
  <tr>
    <td width="69">Source</td>
    <td width="415"><input type="text" name="source"> </td>
    <td width="415">Destination</td>
    <td width="415"><input type="text" name="dest"></td>
    <td width="415">Package</td>
    <td width="415"><select name="package">
      <option value="">-Select-</option>
      <option>Economic Package</option>
      <option>Business Package</option>
    </select></td>
  </tr>
  <tr>
    <td colspan="6" align="center"><input type="submit" name="btn"></td>
    </tr>
</table>
  <p>&nbsp;</p>
			   <p>&nbsp;</p>
			   <p>&nbsp;</p>
			   		<?php
					if(isset($btn))
					{
					 $query = mysql_query("select * from add_tour where source='$source' && dest='$dest' && package='$package'");
						while($res = mysql_fetch_array($query))
						{
						$td=$res['id'];
						$q11=mysql_query("select * from book_tour where tour_id=$td");
						$n11=mysql_num_rows($q11);
						$noseat=60-$n11;
							if($noseat>0)
							{
						?>

			   <table width="381" height="152" border="1" cellpadding="5" cellspacing="0">
                 <tr>
                   <td width="174" rowspan="4" align="center" valign="top"><p>&nbsp;</p>
                   <p><img src="Arrange/<?php echo $res['tourimage'];?>" height="100" width="100"/></p></td>
                   <td width="125"><span class="style5"><a href="book_tour.php?id=<?php echo $res['id'];?>"><?php echo $res['tourbus']; ?></a></span></td>
                 </tr>
                 <tr>
                   <td><span class="style7">From:&nbsp;&nbsp;</span><span class="style5"><?php echo $res['source']; ?><strong> To</strong>:&nbsp;&nbsp;<?php echo $res['dest'];?></span></td>
                 </tr>
                 <tr>
                   <td><strong class="style7">Available Seats : <?php echo $noseat; ?></strong></td>
                 </tr>
                 <tr>
                   <td><span class="style7">Amount:&nbsp;&nbsp;Rs.</span> <span class="style5"><?php echo $res['touramount'];?></span></td>
                 </tr>
               </table>
			   <?php
			   }
			   }
			   }
			   ?>
			   <p>&nbsp;</p>
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