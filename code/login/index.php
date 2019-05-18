<?php 

/*
if(isset($_SESSION['username'])!="") {
    header("Location: ./index.php");
}
*/

include __DIR__.'/../header_footer/header.php';
include __DIR__.'/../conf/conf.php';
// http://bootsnipp.com/snippets/featured/login-and-register-tabbed-form
?>

<style>
.panel-login {
	border-color: #ccc;
	-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
	color: #00415d;
	background-color: #fff;
	border-color: #fff;
	text-align:center;
}
.panel-login>.panel-heading a{
	text-decoration: none;
	color: #666;
	font-weight: bold;
	font-size: 15px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
	color: #029f5b;
	font-size: 18px;
}
.panel-login>.panel-heading hr{
	margin-top: 10px;
	margin-bottom: 0px;
	clear: both;
	border: 0;
	height: 1px;
	background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
	background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
	height: 45px;
	border: 1px solid #ddd;
	font-size: 16px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
	outline:none;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	border-color: #ccc;
}
.btn-login {
	background-color: #59B2E0;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #59B2E6;
}
.btn-login:hover,
.btn-login:focus {
	color: #fff;
	background-color: #53A3CD;
	border-color: #53A3CD;
}
.forgot-password {
	text-decoration: underline;
	color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
	text-decoration: underline;
	color: #666;
}

.btn-register {
	background-color: #1CB94E;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #1CB94A;
}
.btn-register:hover,
.btn-register:focus {
	color: #fff;
	background-color: #1CA347;
	border-color: #1CA347;
}

</style>
<?php // =================  LOGIN FORM  ========================================================== 
if (isset($_POST['register-submit'])) {
$_GET['register'] = 'true';}
?>

