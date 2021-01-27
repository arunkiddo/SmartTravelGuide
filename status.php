<?php 
session_start();
include("dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['user'];
$cdate=date("d-m-Y");
if($_REQUEST['act']=="cancel")
{
$cid=$_REQUEST['cid'];
mysql_query("update hotel_booking set status=3 where id=$cid");
header("location:status.php");
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
.style1 {
	color: #000000;
	font-weight: bold;
}
</style>
<script language="javascript">
function rateWin(id)
{
window.open("rating.php?sid="+id,"Rating","width=400,height=500,menubar=0,toolbar=0,statusbar=0,scrollbars=1");
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
				<h2>Book Hotel </h2>
		        <div align="center">
		
			  <p>&nbsp;</p>
			   <p><?php echo $tourid;?></p>
<form name="form1" action="" method="post">
  <h3>Booking Details </h3>
  <table width="825" border="1" align="center" cellpadding="5" cellspacing="5">
    <tr>
      <th width="25" scope="col"><h3 class="style1">Sno</h3></th>
      <th width="69" scope="col"><h3 class="style1">Booking ID </h3></th>
      <th width="84" scope="col"><h3 class="style1">IN - OUT Date </h3></th>
      <th width="72" scope="col"><h3 class="style1">No. of Days </h3></th>
      <th width="94" scope="col"><h3 class="style1">No. of Persons </h3></th>
      <th width="64" scope="col"><h3 class="style1">Room Type </h3></th>
      <th width="64" scope="col"><h3 class="style1">Rate (Rs.) </h3></th>
      <th width="85" scope="col"><h3 class="style1">Total Amount </h3></th>
      <th width="108" scope="col"><h3 class="style1">Action</h3></th>
      <th width="108" scope="col"><h3 class="style1">Rating</h3></th>
    </tr>
    <?php
		    $i=0;
			$qry=mysql_query("select * from hotel_booking where uname='$uname'");
			while($row=mysql_fetch_array($qry))
			{ 
			$i++;
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
      <td align="center"><?php echo $i; ?></td>
      <td align="center"><?php echo $row['book_id']; ?></td>
      <td align="center"><?php echo $row['in_date']." to ".$row['out_date']; ?></td>
      <td align="center"><?php echo $row['no_days']; ?></td>
      <td align="center"><?php echo $row['persons']; ?></td>
      <td align="center"><?php echo $row['room_type']; ?></td>
      <td align="center"><?php echo $row['rate']; ?></td>
      <td align="center"><?php echo $row['tot_amt']; ?></td>
      <td align="center"><?php 
			if($row['status']=="0")
			{
		    echo '<a href="status.php?act=cancel&cid='.$row['id'].'">Want to Cancel</a>';
			}
			else if($row['status']=="1")
			{
			echo "Currently staying";
			}
			else if($row['status']=="2")
			{
			echo "Stayed";
			}
			else if($row['status']=="3")
			{
			echo "Cancelled";
			}
			?></td>
      <td align="center"><a href="javascript:rateWin('<?php echo $row['id']; ?>')">Rating</a>&nbsp;</td>
    </tr>
    <?php
		   }
		   ?>
  </table>
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