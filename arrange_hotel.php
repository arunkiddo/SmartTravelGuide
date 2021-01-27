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
mysql_query("delete from service_det where id='$id'");
header("location:arrange_hotel.php");

}

if(isset($btn))
{
$max_qry = mysql_query("select max(id) maxid from service_det");
	$max_row = mysql_fetch_array($max_qry);
	$id=$max_row['maxid']+1;
	$fname="P".$id.$_FILES['file']['name'];
	$url="http://".$url_link;
$ins=mysql_query("insert into service_det(id,category,service,package,location,url_link,description,cost1,cost2,fname) values($id,'$category','$service','$package','$location','$url','$description','$cost1','$cost2','$fname')");
	if($ins)
	{
	move_uploaded_file($_FILES['file']['tmp_name'],"upload/".$fname);
	?>
	<script language="javascript">
	alert("Added Successfully");
	window.location.href="arrange_hotel.php";
	</script>
	<?php
	}
	else
	{
	
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
				<h2>Hotel Arranagement </h2>
				<div align="center"><form name="form1" action="" method="post" enctype="multipart/form-data">
				  <p>&nbsp;</p>
				  <table width="455" height="198" border="0" cellpadding="5" cellspacing="0">
                    <tr>
                      <th width="141" scope="col">&nbsp;</th>
                      <th width="294" scope="col">&nbsp;</th>
                    </tr>
                    <tr>
                      <td>Category</td>
                      <td><select name="category">
                          <option>Restaurent</option>
                          <option>Hotel</option>
                        </select>                      </td>
                    </tr>
                    <tr>
                      <td>Hotel Name </td>
                      <td><input type="text" name="service" /></td>
                    </tr>
                    <tr>
                      <td>Package</td>
                      <td><select name="package">
                        <option value="">-Select-</option>
                        <option>Economic Package</option>
                        <option>Business Package</option>
                      </select></td>
                    </tr>
                    <tr>
                      <td>Location</td>
                      <td><input type="text" name="location" /></td>
                    </tr>
                    <tr>
                      <td>URL</td>
                      <td>http://
                        <input type="text" name="url_link" /></td>
                    </tr>
                    <tr>
                      <td>Description</td>
                      <td><textarea name="description"></textarea></td>
                    </tr>
                    <tr>
                      <td>Cost Range </td>
                      <td>Min
                        <input name="cost1" type="text" size="5" />
                        &nbsp;&nbsp;Max
                        <input name="cost2" type="text" size="5" /></td>
                    </tr>
                    <tr>
                      <td>Photo</td>
                      <td><input type="file" name="file" /></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><input type="submit" name="btn" value="Submit" onClick="return validate" /></td>
                    </tr>
                  </table>
				</form>
<h3>Hotel  Details</h3>
	
	<table width="" border="1" cellpadding="10">
  <tr>
    <td> id</td>
    <td>Category</td>
    <td>Name </td>
    <td>Location</td>
    <td>Amount</td>
    <td>Delete</td>
  </tr>
  <?php 
  $query = mysql_query("select * from service_det");
  while($res = mysql_fetch_array($query))
  {
  ?>
  <tr>
    <td><span class="style6">H<?php echo $res['id']; ?></span></td>
    <td><span class="style6"><?php echo $res['category']; ?></span></td>
    <td><span class="style6"><?php echo $res['service']; ?></span></td>
    <td><span class="style6"><?php echo $res['location']; ?></span></td>
    <td><span class="style6"><?php echo $res['cost1']; ?> - <?php echo $res['cost2']; ?></span></td>
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