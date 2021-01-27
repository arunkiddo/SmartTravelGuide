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
				<h2>Book Tour </h2>
			  <div align="center">
		
			  <p>&nbsp;</p>
			   <p><?php echo $tourid;?></p>
<form name="form1" action="" method="post">
	<table width="500" border="1">
  <tr>
    <td>Enter No.of Persons </td>
    <td><input type="text" name="no"></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="submit"></td>
    </tr>
</table>
  <p>&nbsp;</p>
			   <p>&nbsp;</p>
</form>
<form name="form2" action="" method="post">
<?php
extract($_POST);
if(isset($submit))
{
$tid=$_REQUEST['id'];
$q11=mysql_query("select * from book_tour where tour_id=$tid");
						$n11=mysql_num_rows($q11);
						$noseat=60-$n11;
							if($noseat>0)
							{
?>
<table width="500" border="1">
  <tr>
    <td colspan="4" align="center">Enter the Name of the Persons </td>
  </tr>
  <tr>
  <?php
for($i=0; $i<$no;$i++)
{
?>
  <tr>
    <td align="center">Name</td>
    <td align="center"><input type="text" name="fname[]"></td>
    <td align="center">Age</td>
    <td align="center"><input type="text" name="age[]"></td>
  </tr>
  <?php
	}
	?>
  <tr>
    <td align="center">&nbsp;</td>
    <td colspan="4" align="center"><input type="submit" name="insert" value="Book"></td>
  </tr>
</table>
<?php

		}
		else
		{
		echo "No seats!";
		}
}		
?>
	</form>
	
	<?php
	extract($_POST);
	if(isset($insert))
	{
		$i=0;
	foreach($fname as $name)
	{
	$age1 = $age[$i];
	$query1 = mysql_query("select max(id) as maxid from book_tour");
	$res1 = mysql_fetch_array($query1);
	$id1 = $res1['maxid'] + 1; 
		$query2 = mysql_query("select max(seatno) as maxid from book_tour");
	$res2 = mysql_fetch_array($query2);
	$id2 = $res2['maxid'] + 1; 
	if($id2%2==0){
	$id2 = $id2."W";
      }
	  else{
	  $id2 = $id2;
	  }
		
	$ins = mysql_query("insert into book_tour(id, username, tour_id, person, age, seatno, amount, day, month, year, status, rdate) Values('$id1', '$uname','$tourid','$name','$age1','$id2','$amount','$day','$month','$year',0,'$rdate')");
		$i++;
	}
	if($ins)
	{
	?>
	<p style="color:#FF0000;font-size:18px;">Ticket has been Booked Successfully</p>
	<?php
	}
	?>
<?php
$ticquery = mysql_query("select count(username) as count, sum(amount) as amount from book_tour where username='$uname' and tour_id='$tourid'" );
$ticnum = mysql_fetch_array($ticquery);
$numseat = $ticnum['count'];
$amountt = $ticnum['amount'];
?>
	<p><h3 style="color:#333333;">Ticket Details</h3>
	<table width="500" border="1">
  <tr>
    <td colspan="2" align="right" bgcolor="#F2C0BD">Tour Name </td>
    <td colspan="2" align="left" bgcolor="#F2C0BD"><?php echo $tourname;?></td>
    </tr>
  <tr>
    <td align="left" bgcolor="#F2C0BD">From</td>
    <td align="center" bgcolor="#F2C0BD"><span class="style1"><?php echo $from;?></span></td>
    <td align="left" bgcolor="#F2C0BD">To</td>
    <td align="center" bgcolor="#F2C0BD"><span class="style1"><?php echo $to;?></span></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#F2C0BD">Total Seats </td>
    <td align="center" bgcolor="#F2C0BD"><span class="style1"><?php echo $numseat; ?></span></td>
    <td align="left" bgcolor="#F2C0BD">Amount per seat </td>
    <td align="center" bgcolor="#F2C0BD"><span class="style1"><?php echo $amount;?></span></td>
  </tr>
</table>

	<p>&nbsp;</p>
	<table width="500" border="1">
  <tr>
    <td align="center" bgcolor="#E3571C"><span class="style1">S.No</span></td>
    <td align="center" bgcolor="#E3571C"><span class="style1">Name</span></td>
    <td align="center" bgcolor="#E3571C"><span class="style1">Age</span></td>
    <td align="center" bgcolor="#E3571C"><span class="style1">Seat No </span></td>
  </tr>
  <?php
  $i=0; 
  $nuquery = mysql_query("select * from book_tour where username='$uname'");
  while($nures = mysql_fetch_array($nuquery))
  {
  $i++;
  ?>
  <tr>
    <td align="center" bgcolor="#EBDEE3"><?php echo $i; ?></td>
    <td align="center" bgcolor="#EBDEE3"><?php echo $nures['person'];?></td>
    <td align="center" bgcolor="#EBDEE3"><?php echo $nures['age'];?></td>
    <td align="center" bgcolor="#EBDEE3"><?php echo $nures['seatno'];?></td>
  </tr>
  <?php
  } ?>
  <tr>
  <td colspan="4" align="center"><span class="style1">Total Amount</span>: &nbsp;<?php echo $amountt;?></td>
      </tr>
	  <tr>
	  <td colspan="4" align="center"><a href="payment.php?tid=<?php echo $_REQUEST['id']; ?>"><img src="images/pay.png" height="30" width="150"></a></td>
</tr>
</table>
<?php
}?>
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