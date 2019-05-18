<?php 
include '../header_footer/header.php';
?>
<div class="modal fade" id="newPsw" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">

        <div class="modal-body bg-primary">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
			<div>
				<h2>A mail with a new password was sent to you.</h2>
				<h5>Thank you for getting in touch. Talk to you soon, <br><br>RiffHunter.com<h5>
				
				
			</div>
        </div>
        <div class="modal-footer bg-primary">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
</div>

<?php
if(isset($_POST['recover-submit'])){
    $from = "riffhunter16@gmail.com"; // this is your Email address
    $to = $_POST['email']; // this is the sender's Email address

    $subject = "RiffHunter.com. New login password.";
    //$subject2 = "Copy of your form submission";
	
	$pwd = bin2hex(openssl_random_pseudo_bytes(4));
    $message = $pwd;

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    //mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
	
    ?> <script>$("#newPsw").modal();</script> <?php
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>
<div class="container-fluid rh6-bg-blue-1" style="padding: 90px 0px 30px 0px;">
	<div class="row" >
		
		<div class="col-md-6 rh6-bg-grey-1 col-md-offset-3 rh6-shadow" style="padding: 0px 0px 0px 0px;">
		
			<!-- =================== HEADER ============================== -->
			<div class="container-fluid bg-primary" style="padding: 0px 0px 0px 0px;">
				<h2 style="padding: 5px 0px 5px 20px;">Recover Account</h2>
			</div>
			<!-- =================== end HEADER ============================== -->
			
			<!-- =================== BODY ================================ -->
		<div class="container-fluid" style="padding: 16px 30px 16px 30px;">	
		
		<form id="register-form" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"  accept-charset="UTF-8" enctype="multipart/form-data">
			
			<div class="form-group">							
				<div class="input-group">
					<span class="input-group-addon" ><span class="glyphicon glyphicon-envelope" ></span></span>
					<input type="email" name="email" id="email" tabindex="1" class="form-control input-lg" placeholder="email" value="" autocomplete="off" required>
				</div>	
			</div>

			<button type="submit" name="recover-submit" id="recover-submit" class="btn btn-success btn-lg pull-right">Reset Password</button>
			
		</form>
		</div>
		<!-- =================== BODY ================================ -->
		
		</div> 	
	</div>
</div>
<?php 
include '../header_footer/footer.php';
?>

<?php
/*
if($_POST['action']=="password")
{
    $email      = mysqli_real_escape_string($connection,$_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
    {
        $message =  "Invalid email address please type a valid email!!";
    }
    else
    {
        $query = "SELECT id FROM users where email='".$email."'";
        $result = mysqli_query($connection,$query);
        $Results = mysqli_fetch_array($result);
 
        if(count($Results)>=1)
        {
            $encrypt = md5(1290*3+$Results['id']);
            $message = "Your password reset link send to your e-mail address.";
            $to=$email;
            $subject="Forget Password";
            $from = 'info@phpgang.com';
            $body='Hi, <br/> <br/>Your Membership ID is '.$Results['id'].' <br><br>Click here to reset your password http://demo.phpgang.com/login-signup-in-php/reset.php?encrypt='.$encrypt.'&action=reset   <br/> <br/>--<br>PHPGang.com<br>Solve your problems.';
            $headers = "From: " . strip_tags($from) . "\r\n";
            $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
 
            mail($to,$subject,$body,$headers);
        }
        else
        {
            $message = "Account not found please signup now!!";
        }
    }
}


*/



?>