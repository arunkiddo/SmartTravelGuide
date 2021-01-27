<?php 
session_start();
$user=$_SESSION['user'];

if($user!="admin")
{
header("location:admin.php");
}
include("dbconnect.php");
extract($_POST);

if(isset($_POST['submit']))
{
if($type1=="0")
{
$msg = "Please select the contact type";
}

$query=mysql_query("Select max(id) as maxid from contact");
$res=mysql_fetch_array($query);
$id=$res['maxid'] +1;
echo "insert into contact(id, type, name, hos_address, hos_contact, hos_website) Values ('$id','$type1','$name','$address','$contact','$website')";
$query1=mysql_query("insert into contact(id, type, name, hos_address, hos_contact, hos_website) Values ('$id','$type1','$name','$address','$contact','$website')");
if($query1)
{

		$msg="Added Successfully...";
		header("location:view_contact.php");
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
					<h1><a href="index.php"><strong>SOFTWARE FOR JOURNEY PLANNER </strong></a></h1>
					<ul>
					<li><a href="admin.php">Admin Home</a></li>
						<li><a href="add_tourist.php" >Add Tourist</a></li>
						<li><a href="view_tour.php">View Tourist</a></li>
						<li><a href="add_contact.php"  class="current">Add contact</a></li>
						<li><a href="view_contact.php">View contact</a></li>
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
			<h2>Add Contacts </h2>
			<div align="center"><form name="form1" method="post" action="">
			<table width="500" border="1" >
	<tr><td colspan="2" align="center" style="color:#FF0000;"><?php echo $msg; ?> </td>
	</tr>
  <tr>
    <td id="tabdata">Select contact type:</td>
    <td id="tabdata" ><select name="type1">
	<option value="0">--Select--</option>
	<option value="Hospital" <?php if($type1=="Hospital") echo "selected";?>>Hospital</option>
	<option value="Hotel" <?php if($type1=="Hotel") echo "selected";?>>Hotel</option>
	<option value="Education" <?php if($type1=="Education") echo "selected";?>>Education</option>
	<option value="Police" <?php if($type1=="Police") echo "selected";?>>Police</option>
	<option value="Fire" <?php if($type1=="Fire") echo "selected";?>>Fire Station</option>
	</select></td>
  </tr>

  <tr>
    <td id="tabdata">Name</td>
    <td id="tabdata"><input type="text" name="name"></td>
  </tr>
  <tr>

    <td id="tabdata">Address</td>
    <td id="tabdata"><textarea name="address" rows="5" cols="40"></textarea> </td>
  </tr>
  <tr>
    <td id="tabdata">Contact</td>
    <td id="tabdata"><input type="text" name="contact" size="30">
      </textarea></td>
  </tr>
  <tr>
    <td id="tabdata">Website</td>
    <td id="tabdata"><input type="text" name="website" size="30"></td>
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