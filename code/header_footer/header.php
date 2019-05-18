<?php
ob_start();
if(!isset($_SESSION['username'])!="") {
    session_start();
}
//session_start();
date_default_timezone_set('Europe/Athens');
setlocale(LC_TIME, 'el_GR.UTF-8');	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Senior Care</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Senior Care Application ">

<!-- JQUERY -->	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link rel="manifest" href="/manifest.json">
	<!-- BOOTSTRAP 4.1.3 -->
<!--
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
-->
<!-- BOOTSTRAP 3.3.6 -->

	<!-- <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
	<script src="../css/bootstrap.min.js"></script>

<!-- DATATABLES BOOTSTRAP 
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
-->	
 	
	
<!-- DATATABLES -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>		

<!-- BOOTSTRAP SLIDER (for the side filters) -->
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.2.0/bootstrap-slider.min.js"></script>	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.2.0/css/bootstrap-slider.min.css" type="text/css">

	
<link rel="stylesheet" type="text/css" href="../css/rh6.css">
<link rel="stylesheet" type="text/css" href="../css/rh.css">

<!-- ===================== FAVICON =============================== -->
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/images/favicon/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/images/favicon/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/images/favicon/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/images/favicon/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="/images/favicon/apple-touch-icon-60x60.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="/images/favicon/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="/images/favicon/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="/images/favicon/apple-touch-icon-152x152.png" />
<link rel="icon" type="image/png" href="/images/favicon/favicon-196x196.png" sizes="196x196" />
<link rel="icon" type="image/png" href="/images/favicon/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/png" href="/images/favicon/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="/images/favicon/favicon-16x16.png" sizes="16x16" />
<link rel="icon" type="image/png" href="/images/favicon/favicon-128.png" sizes="128x128" />
<meta name="application-name" content="The Studio Pilates Fitness "/>
<meta name="msapplication-TileColor" content="#464B51" />
<meta name="msapplication-TileImage" content="/images/favicon/mstile-144x144.png" />
<meta name="msapplication-square70x70logo" content="/images/favicon/mstile-70x70.png" />
<meta name="msapplication-square150x150logo" content="/images/favicon/mstile-150x150.png" />
<meta name="msapplication-wide310x150logo" content="/images/favicon/mstile-310x150.png" />
<meta name="msapplication-square310x310logo" content="/images/favicon/mstile-310x310.png" />
<!-- ===================== FAVICON END =============================== -->
   <!-- Add to home screen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="SDY60-GE5">
    <link rel="apple-touch-icon" href="images/favicon/apple-touch-icon-152x152.png">
    <!-- Windows -->
    <meta name="msapplication-TileImage" content="/images/favicon/apple-touch-icon-114x114.png">
    <meta name="msapplication-TileColor" content="#2F3BA2">
	
	<meta charset="utf-8">
    <meta name="description" content="SDY60-GE5 PWA">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1, maximum-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
	<link rel="icon" type="image/png" href="images/favicon/apple-touch-icon-114x114.png">



<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

<!-- 
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.1/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.1/cookieconsent.min.js"></script>
-->
<?php	//Bootstrap 3 Datepicker v4 https://eonasdan.github.io/bootstrap-datetimepicker/ 
		// https://www.jqueryscript.net/time-clock/Clean-Data-Timepicker-with-jQuery-Bootstrap-3.html ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="../bootstrap-datetimepicker-master/bootstrap-datetimepicker.css">
<script src="/bootstrap-datetimepicker-master/bootstrap-datetimepicker.min.js"></script>
<script src="/bootstrap-datetimepicker-master/el.js"></script>



<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
h1,button {font-family: "Montserrat", sans-serif}
</style>
</head>

<!-- Navbar -->

<body>

