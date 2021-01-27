<?php 
session_start();
include("dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['user'];
$cdate=date("d-m-Y");
if(isset($btn))
{
$mqry=mysql_query("select max(id) as maxid from hotel_booking");
$mrow=mysql_fetch_array($mqry);
$id = $mrow['maxid']+1;

$str=str_pad($id,3,"0",STR_PAD_LEFT);
$book_id="1".$str;	

$ind = (strtotime($in_date)-strtotime($cdate))/(60*60*24);
$outd = (strtotime($out_date)-strtotime($cdate))/(60*60*24);
if($ind>=0 && $outd>=0)
	{
			switch($room_type)
			{
			case "Non-AC Small": $rate="500"; break;
			case "Non-AC Medium": $rate="1000"; break;
			case "Non-AC Large": $rate="1500"; break;
			case "AC Small": $rate="1000"; break;
			case "AC Medium": $rate="2000"; break;
			case "AC Large": $rate="3000"; break;
			}
					$no_days = (strtotime($out_date)-strtotime($in_date))/(60*60*24);
					$rate1=0;
					$rooms1=0;
					$rate1=$rate;
					$rooms1=$rooms;
					$no_days=$no_days+1;
					$tot_amt=$no_days*$rate1*$rooms1;


		
$qry = mysql_query("insert into hotel_booking(id,book_id,hid,uname,in_date,out_date,no_days,rooms,persons,room_type,rate,enquiry,tot_amt,bank,acct,rdate,status) values($id,'$book_id','$hid','$uname','$in_date','$out_date','$no_days','$rooms','$persons','$room_type','$rate','$enquiry','$tot_amt','$bank','$acct','$cdate','0')");

								if($qry)
								{
								?>
								<script language="javascript">
								alert("Registered Successfully");
								window.location.href="hotel_details.php?bid=<?php echo $id; ?>";
								</script>
								<?php
								}
	}
	else
	{
	$msg="Invalid Date";
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
					<li><a href="Book_tour.php" class="current">Book Tour</a></li>
						<li><a href="booked_details.php" >View Ticket Details</a></li>
						<li></li>
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
  <p>&nbsp;</p>
			   <table width="590" height="210" border="0" cellpadding="10" cellspacing="0" class="border">
                 <tr>
                   <td colspan="3" align="center"><span class="txt1">Hotel Room Booking </span></td>
                 </tr>
                 <tr>
                   <td colspan="3" align="center"><span class="style2">
                     <?php
                                       if($msg!="")
									   {
									    echo $msg;
										}
                                       ?>
                   </span></td>
                 </tr>
                 <tr>
                   <td align="left">Check in Date </td>
                   <td align="left"><input name="in_date" type="text" id="in_date" />
                       <input type="hidden" name="dd" value="" /></td>
                   <td align="left">(dd-mm-yyyy)</td>
                 </tr>
                 <tr>
                   <td width="139" align="left">Check out Date </td>
                   <td width="132" align="left"><input name="out_date" type="text" id="out_date" /></td>
                   <td width="132" align="left">(dd-mm-yyyy)</td>
                 </tr>
                 <tr>
                   <td align="left">No. of Rooms</td>
                   <td align="left"><input name="rooms" type="text" id="rooms" /></td>
                   <td align="left">&nbsp;</td>
                 </tr>
                 <tr>
                   <td align="left">No. of Persons </td>
                   <td align="left"><input name="persons" type="text" id="persons" /></td>
                   <td align="left">&nbsp;</td>
                 </tr>
                 <tr>
                   <td align="left">Budget (Cost of Room Per Day) </td>
                   <td align="left"><select name="room_type">
                       <option value="Non-AC Small">Non-AC Small-Rs.500</option>
                       <option value="Non-AC Medium">Non-AC Medium-Rs.1000</option>
                       <option value="Non-AC Large">Non-AC Large-Rs.1500</option>
                       <option value="AC Small">AC Small-Rs.1000</option>
                       <option value="AC Medium">AC Medium-Rs.2000</option>
                       <option value="AC Large">AC Large-Rs.3000</option>
                     </select>
                   </td>
                   <td align="left">&nbsp;</td>
                 </tr>
                 <tr>
                   <td align="left">Bank</td>
                   <td colspan="2" align="left"><select name="bank">
                       <option>-Select-</option>
                       <option>Allahabad Bank</option>
                       <option>Andhra Bank</option>
                       <option>Bank of Baroda</option>
                       <option>Bank of India</option>
                       <option>Bank of Maharashtra</option>
                       <option>Canara Bank</option>
                       <option>Central Bank of India</option>
                       <option>Corporation Bank</option>
                       <option>Dena Bank</option>
                       <option>Indian Bank</option>
                       <option>Indian Overseas Bank</option>
                       <option>Oriental Bank of Commerce</option>
                       <option>Punjab National Bank</option>
                       <option>Punjab &amp; Sind Bank </option>
                       <option>Syndicate Bank</option>
                       <option>UCO Bank</option>
                       <option>Union Bank of India</option>
                       <option>United Bank of India</option>
                       <option>Vijaya Bank</option>
                   </select></td>
                 </tr>
                 <tr>
                   <td align="left">Account No. </td>
                   <td colspan="2" align="left"><input type="text" name="acct" /></td>
                 </tr>
                 <tr>
                   <td align="left">Enquiry</td>
                   <td colspan="2" align="left"><label>
                     <textarea name="enquiry" cols="40" rows="5" id="enquiry"></textarea>
                   </label></td>
                 </tr>
                 <tr>
                   <td colspan="3" align="center"><label>
                     <input type="submit" name="btn" value="Register" onClick="return validate()" />
                   </label></td>
                 </tr>
               </table>
			   <p>&nbsp;</p>
			   <p>&nbsp;</p>
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