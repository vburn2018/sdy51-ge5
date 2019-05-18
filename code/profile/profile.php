<?php 
include __DIR__.'/../header_footer/header.php';
include __DIR__.'/../conf/conf.php';
//include __DIR__.'/../profile/profile_modals.php';
?>

<style>
.btn span.fa-check {    			
	opacity: 0;				
}
.btn.active span.fa-check {				
	opacity: 1;				
}
</style>


<div class="modal fade" id="successModal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">

        <div class="modal-body bg-primary">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
			<div>
				<h2 id="successModal_h2">Επιτυχής καταχώρηση! </h2>
				<h5><span id="successModal_h3">Τα στοιχεία καταχωρήθηκαν </span><br><br>Senior Care</h5>
			</div>
        </div>
        <div class="modal-footer bg-primary">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
		  
        </div>
      </div>
      
    </div>
</div>



<div class="container-fluid" style="padding: 60px 0px 30px 0px;" id="add_user_form">	
<form class='form-horizontal col-md-6 rh6-bg-grey-1 col-md-offset-3 rh6-shadow' style='padding: 2% 5% 1% 5%' method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
<?php
	$query = 'SELECT * FROM user WHERE username="'.$_SESSION['username'].'"';
	$user = $conn->query($query) or die('Error, role query failed'); 
	$row = $user->fetch_assoc();
?>
	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" >Όνομα</span>
			<input type="text" name="fname" id="fname" tabindex="1" class="form-control" value="<?php echo $row['fname']; ?>" autofocus="autofocus" required>
		</div>	
	</div>	

	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" >Επώνυμο</span></span>
			<input type="text" name="lname" id="lname" tabindex="1" class="form-control" value="<?php echo $row['lname']; ?>" required>
		</div>	
	</div>	

	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" >Τηλέφωνο</span></span>
			<input type="text" name="telephone" id="telephone" tabindex="1" class="form-control" value="<?php echo $row['telephone']; ?>" >
		</div>	
	</div>	

 	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" >Πόλη</span></span>
			<input type="text" name="city" id="city" tabindex="1" class="form-control" value="<?php echo $row['city']; ?>" >
		</div>	
	</div>	
	
	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" >Διεύθυνση</span></span>
			<input type="text" name="address" id="address" tabindex="1" class="form-control" value="<?php echo $row['address']; ?>" >
		</div>	
	</div>	

 	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" >Email</span></span>
			<input type="email" name="email" id="email" tabindex="1" class="form-control" value="<?php echo $row['email']; ?>" >
		</div>	
	</div>		

 	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" >Ημ/νία γέννησης</span></span>
			<input type="text" name="birthdate" id="birthdate" tabindex="1" class="form-control" value="<?php echo $row['birthdate']; ?>" >
		</div>	
	</div>	

 	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" >Password</span></span>
			<input type="text" name="password" id="password" tabindex="1" class="form-control" value="<?php echo $row['password'];?>" required>
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
    <div class="col-sm-offset-1 col-sm-10">
	  <input type="hidden" name="ul" value='<?php echo $_GET['ul'] ?>' />	
      <button type="submit" name="submit_new_user" class="btn btn-primary btn-lg btn-block active">Καταχώρηση</button>
    </div>
  </div>
</form>
</div>
