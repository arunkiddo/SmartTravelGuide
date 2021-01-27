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

$act = $_REQUEST['act'];
if($act=="del")
{
$id =$_REQUEST['id'];
mysql_query("delete from add_tour where id='$id'");
header("location:arrange_tour.php");

}

if(isset($submit))
{

$fname = $_FILES['tourimage']['name'];	
$temp = $_FILES['tourimage']['tmp_name'];

$query=mysql_query("Select max(id) as maxid from add_tour");
$res=mysql_fetch_array($query);
$id=$res['maxid'] +1;

$query1=mysql_query("insert into add_tour(id, source, dest, package, tourbus, touramount, tourimage,tra_time, rdate) Values ('$id','$source','$dest','$package','$tourbus','$touramount','$fname','$tra_time','$rdate')");
if($query1)
       {
@move_uploaded_file($temp,"Arrange/".$fname);

/*		$q2=mysql_query("select * from user");
		while($r2=mysql_fetch_array($q2))
		{
		$mobile=$r2['contact'];
		$email=$r2['username'];
$message="Tour arranged in $tourname, $tourdate-$returndate,Bus: $tourbus, Amount: $touramount";

$objEmail	=	new CI_Email();
					$objEmail->from('tour@gmail.com', "Tour");
					$objEmail->to("$email");
					$objEmail->subject("Tour Arrangement");
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
			}
		
*/
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
.style6 {color: #000000; font-size: 14px; }
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
						<li><a href="arrange_tour.php" class="current">Arrange Bus</a></li>
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
				<h2>Bus Arranagement </h2>
				<div align="center"><form name="form1" action="" method="post" enctype="multipart/form-data">
	<table width="566" border="1" >
	<tr><td colspan="2" align="center" style="color:#FF0000;"><?php echo $msg; ?> </td></tr>
  <tr>
    <td width="175" id="tabdata"> Source </td>
    <td width="375" id="tabdata"><input type="text" name="source" size="30"></td>
  </tr>
  <tr>
    <td id="tabdata">Destination</td>
    <td id="tabdata"><input type="text" name="dest"></td>
  </tr>
  <tr>
    <td id="tabdata"><p>Package</p>
      <p>&nbsp;</p></td>
    <td id="tabdata"><select name="package">
	<option value="">-Select-</option>
	<option>Economic Package</option>
	<option>Business Package</option>
    </select>    </td>
  </tr>
  <tr>
    <td id="tabdata"> Bus </td>
    <td id="tabdata"><input type="text" name="tourbus" size="30" value="<?php echo $dob;?>"></td>
  </tr>
  <tr>
    <td id="tabdata">Amount </td>
    <td id="tabdata"><input type="text" name="touramount" size="30"></td>
  </tr>
  <tr>
    <td id="tabdata"> Image </td>
    <td id="tabdata"><input type="file" name="tourimage"></td>
  </tr>
  <tr>
    <td id="tabdata"> Time</td>
    <td id="tabdata"><input type="text" name="tra_time"></td>
  </tr>
  <tr>
    <td colspan="2" align="center" id="tabdata"><p>
      <input type="submit" name="submit" value="Insert">
    </td>
    </tr>
</table>
</form>
<h3>Tour Details</h3>
	
	<table width="" border="1" cellpadding="10">
  <tr>
    <td> id</td>
    <td>Source</td>
    <td>Destination</td>
    <td>Time</td>
    <td>Bus</td>
    <td>Amount</td>
    <td>Date</td>
	<td>Delete</td>
  </tr>
  <?php 
  $query = mysql_query("select * from add_tour");
  while($res = mysql_fetch_array($query))
  {
  ?>
  <tr>
    <td><span class="style6">T<?php echo $res['id']; ?></span></td>
    <td><span class="style6"><?php echo $res['source']; ?></span></td>
    <td><span class="style6"><?php echo $res['dest']; ?></span></td>
    <td><span class="style6"><?php echo $res['tra_time']; ?></span></td>
    <td><span class="style6"><?php echo $res['tourbus']; ?></span></td>
    <td><span class="style6"><?php echo $res['touramount']; ?></span></td>
    <td><span class="style6"><?php echo $res['rdate']; ?></span></td>
	    <td><span class="style6"><a href="arrange_tour.php?id=<?php echo $res['id']; ?>&act=del">Delete</a></span></td>
  </tr>
  <?php
  }
  ?>
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