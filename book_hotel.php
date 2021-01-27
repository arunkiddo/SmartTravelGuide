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
		<script language="javascript">
function rateWin(id)
{
window.open("rate_view.php?sid="+id,"Rating","width=400,height=500,menubar=0,toolbar=0,statusbar=0,scrollbars=1");
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
					<li><a href="Book_hotel.php" class="current">Book Hotel</a></li>
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
	<table width="500" border="1">
  <tr>
    <td width="2">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td width="82">Location</td>
    <td width="150"><input type="text" name="location"></td>
    <td width="67">Package</td>
    <td width="158"><select name="package">
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
						
						//mysql_query("insert into user_search(id,sess_id,keyword) values($id3,'$sess_id','$key')");
						
						
						$qry=mysql_query("select * from service_det where location='$location' && package='$package'");
						while($row=mysql_fetch_array($qry))
						{
						
					  ?>
                    <table width="551" height="114" border="0" cellpadding="5" cellspacing="0" class="hd3">
                      <tr>
                        <td width="159" rowspan="6" align="center"><img src="upload/<?php echo $row['fname']; ?>" width="150" height="150" /></td>
                        <td width="372"><span class="txt1"><?php echo $row['service']; ?></span></td>
                      </tr>
                      <tr>
                        <td><?php echo $row['location']; ?></td>
                      </tr>
                      <tr>
                        <td><?php echo $row['description']; ?></td>
                      </tr>
                      <tr>
                        <td><?php
						  for($j=1;$j<=5;$j++)
						  {
						  	$dd=$row['rating'];
								if($j<=$dd)
								{
								echo '<img src="images/star1.jpg">';
								}
								else
								{
								echo '<img src="images/star2.jpg">';
								}
						  }
						  ?></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="right">&nbsp;&nbsp;&nbsp; <a href="javascript:rateWin('<?php echo $row['id']; ?>')">Reviews</a>&nbsp;&nbsp;&nbsp; <a href="register_hotel.php?hid=<?php echo $row['id']; ?>">Booking</a> </td>
                      </tr>
                    </table>
                    <?php
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