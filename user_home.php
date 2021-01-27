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


$tquery = mysql_query("select * from add_tour where id='$tourid'");
$tres = mysql_fetch_array($tquery);
$amount = $tres['touramount'];
$from = $tres['tourdate'];
$to = $tres['returndate'];
$name = $tres['tourname']

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
						<li><a href="user_register.php" class="current">User Register</a></li>
					
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
</form>
<form name="form2" action="" method="post">
<?php
extract($_POST);
if(isset($submit))
{
?>
<table width="500" border="1">
  <tr>
    <td align="center">&nbsp;</td>
    <td colspan="4" align="center">Enter the Name of the Persons </td>
  </tr>
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
?>
</form>
	
	<?php
	extract($_POST);
	if(isset($insert))
	{
	$i=0;
	foreach($fname as $name)
	{
	$age[$i];
	$query1 = mysql_query("select max(id) as maxid from book_tour");
	$res1 = mysql_fetch_array($query1);
	$id1 = $res1['maxid'] + 1; 
		$query2 = mysql_query("select max(seatno) as maxid from book_tour");
	$res2 = mysql_fetch_array($query2);
	$id2 = $res2['maxid'] + 1; 
	
	$ins = mysql_query("insert into book_tour(id, username, tour_id, person, age, seatno, amount, day, month, year, status, rdate) Values('$id1', '$uname','$tourid','$name','$id2','$amount','$day','$month','$year',0,'$rdate')");
	$i++;
	}
	if($ins)
	{
	echo "Ticket has been Booked...";
	}
	?>
<?php
$ticquery = mysql_query("select * book_tour where username='$uname'");
$num = mysql_num_rows($ticquery);

?>
	<p><h3>Ticket Details</h3>
	<table width="500" border="1">
  <tr>
    <td colspan="2" align="center">Tour Name </td>
    <td colspan="2" align="center"><?php echo $name;?></td>
    </tr>
  <tr>
    <td align="center">From</td>
    <td align="center"><?php echo $from;?></td>
    <td align="center">To</td>
    <td align="center"><?php echo $to;?></td>
  </tr>
  <tr>
    <td align="center">Total Seats </td>
    <td align="center"><?php echo $num; ?></td>
    <td align="center">Amount per seat </td>
    <td align="center"><?php echo $amount;?></td>
  </tr>
</table>

	<p>&nbsp;</p>
	<table width="500" border="1">
  <tr>
    <td align="center">S.No</td>
    <td align="center">Name</td>
    <td align="center">Age</td>
    <td align="center">Seat No </td>
  </tr>
  <?php
  $i=0; 
  $nuquery = mysql_query("select * from book tour where username='$uname'");
  while($nures = mysql_fetch_array($nuquery))
  {
  $i++;
  ?>
  <tr>
    <td align="center"><?php echo $i; ?></td>
    <td align="center"><?php echo $nures['person'];?></td>
    <td align="center">&nbsp;</td>
    <td align="center"><?php $nu = $nures['seatno'];
	if($nu%2==0)
	{
	echo $nu."W";
	}
	else{
	echo $nu;
	}
	
	?></td>
  </tr>
  <?php
  } ?>
</table>

	
	
	
	<?php
	
	
	}
	?>
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