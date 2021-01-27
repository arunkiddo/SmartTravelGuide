<?php 
session_start();
$user=$_SESSION['user'];

if($user!="admin")
{
header("location:admin.php");
}
include("dbconnect.php");

$act = $_GET['act'];

if($act=="del")
{
$id=$_GET['id'];

$query1=mysql_query("Delete from contact where id='$id'");


$msg="Successfully Deleted...";


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
th{
color:#990000;
font-size:14px;
padding:20px;
border-bottom:1px solid #000000;
margin-bottom:30px;

font-weight:800;
}
#tabdata{
padding:20px;
}
tr{
margin-bottom:30px;
}
td{
font-weight:500;
color:#000000;
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
						<li><a href="admin.php">Admin Home</a></li>
						<li><a href="add_tourist.php" >Add Tourist</a></li>
						<li><a href="view_tour.php">View Tourist</a></li>
						<li><a href="add_contact.php">Add contact</a></li>
						<li><a href="view_contact.php"  class="current">View contact</a></li>
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
				<h2>View tourist Place </h2>
				<div align="center">
	
	<table border="1" style="border-collapse:collapse;">
  <tr>
    <td colspan="4" align="center" style="color:#FF0000"><?php echo $msg; ?></td>
    </tr>
  <tr>
    <th width="69">S.No</th>
    <th width="171">Name</th>
	<th width="171">Address</th>
	<th width="171">Contact</th>
	<th width="171">Website</th>
        <th width="100">Action</th>
  </tr>
  <tr>
   <?php $query=mysql_query("select * from contact "); 
  $i=0;
  while($res= mysql_fetch_array($query))
  {
  $i++;
  ?>
  
  
    <td align="center"><?php echo $i; ?></td>
    <td align="center"><?php echo $res['type']; ?></td>
    <td align="center"><?php echo $res['name']; ?></td>
	<td align="center"><?php echo $res['hos_address']; ?></td>
	<td align="center"><?php echo $res['hos_website']; ?></td>
    <td align="center"><a href="view_contact.php?id=<?php echo $res['id']; ?>&act=del">Delete</a></td>
  </tr>
<tr id="border" style="border-bottom::3px solid #000000;"><td colspan="4"></td></tr>
  <?php } ?>
</table>
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