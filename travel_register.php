<?php 

include("dbconnect.php");
extract($_POST);
$rdate=date("Y-m-d");
if(isset($_POST['submit']))
{


$query=mysql_query("Select max(tid) as maxid from travel");
$res=mysql_fetch_array($query);
$id=$res['maxid'] +1;
if($timing=="")
{
$timing = "-";
}
$query1=mysql_query("insert into travel(tid, tname, towner, taddress, tcontact, tbusno, amount, rdate) Values ('$id','$tname','$towner','$taddress','$tcontact','$tbusno','$amount','$rdate')");
if($query1)
{

		$msg="Added Successfully...";
	
		}
		else
		{
		$msg="Could not Registered";
		}

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
						<li><a href="book_tour.php" >about</a></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li><a href="location.php">Map</a></li>
					
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
				<h2>Travel Register </h2>
				<div align="center"><form name="form1" action="" method="post" enctype="multipart/form-data">
	<table width="566" border="1" >
	<tr><td colspan="2" align="center" style="color:#FF0000;"><?php echo $msg; ?> </td></tr>
  <tr>
    <td width="175" id="tabdata"> Travel Name:</td>
    <td width="375" id="tabdata"><input type="text" name="tname" size="30"></td>
  </tr>
  <tr>
    <td id="tabdata">Name of the Owner  </td>
    <td id="tabdata"><input type="text" name="towner" size="30"></td>
  </tr>
  <tr>
    <td id="tabdata">Addess</td>
    <td id="tabdata"><textarea name="taddress" rows="8" cols="50"></textarea></td>
  </tr>
  <tr>
    <td id="tabdata">Contact Number </td>
    <td id="tabdata"><input type="text" name="tcontact" size="30"></td>
  </tr>
  <tr>
    <td id="tabdata">Bus Number </td>
    <td id="tabdata"><input type="text" name="tbusno" size="30"></td>
  </tr>
  <tr>
    <td id="tabdata">Amount (per Km)</td>
    <td id="tabdata"><input type="text" name="amount" size="30"></td>
  </tr>
  <tr>
    <td colspan="2" align="center" id="tabdata"><input type="submit" name="submit" value="Insert"></td>
    </tr>
</table>
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