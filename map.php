

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Oculus Technologies</title>
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px;
		color:black;
      }
	  
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script>
var markers = [];

var image = new google.maps.MarkerImage(
    'log.png',
    new google.maps.Size(50,50),
    new google.maps.Point(0,0),
    new google.maps.Point(42,56)
  );


function initialize() {
  var myLatlng = new google.maps.LatLng(11.9300, 79.8300);
  var mapOptions = {
    zoom:10,
    center: myLatlng
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var contentString = '<div id="content">'+
      "IDRD<br>"+
	  "Periyasamy Towers"
      '</div>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
     raiseOnDrag: false,
	  icon: image,
      map: map,
      draggable: false,
	
	 title:'Oculus Technologies'
  });
  
  
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });

}


google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>

