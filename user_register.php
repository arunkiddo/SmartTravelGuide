<?php 

include("dbconnect.php");
extract($_POST);
$rdate=date("Y-m-d");

$reg = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

if(isset($submit))
{
			

	  		if(empty($Name)|| empty($gender)|| empty($address) || empty($dob) || empty($email) || empty($pass) || empty($cpass) || empty($contact))
			{
			
			$msg="All fields required";
			
			}
		
	
		

		else if (!preg_match($reg, $email)) 
		{
		$msg = $email."  Invalid email address";
		}
				else if($pass!=$cpass)
		{
		$msg = "Both password are not equal...!";
		
		}
		else if (preg_match('/[^0-9]/', $contact))
		{
			

			$msg =  "Invalid phone number";

		}
		else if(strlen($contact)!=10)
		{
		$msg = "Contact Number Invalid";
		}


		 else {
	   

$query=mysql_query("Select max(id) as maxid from user");
$res=mysql_fetch_array($query);
$id=$res['maxid'] +1;

$query1=mysql_query("insert into user(id, Name, gender, dob, address, username, password, contact,account, rdate) Values ('$id','$Name','$gender','$dob','$address','$email','$cpass','$contact','$account','$rdate')");
if($query1)
       {

		//$msg="Registered Successfully...";
		header("location:user_login.php");
		}
		else
		{
		$msg="Could not Registered";
		}

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
<!-- Date Picker -->
<script src="Date-Picker/datepicker.js" type="text/javascript"></script>
<script src="Date-Picker/newDatePicker.js" type="text/javascript"></script>
<link href="Date-Picker/datepicker.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function RegistrationInitLoad()
 {
    initDatePicker('dob');
 }
 </script>
</head>

<body onLoad="RegistrationInitLoad()">
	<header>
		<nav>
			<div class="container">
				<div class="wrapper">
					<h1><a href="index.php"><strong>SOFTWARE FOR JOURNEY PLANNER</strong></a></h1>
					<ul>
								<li><a href="index.php" >about</a></li>
						
						<li></li>
					
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
				<h2>New User Register </h2>
				<div align="center"><form name="form1" action="" method="post" enctype="multipart/form-data">
	<table width="566" border="1" >
	<tr><td colspan="2" align="center" style="color:#FF0000;"><?php echo $msg; ?> </td></tr>
  <tr>
    <td width="175" id="tabdata"> Name:</td>
    <td width="375" id="tabdata"><input type="text" name="Name" value="<?php echo $Name;?>" size="30"></td>
  </tr>
  <tr>
    <td id="tabdata">Gender  </td>
    <td id="tabdata"><input type="radio" name="gender" value="Male">Male&nbsp;&nbsp;<input type="radio" name="gender" value="Female">Female</td>
  </tr>
  <tr>
    <td id="tabdata">D-O-B </td>
    <td id="tabdata"><input type="text" name="dob" id="dob" size="30" value="<?php echo $dob;?>"></td>
  </tr>
  <tr>
    <td id="tabdata">Address</td>
    <td id="tabdata"><textarea name="address" rows="5" cols="30"><?php echo $address; ?></textarea></td>
  </tr>
  <tr>
    <td id="tabdata">Account No. </td>
    <td id="tabdata"><input type="text" name="account" value="<?php echo $account; ?>"></td>
  </tr>
  <tr>
    <td id="tabdata">Email</td>
    <td id="tabdata"><input type="text" name="email" value="<?php echo $email;?>" size="30"></td>
  </tr>
  <tr>
    <td id="tabdata">Password</td>
    <td id="tabdata"><input type="password" name="pass" size="30"></td>
  </tr>
  <tr>
    <td id="tabdata">Confirm Password </td>
    <td id="tabdata"><input type="password" name="cpass" size="30"></td>
  </tr>
  <tr>
    <td id="tabdata">Contact</td>
    <td id="tabdata"><input type="text" name="contact" value="<?php echo $contact;?>" size="30"></td>
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