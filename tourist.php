<?php 
include("dbconnect.php");

$query=mysql_query("Select * from tourist");

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
</head>

<body>
	<header>
		<nav>
			<div class="container">
				<div class="wrapper">
					<h1><a href="index.php"><strong>SOFTWARE FOR JOURNEY PLANNER</strong></a><a href="index.html"></a></h1>
					<ul>
						<li><a href="book_tour.php" >about</a></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li><a href="location.php">Map</a></li>
					</ul>
			  </div>
			</div>
		</nav>
		<section class="adv-content">
			<div class="container">
				<ul class="breadcrumbs">
					<li>Trichy Tourist Spot</li>
				</ul>
				<form action="" id="search-form">
					<fieldset>
						<input type="text" value=""><input type="submit" value="">
					</fieldset>
				</form>
			</div>
		</section><div class="ic">More Website Templates at TemplateMonster.com!</div>
	</header>
	<section id="content">
		<div class="top">
			<div class="container">
				<h2>Tourist Spot in Pondicherry </h2>
				<?php while($res=mysql_fetch_array($query))
				{ 
				
			?>
				
				<div class="tourist" style="height:200px;;">
				<h3><?php echo $res['name']; ?></h3>
				
<p><span class="itali">Visitors Time: </span> <?php echo $res['timing']; ?></p>
<div id="temp" style="height:200; width:200; float:left; margin:0 30px 0 0;">
<p><img src="tour/<?php echo $res['image'];?>" style="height:150" width="150"></p></div><div id="detail" style="line-height:30px;"><?php echo $res['content']; ?></div>



			  </div>
				<div class="line" style="border-bottom:1px dashed #666666"></div>  
				<?php } ?>
				<div align="center">
	
</div>
				
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