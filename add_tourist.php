<?php 

session_start();
$admin = $_SESSION['user'];

if($admin=="")
{
header("location:admin.php");
}
include("dbconnect.php");
extract($_POST);
$rdate=date("Y-m-d");
if(isset($_POST['submit']))
{
$file_name=$_FILES['file']['name'];

$query=mysql_query("Select max(id) as maxid from tourist");
$res=mysql_fetch_array($query);
$id=$res['maxid'] +1;
if($timing=="")
{
$timing = "-";
}
$query1=mysql_query("insert into tourist(id, name, timing, content, image, date) Values ('$id','$place','$time','$content','$file_name','$rdate')");
if($query1)
{
move_uploaded_file($_FILES['file']['tmp_name'],"tour/".$file_name);
		$msg="Added Successfully...";
		header("location:view_tour.php");
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
					<li><a href="view_details.php" >Users</a></li>
						<li><a href="add_tourist.php" class="current" >Add Tourist</a></li>
						<li><a href="view_tour.php" >View Tourist</a></li>
						<li><a href="arrange_tour.php" >Arrange Bus</a></li>
					<li><a href="view_bookedticket.php" >Booking Details</a></li>
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
				<h2>Add tourist Place </h2>
				<div align="center"><form name="form1" action="" method="post" enctype="multipart/form-data">
	<table width="500" border="1" >
	<tr><td colspan="2" align="center" style="color:#FF0000;"><?php echo $msg; ?> </td></tr>
  <tr>
    <td id="tabdata">Place Name:</td>
    <td id="tabdata"><input type="text" name="place" size="30"></td>
  </tr>
  <tr>
    <td id="tabdata">Timings:</td>
    <td id="tabdata"><textarea name="time" rows="5" cols="40"></textarea> </td>
  </tr>
  <tr>
    <td id="tabdata">Descriptions:</td>
    <td id="tabdata"><textarea name="content" rows="8" cols="50"></textarea></td>
  </tr>
  <tr>
    <td id="tabdata">Image Upload:</td>
    <td id="tabdata"><input type="file" name="file"></td>
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