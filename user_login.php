<?php 
include("dbconnect.php");
extract($_POST);
session_start();
$msg1=$_GET['msg'];
if($msg1=="logout")
{
$suc="You have successfully logout...";
}
else{
$suc="";
}
if(isset($_POST['submit']))
{

$query = mysql_query("Select * from user where username='$uname' and password = '$pass'");
$res = mysql_fetch_array($query);
$uname1=$res['username'];

if($uname==$uname1)
{
$_SESSION['user'] = $uname1;
		header("location:userhome.php?id='".$_REQUEST['id']."'");
		}
		else
		{
		$msg="Invalid Username or Password...";
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
padding:15px;
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
							<li><a href="index.php" >about</a></li>
						
					
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
			<h2>User Login </h2>
			<div align="center"><form name="form1" method="post" action="">
			<div id="admin" style="height:300px; margin-top:100px;">
			<table width="336" border="1">
	<tr><td colspan="2" align="center" style="color:#FF0000;"><?php echo $msg; ?> <?php echo $suc; ?></td>
	</tr>
	<tr><td width="121" id="tab" style="padding:15px;">User name</td>
	<td width="199" id="tab" style="padding:15px;"><input type="text" name="uname"></td>
	</tr>
	<tr>
	<td id="tab" style="padding:15px;">Password</td><td id="tab" style="padding:15px;"><input type="password" name="pass"></td>
	</tr>
  <tr>
    <td align="center" colspan="2"><input type="submit" name="submit" value="Login"></td>
    </tr>
</table>
</div>
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