<?php
//check if form is submitted
include_once 'login_messages.php';
if (isset($_POST['login-submit'])) {

    //if form is submitted
	$username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '" . $username. "' and password = '" . $password . "'");

	//if username and passw found
    if ($row = mysqli_fetch_array($result)) {
			$_SESSION['id_user'] = $row['id_user'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['fname'] = $row['fname'];
			$_SESSION['lname'] = $row['lname'];
			$_SESSION['id_role'] = $row['id_role'];
			$_SESSION['acivated'] = $row['acivated'];
			header("Location: ../index.php");

    } else {
			$_SESSION['errormsg'] = $incorrect_usern_or_passw;

			unset($_SESSION['id_user']);
			unset($_SESSION['username']);
			unset($_SESSION['password']);
			unset($_SESSION['fname']);
			unset($_SESSION['lname']);
			unset($_SESSION['id_role']);	
			unset($_SESSION['acivated']);
			
			//session_destroy();
			//header('Location: '.$_SERVER['PHP_SELF']);			
    }
}
	
if (isset($_POST['register-submit'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
	$password2 = mysqli_real_escape_string($conn, $_POST['confirm-password']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$id_role = mysqli_real_escape_string($conn, $_POST['id_role']);
	
	
	$result_un = mysqli_query($conn, "SELECT * FROM user WHERE username = '".$username."'");
	if ($row = mysqli_fetch_array($result_un)) {
			$_SESSION['errormsg'] = $username_exists;
			unset($_SESSION['username']);
			unset($_SESSION['password']);
			unset($_SESSION['id_role']);	
			//header('Location: '.$_SERVER['PHP_SELF']);
		}
	else {
		$result_em = mysqli_query($conn, "SELECT * FROM user WHERE email = '".$email."'");
		if ($row = mysqli_fetch_array($result_em)) {
			$_SESSION['errormsg'] = $email_exists;
			unset($_SESSION['username']);
			unset($_SESSION['password']);
			unset($_SESSION['id_role']);		
			header('Location: '.$_SERVER['PHP_SELF']);
			}
		else {
			if ($password!=$password2) {
				$_SESSION['errormsg'] = $passw_dont_match;
				unset($_SESSION['username']);
				unset($_SESSION['password']);
				unset($_SESSION['id_role']);		
				header('Location: '.$_SERVER['PHP_SELF']);
				}
			
			else {
			if ($id_role==1) {$activated=1;} else {$activated=0;}
			$sql = 'INSERT INTO user (username,password,email, fname, lname,activated,id_role)
					VALUES ("'.$username.'",
							"'.$password.'",
							"'.$email.'",
							"'.$fname.'",
							"'.$lname.'",
							"'.$activated.'",
							'.$id_role.')';
			if ($conn->query($sql) === TRUE) {
				echo '<div class="alert alert-success">';
				echo 	'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
				echo 	'<strong>Success!</strong> You are registered.';
				echo '</div>';
				
				$_SESSION['id_user'] = $conn->insert_id; //get last id 
				$_SESSION['username'] = $username;
				$_SESSION['id_role'] = $role;
				$_SESSION['fname'] = $fname;
				$_SESSION['lname'] = $lname;

				
				header("Location: ../index.php");
				}
			else {
				exit("error");
				}
			}
		}
	}
}
?>	
<div class="container-fluid rh6-bg-blue-1" style="padding: 50px 10px 10px 10px;">
    	<div class="row" >
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Είσοδος</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Εγγραφή</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" role="form" style="display: block;">

									<div class="form-group">							
										<div class="input-group">
											<span class="input-group-addon" ><span class="glyphicon glyphicon-user" ></span></span>
											<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" autofocus="autofocus" required>
										</div>	
									</div>									
									
									
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
											<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
										</div>
									</div>
									<!--
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									-->
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="ΕΙΣΟΔΟΣ">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="recover.php" tabindex="5" class="forgot-password">Ξεχάσατε τον κωδικό σας;</a>
												</div>
											</div>
										</div>
									</div>
									<span class="text-danger"><?php if (isset($_SESSION['errormsg'])&&isset($_POST['login-submit'])) { echo $_SESSION['errormsg']; unset($_SESSION['errormsg']);} ?></span>
								</form>
								
								
<?php // =================  REGISTRATION FORM  =================================================== ?>								
								<form id="register-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" role="form" style="display: none;">
									
									<div class="form-group">							
										<div class="input-group">
											<span class="input-group-addon" ><span class="glyphicon glyphicon-user" ></span></span>
											<input type="text" name="fname" id="fname" tabindex="1" class="form-control" placeholder="Όνομα" value="" autofocus="autofocus" required>
										</div>	
									</div>
									<div class="form-group">							
										<div class="input-group">
											<span class="input-group-addon" ><span class="glyphicon glyphicon-user" ></span></span>
											<input type="text" name="lname" id="lname" tabindex="1" class="form-control" placeholder="Επώνυμο" value="" autofocus="autofocus" required>
										</div>	
									</div>																																																
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon" ><span class="glyphicon glyphicon-envelope" ></span></span>
											<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="" required>
										</div>
									</div>

	<?php // ============ ΡΟΛΟΙ =============
						$query = 'SELECT id_role, role_descr FROM role';	
						$role = $conn->query($query) or die('Error, role query failed'); 
	?>
	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" >Ρόλος</span>
			<select class="form-control" name="id_role" id="id_role" >
				<?php
					if ($role->num_rows > 0) {
						while($row = $role->fetch_assoc()) {
							echo '<option value="'.$row['id_role'].'" >'.$row['role_descr'].'</option>';	
						}
					} else {
						echo "Δεν έχουν καταχωρηθεί Ρόλοι";
					}
				?>		
			</select>
		</div>	
	</div>

																		
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon" ><span class="glyphicon glyphicon-log-in" ></span></span>
											<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required>
										</div>
									</div>

									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon" ><span class="glyphicon glyphicon-lock" ></span></span>
											<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon" ><span class="glyphicon glyphicon-repeat" ></span></span>
											<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Επανάληψη Password" required>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="ΕΓΓΡΑΦΗ">
											</div>
										</div>
									</div>
									<span class="text-danger"><?php if (isset($_SESSION['errormsg'])) { echo $_SESSION['errormsg']; unset($_SESSION['errormsg']);} ?></span>
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>



<script>
$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});

</script>

<script>
/* =================== SETS ACTIVE CLASS ON NAV CHOICE ==================*/	
	$( "li:contains('Add Lesson')" ).ready(function(e) {
			$( "nav li.active" ).removeClass('active');
			$("li:contains('Login')").addClass('active');
			});
/* ======================================================================*/				
</script>
<?php
if (isset($_GET['register'])) {?>
	<script>
		$(document).ready(function(){
			$('#register-form-link').click();
			$( "nav li.active" ).removeClass('active');
			$("li:contains('Sign Up')").addClass('active');
		});
	</script>
<?php } ?>