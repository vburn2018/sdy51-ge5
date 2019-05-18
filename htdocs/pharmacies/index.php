<?php 
include '../header_footer/header.php';
?>

<link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
    <style>
      .map {
        height: 400px;
        width: 100%;
      }
    </style>
    <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
    <title>OpenLayers example</title>


    <h2>My Map</h2>
    <div id="map" class="map"></div>
<script>
/* =================== SETS ACTIVE CLASS ON NAV CHOICE ==================*/	
	$( "li:contains('Φαρμακεία')" ).ready(function(e) {
			$( "nav li.active" ).removeClass('active');
			$("li:contains('Φαρμακεία')").addClass('active');
			});
/* ======================================================================*/	
</script>	

    <script type="text/javascript">

	var x = document.getElementById("map");

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
  function showPosition(position) {
	//var lat = position.coords.latitude;
	//var lon = position.coords.longitude;
	var lat = 40.73096;
	var lon = 22.91945;
	
      var map = new ol.Map({
        target: 'map',
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          })
        ],
        view: new ol.View({
          center: ol.proj.fromLonLat([lon, lat]),
          zoom: 19
        })
      });
	}
    </script>
<?php 
include '../header_footer/footer.php';
?>
