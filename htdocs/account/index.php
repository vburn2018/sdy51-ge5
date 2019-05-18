<?php 
include __DIR__.'/../header_footer/header.php';
include __DIR__.'/../conf/conf.php';

if(isset($_POST['submit'])){

	$password = $_POST['password'];
	$sql = 'UPDATE user SET password = "'.$password.'"				
			WHERE id_user = '.$_SESSION['id_user'].'';
	
	if ($conn->query($sql) === TRUE) {		
		$successmsg = '
			<div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Επιτυχία! Ο κωδικός σας άλλαξε!<br>Θυμηθείτε να χρησιμοποιήσετε το νέο σας κωδικό όταν ξανασυνδεθείτε.</strong>
			</div>
			';
		}
	else {
		exit("Database Connection Error!");
		}
	}
?>

<div class="container-fluid rh6-bg-blue-1" style="padding: 50px 0px 30px 0px;">
	<span><?php if (isset($successmsg)) { echo $successmsg; unset($successmsg);} ?></span>
	<div class="row" >
		
		<div class="col-md-6 rh6-bg-grey-1 col-md-offset-3 rh6-shadow" style="padding: 0px 0px 0px 0px;">
		
			<!-- =================== HEADER ============================== -->
			<div class="container-fluid bg-primary" >
				<h3>Στοιχεία λογαριασμού</h3>
			</div>
			<!-- =================== end HEADER ============================== -->
			
			<!-- =================== BODY ================================ -->
		<div class="container-fluid" style="padding: 16px 30px 16px 30px;">	
		
		<form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"  accept-charset="UTF-8" enctype="multipart/form-data">
			
			<div class="form-group has-success has-feedback">
				<label class="col-sm-2 control-label" for="inputSuccess"></label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputSuccess" placeholder="<?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?>" disabled >
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
			</div>
			
			<div class="form-group has-success has-feedback">
				<label class="col-sm-2 control-label" for="inputSuccess">Username</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?php echo $_SESSION['username']; ?>" disabled >
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
			</div>
			
			<div class="form-group has-success has-feedback">
				<label class="col-sm-2 control-label" for="inputSuccess">Νέο Password</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="password" name="password" required >
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
			</div>
			
			<div class="form-group has-success has-feedback">
				<label class="col-sm-2 control-label" for="inputSuccess">Επανάληψη</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
			</div>

			<button type="submit" name="submit" class="btn btn-success btn-lg pull-right">Καταχώρηση</button>
		</form>
		</div>
		<!-- =================== BODY ================================ -->

		</div> 	
	</div>
</div>


<?php 
// print phpinfo();  
include __DIR__.'/../header_footer/footer.php';
?>

<script>
/* =================== SETS ACTIVE CLASS ON NAV CHOICE ==================*/	
	$( "li:contains('Λογαριασμός')" ).ready(function(e) {
			$( "nav li.active" ).removeClass('active');
			$("li:contains('Λογαριασμός')").addClass('active');
			});
/* ======================================================================*/			
var password = document.getElementById("password");
var confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Οι κωδικοί πρέπει να είναι ίδιοι.");
  } else {
    confirm_password.setCustomValidity('');
  }
}
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;	
window.setTimeout(function() {$(".alert").fadeTo(500, 0).slideUp(500, function(){$(this).remove(); }); }, 8000);		

</script>