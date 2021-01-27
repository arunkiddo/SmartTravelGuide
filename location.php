<?php
  if(isset($_POST['btn']))
  {
  $address = $_POST['q'];
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
  <script src="http://maps.google.com/maps?file=api&amp;v=2.x&amp;key=ABQIAAAAzr2EBOXUKnm_jVnk0OJI7xSosDVG8KKPE1-m51RBrvYughuyMxQ-i1QfUnH94QxWIa6N4U6MouMmBA" 
            type="text/javascript"></script>
    <script type="text/javascript">

    var map;
    var geocoder;

    function initialize() {
      map = new GMap2(document.getElementById("map_canvas"));
      map.setCenter(new GLatLng(34, 0), 2);
      geocoder = new GClientGeocoder();
	  
    }

    // addAddressToMap() is called when the geocoder returns an
    // answer.  It adds a marker to the map with an open info window
    // showing the nicely formatted version of the address and the country code.
    function addAddressToMap(response) {
      map.clearOverlays();
      if (!response || response.Status.code != 200) {
        alert("Sorry, we were unable to geocode that address");
      } else {
        place = response.Placemark[0];
        point = new GLatLng(place.Point.coordinates[1],
                            place.Point.coordinates[0]);
        marker = new GMarker(point);
        map.addOverlay(marker);
        marker.openInfoWindowHtml(place.address + '<br>' +
          '<b>Country code:</b> ' + place.AddressDetails.Country.CountryNameCode);
      }
    }

    // showLocation() is called when you click on the Search button
    // in the form.  It geocodes the address entered into the form
    // and adds a marker to the map at that location.
    function showLocation(addr) {
      //var address = document.forms[0].q.value;
	  var address = addr;
      geocoder.getLocations(address, addAddressToMap);
    }

   // findLocation() is used to enter the sample addresses into the form.
    function findLocation(address) {
     // document.forms[0].q.value = address;
      showLocation();
    }
    </script>
</head>

<body>
	<header>
		<nav>
			<div class="container">
				<div class="wrapper">
					<h1><a href="index.php"><strong>SOFTWARE FOR JOURNEY PLANNER</strong></a><a href="index.html"></a></h1>
					<ul>
								<li><a href="index.php" >about</a></li>
						<li><a href="travel_register.php" >Travel Agency Register</a></li>
						<li><a href="user_register.php">User Register</a></li>
						<li><a href="user_login.php">Login</a></li>
						<li><a href="tourist.php">Tourist Spot</a></li>
						<li><a href="location.php" class="current">Map</a></li>
					</ul>
			  </div>
			</div>
		</nav>
		<section class="adv-content">
			<div class="container">
				<ul class="breadcrumbs">
					<li>Pondicherry Location</li>
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
				<h2>Location of Tourist Place </h2>
				<div align="center">
			  <body onload="initialize();showLocation('<?php echo $address; ?>');">
<center>
    <!-- Creates a simple input box where you can enter an address
         and a Search button that submits the form. //-->
    <form method="post" name="form1" action="">
      <p>
        <b>Search for an address:</b>
        <input type="text" name="q" value="<?php echo $address; ?>" class="address_input" size="40" />
        <input type="submit"  value="Search" name="btn"/>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="app_reg.php?uname=<?php echo $uname; ?>">Back to Home</a> </p>
    </form>
    <div id="map_canvas" style="width: 1000px; height: 800px"></div>
  </center>
					 <!-- <iframe src="http://localhost/Project/Dynamic_Auditing/Pondicherry/map.php" height="500px" width="700px" frameborder="1" marginheight="20" marginwidth="35" scrolling="auto"></iframe>   -->
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