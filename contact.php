<?php 
include("dbconnect.php");
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
<style type="text/css">
address{
color:#CC6633;
}

.headingg{
clear:both;
font-family: 'Lobster', cursive; font-size:24px; color:#A8160F;
text-decoration:underline;
margin-top:20px;
}
.contact{
height:170px; width:200px; margin:20px;
float:left;

}
.con_head{
text-decoration:underline;
padding:10px;font-family: 'Lobster', cursive; font-size:16px; font-weight:800; color:#3C003C;

}
@font-face {
  font-family: 'Lobster';
  font-style: normal;
  font-weight: 400;
  src: local('Lobster'), local('Lobster-Regular'), url(http://fonts.gstatic.com/s/lobster/v11/c28rH3kclCLEuIsGhOg7evY6323mHUZFJMgTvxaG2iE.woff2) format('woff2');
  unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* latin-ext */
@font-face {
  font-family: 'Lobster';
  font-style: normal;
  font-weight: 400;
  src: local('Lobster'), local('Lobster-Regular'), url(http://fonts.gstatic.com/s/lobster/v11/9NqNYV_LP7zlAF8jHr7f1vY6323mHUZFJMgTvxaG2iE.woff2) format('woff2');
  unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Lobster';
  font-style: normal;
  font-weight: 400;
  src: local('Lobster'), local('Lobster-Regular'), url(http://fonts.gstatic.com/s/lobster/v11/hhO8-q4hv9jbU4UQyl-u4vY6323mHUZFJMgTvxaG2iE.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}


.style1 {color: #CC3300}
</style>
</head>

<body>
	<header>
		<nav>
			<div class="container">
				<div class="wrapper">
					<h1><a href="index.html"><strong>Trichy</strong></a></h1>
					<ul>
						<li><a href="index.php">about</a></li>
						<li><a href="history.php">History</a></li>
						<li><a href="Location.php">Location</a></li>
						<li><a href="tourist.php">Tourist Spot</a></li>
							<li><a href="contact.php"  class="current">Contacts</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<section class="adv-content">
			<div class="container">
				<ul class="breadcrumbs">
					<li>Important Contact Details</li>
				</ul>
				<form action="" id="search-form">
					<fieldset>
						<input type="text" value=""><input type="submit" value="">
					</fieldset>
				</form>
			</div>
		</section><div class="ic"></div>
	</header>
	<section id="content">
		<div class="top">
			<div class="containerr" style="width: 978px; margin: 0 auto; font-family:0.75em">
				<h2>Important Contact Details in Pondicherry</h2>
			  <div align="center">
<div class="headingg" align="center"><h1>Hospital Contacts </h1></div>
<?php $query=mysql_query("select * from contact where type='Hospital'");
while($res=mysql_fetch_array($query))
{
?>
<div class="contact" >
<div class="con_head"align="center"><?php echo $res['name']?></div>
<address >
<?php echo $res['hos_address']?>
</address>
<address >
Contact: <?php echo $res['hos_contact']?>
</address>
<address >
Web site: <?php echo $res['hos_website']?>
</address>
</div>
<?php } ?>

<div class="headingg" align="center"><h1>Hotel Contacts </h1></div>
<?php $query=mysql_query("select * from contact where type='Hotel'");
while($res=mysql_fetch_array($query))
{
?>

<div class="contact" >
<div class="con_head"align="center"><?php echo $res['name']?></div>
<address >
<?php echo $res['hos_address']?>
</address>
<address >
Contact: <?php echo $res['hos_contact']?>
</address>
<address >
Web site: <?php echo $res['hos_website']?>
</address>
</div>
<?php } ?>

<div class="headingg" align="center"><h1>Education Institute Contacts </h1></div>
<?php $query=mysql_query("select * from contact where type='Education'");
while($res=mysql_fetch_array($query))
{
?>
<div class="contact" >
<div class="con_head"align="center"><?php echo $res['name']?></div>
<address >
<?php echo $res['hos_address']?>
</address>
<address >
Contact: <?php echo $res['hos_contact']?>
</address>
<address >
Web site: <?php echo $res['hos_website']?>
</address>
</div>
<?php } ?>

<div class="headingg" align="center"><h1>Police Station Contacts </h1></div>
<?php $query=mysql_query("select * from contact where type='Police'");
while($res=mysql_fetch_array($query))
{
?>
<div class="contact" >
<div class="con_head"align="center"><?php echo $res['name']?></div>
<address >
<?php echo $res['hos_address']?>
</address>
<address >
Contact: <?php echo $res['hos_contact']?>
</address>
<address >
Web site: <?php echo $res['hos_website']?>
</address>
</div>
<?php } ?>

</div>

<div class="headingg" align="center"><h1>Fire Service Station Contacts </h1></div>
<?php $query=mysql_query("select * from contact where type='Fire'");
while($res=mysql_fetch_array($query))
{
?>
<div class="contact" >
<div class="con_head"align="center"><?php echo $res['name']?></div>
<address >
<?php echo $res['hos_address']?>
</address>
<address >
Contact: <?php echo $res['hos_contact']?>
</address>
<address >
Web site: <?php echo $res['hos_website']?>
</address>
</div>
<?php } ?>

</div>

<div class="clear"></div>

</div>
			</div>
		</div>
	</section>
	<footer>
		<div class="container">
			<div class="wrapper">
				<div class="copy">Our city Trichy &copy; 2014</div>
				<address class="phone">
					We're glad to help you. Please email or call us. <strong>1-123-456-7890</strong>
				</address>
			</div>
		</div>
	</footer>
</body>
</html>