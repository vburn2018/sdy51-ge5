<?php 
include '../header_footer/header.php';
?>
    <link rel="stylesheet" href="main.css">

    <div class="box">

        <h2 class="country items"></h2>
        <h2 class="temperature items"></h2>
        <h2 class="weather items"></h2>
        <div id="icon items"><img id="wicon" src="" alt="Weather icon" class="image"></div>
        <button class="button">Change Unit</button>
    </div>
<script>
/* =================== SETS ACTIVE CLASS ON NAV CHOICE ==================*/	
	$( "li:contains('Πρόγνωση Καιρού')" ).ready(function(e) {
			$( "nav li.active" ).removeClass('active');
			$("li:contains('Πρόγνωση Καιρού')").addClass('active');
			});
/* ======================================================================*/	
</script>	
<script src="geolocation.js"></script>
<script src="weather.js"></script>
<script src="ui.js"></script>
<script src="main.js"></script>