<nav class="navbar navbar-default navbar-fixed-top">

  <div class="container-fluid rh6-shadow" >
    <div class="navbar-header" >
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/"><logo><riff>Senior</riff> <hunter>Care</hunter></logo></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/"><span class="glyphicon glyphicon-home"></span></a></li>
		<?php 	if(isset($_SESSION['username'])) { ?>
		<li><a href="/social_services">Κοινωνικές Υπηρεσίες</a></li>
		<li><a href="/reminders">Υπενθυμίσεις</a></li>
		<li><a href="/weather_f">Πρόγνωση Καιρού</a></li>
		<li><a href="/pharmacies">Φαρμακεία</a></li>
		<?php } ?>
      </ul>

      <ul class="nav navbar-nav navbar-right">
			<?php 	if(isset($_SESSION['username'])) { ?>
						<li class="dropdown">
						<a id="user" class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['username'];?> <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="/profile/profile.php"><span class="glyphicon glyphicon-pencil"></span> Προφίλ</a></li>
							<li><a href="/login/logout.php"><span class="glyphicon glyphicon-log-out"></span> Έξοδος</a></li>
						</ul>
						</li>
			<?php } else {?>		
			
				<li><a href="/login/index.php?register=true"><span class="glyphicon glyphicon-user"></span> Εγγραφή</a></li>
				<li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Είσοδος</a></li>
			<?php } ?>	
      </ul>
    </div>
  </div>
</nav>


<div class="modal fade" id="show_reminder_modal" role="dialog">
    <div class="modal-dialog" role="document">
	<div class="modal-content">

        <div class="modal-body  bg-primary">
		<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
		
<form class='form-horizontal' style='padding: 0% 5% 1% 5%' method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
<?php
	
	echo('<h3>Προβολή Υπενθύμισης</h3>');	

?>
	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" ></span>
			<input type="text" name="title" id="title" tabindex="1" class="form-control input-lg" placeholder="Τίτλος" value=""  disabled>
		</div>	
	</div>

	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" ></span>
			<input type="text" name="message" id="message" tabindex="1" class="form-control input-lg" placeholder="Μήνυμα" value=""  disabled>
		</div>	
	</div>	
<!--
	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" ></span>
			<input type="datetime-local" name="start_date" id="start_date" tabindex="1" class="form-control input-lg" placeholder="Ημερομηνία εμφάνισης" value="" required>
		</div>	
	</div>	

	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" ></span>
			<input type="text" name="repetition" id="repetition" tabindex="1" class="form-control input-lg" placeholder="Επανάληψη" value="">
		</div>	
	</div>	
-->
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
		<input type="hidden" name="id_reminder" id="id_reminder" value='' />		  
     
    </div>
  </div>
</form>		
		
        <!--the right place-->
        <div class="modal-footer">
		
		  <button id="delete_button" type="submit" name="delete_reminder" class="btn btn-danger btn-lg pull-left" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span> Διαγραφή</button> 
		  <button type="button" class="btn btn-default btn-lg" data-dismiss="modal"><span class="glyphicon glyphicon-off"></span> Ok</button>
        </div>
		</form>
		</div> <!--this is in the wrong place but its ok -->
     </div>
    </div>
</div>





<script>
if (<?php echo ((isset($_SESSION['id_user'])) && ($_SESSION['id_role']==1))?'true':'false'; ?>)
{
	setInterval(check_reminders, 40000);
}

function check_reminders()	
{
	var id_user = <?php if (isset($_SESSION['id_user'])) {echo $_SESSION['id_user'];} else {echo '-1';} ?>;
	$.ajax({
			url:"../check_reminders/check_reminders.php" , 
			type: "POST" ,
			data: {id_user},
			dataType: "json",
			success: function(rtrn) { 

						if (rtrn != 'Error') {
								
								$("#show_reminder_modal #title").val(rtrn.title);
								$("#show_reminder_modal #message").val(rtrn.message);
								$("#show_reminder_modal #start_date").val(rtrn.start_date);
								$("#show_reminder_modal #repetition").val(rtrn.repetition);
								
								$("#show_reminder_modal #id_reminder").val(id_reminder);
								
								$("#show_reminder_modal #delete_button").attr('onclick', 'del_reminder('+id_reminder+')');
								
								$("#show_reminder_modal").modal();
							}	
					}		
			});	
}


</script>
