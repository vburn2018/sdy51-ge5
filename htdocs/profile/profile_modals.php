
<div style='padding: 20px'></div>
<div class="modal fade" id="confirmModal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">

        <div class="modal-body bg-primary">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
			<div>
				<h2 id="confirmModal_h2">Προσοχή!</h2>
				<h5><span id="confirmModal_h3">Τα στοιχεία θα διαγραφούν.</span></h5>
			</div>
        </div>
        <div class="modal-footer bg-primary">
			<button id="delete" type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Διαγραφή</button>
			<button id="cancel" type="button" class="btn btn-success btn-lg" data-dismiss="modal">Άκυρο</button>
        </div>

      </div>
      
    </div>
</div>

<div class="modal fade" id="successModal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">

        <div class="modal-body bg-primary">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
			<div>
				<h2 id="successModal_h2">Επιτυχής καταχώρηση! </h2>
				<h5><span id="successModal_h3">Τα στοιχεία καταχωρήθηκαν </span><br><br>The Studio Pilates Fitness</h5>
			</div>
        </div>
        <div class="modal-footer bg-primary">
          <button type="button" class="btn btn-success" data-dismiss="modal">Κλείσιμο</button>
		  <?php //onclick="javascript:window.location.reload()" ?>
        </div>
      </div>
      
    </div>
</div>

<div class="modal fade" id="edit_user_modal" role="dialog">
    <div class="modal-dialog" role="document">
	<div class="modal-content">

        <div class="modal-body  bg-primary">
		<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->

		
<form class='form-horizontal' style='padding: 0% 5% 1% 5%' method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
<?php
if(isset($_POST['ul']))	{ $_GET['ul'] = $_POST['ul']; } //if page is not called from the menu but after submit button

if(isset($_GET['ul']))	{
	
	if ($_GET['ul']==1) { echo('<h3>Προβολή-Μεταβολή στοιχείων πελάτη</h3>'); }
	if ($_GET['ul']==2) { echo('<h3>Προβολή-Μεταβολή στοιχείων εκπαιδευτή</h3>');}	
	}

?>
	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" ><span class="glyphicon glyphicon-user" ></span></span>
			<input type="text" name="fname" id="fname" tabindex="1" class="form-control input-lg" placeholder="Όνομα" value="" autofocus="autofocus" required>
		</div>	
	</div>	

	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" ><span class="glyphicon glyphicon-user" ></span></span>
			<input type="text" name="lname" id="lname" tabindex="1" class="form-control input-lg" placeholder="Επώνυμο" value="" required>
		</div>	
	</div>	

	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" ><span class="glyphicon glyphicon-phone" ></span></span>
			<input type="text" name="telephone1" id="telephone1" tabindex="1" class="form-control input-lg" placeholder="Κινητό" value="">
		</div>	
	</div>	
	
 	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" ><span class="glyphicon glyphicon-phone-alt" ></span></span>
			<input type="text" name="telephone2" id="telephone2" tabindex="1" class="form-control input-lg" placeholder="Σταθερό" value="">
		</div>	
	</div>	

 	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" ><span class="glyphicon glyphicon-home" ></span></span>
			<input type="text" name="city" id="city" tabindex="1" class="form-control input-lg" placeholder="Πόλη" value="">
		</div>	
	</div>	

 	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" ><span class="glyphicon glyphicon-envelope" ></span></span>
			<input type="email" name="email" id="email" tabindex="1" class="form-control input-lg" placeholder="email" value="">
		</div>	
	</div>		

 	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" ><span class="glyphicon glyphicon-user" ></span></span>
			<input type="text" name="username" id="username" tabindex="1" class="form-control input-lg" placeholder="Username" value="" required>
		</div>	
	</div>		

 	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" ><span class="glyphicon glyphicon-lock" ></span></span>
			<input type="text" name="password" id="password" tabindex="1" class="form-control input-lg" placeholder="Password" value="" required>
		</div>	
	</div>		

	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" ><span class="glyphicon glyphicon-euro" ></span></span>
			<input type="number" name="due" id="due" tabindex="1" class="form-control input-lg" placeholder="Υπόλοιπο" value="0" >
		</div>	
	</div>
	
	<?php // ============ ΓΥΜΝΑΣΤΗΡΙΑ =============
						$query = 'SELECT id_gym, gym_name FROM gym';	
						$gyms = $conn->query($query) or die('Error, gyms query failed'); // Check if there are any genres
	?>
	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" ><span class="glyphicon glyphicon-home" ></span></span>
			<select class="form-control" name="id_gym" id="id_gym" >
				<?php
					if ($gyms->num_rows > 0) {
						while($row = $gyms->fetch_assoc()) {
							echo '<option value="'.$row['id_gym'].'" >'.$row['gym_name'].'</option>';	
						}
					} else {
						echo "Δεν έχουν καταχωρηθεί Γυμναστήρια";
					}
				?>		
			</select>
		</div>	
	</div>

  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
	  <input type="hidden" name="ul" value='<?php echo $_GET['ul'] ?>' />
		<input type="hidden" name="id_user" id="id_user" value='' />		  
      <button id="update_user" type="submit" name="update_user" class="btn btn-primary btn-lg btn-block active">Καταχώρηση</button>
    </div>
  </div>
</form>		
		
        <!--the right place-->
        <div class="modal-footer">
		
		  <!--<button type="submit" name="update_lesson" class="btn btn-success" ><span class="glyphicon glyphicon-pencil"></span> Update</button> -->
		  <button id="delete_button" type="submit" name="delete_lesson" class="btn btn-danger btn-lg pull-left" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span> Διαγραφή</button> 
		  <button type="button" class="btn btn-default btn-lg" data-dismiss="modal"><span class="glyphicon glyphicon-off"></span> Άκυρο</button>
        </div>
		</form>
		</div> <!--this is in the wrong place but its ok -->
     </div>
    </div>
</div>

<!-- =============== MEMBERSHIP MODAL ===================================== -->
<div class="modal fade" id="membership_modal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <div class="modal-content">
        <div class="modal-body bg-primary">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
			<div class="container-fluid">
				<div id="mship_id_user" class="hidden" ></div>
				<div class="pre-scrollable">
					<table>
						<tr style="border-bottom:1pt solid;">
							<th>Ημερομηνία</th>
							<th>Πακέτο</th>
							<th>Συνεδρίες</th>
							<th>Ποσό</th>
							<th></th>
						</tr>	
						<tr>
							<td>
								<div class="col-xs-12">
									<input style="color:black;" id="mship_date" type="date" value="<?php echo date('Y-m-d'); ?>" />
								</div>
												
							</td>
							<td>
								<div class="input-group">
									<select class="form-control" id="mship_id_packet" >
									<?php
										$query = 'SELECT id_packet, packet_name FROM packet';	
										$packets = $conn->query($query) or die('Error, packets query failed');
										if ($packets->num_rows > 0) 
										{
											while($row = $packets->fetch_assoc()) 
											{
												echo '<option value="'.$row['id_packet'].'">'.$row['packet_name'].'</option>';	
											}
										} 
										else 
										{
											echo "Δεν έχει καταχωρηθεί κάποιο Πακέτο";
										}
									?>				
									</select>
								</div>	

							</td>
							<td>
								<div class="input-group">
									<input type="number" id="mship_sessions" class="form-control" placeholder="Διάρκεια" min="-300" max="300" value="0" required>
								</div>	
							</td>
							<td>
								<div class="input-group">
									<input type="number" id="mship_amount" class="form-control" placeholder="Ποσό" value="0" required>
								</div>	
							</td>
							<td>
								<div class="input-group">
									<button type="button" onclick="mship_set()" class="btn btn-danger" data-dismiss="modal">Καταχώρηση</button>
								</div>	
							</td>
							<td>
							</td>
						</tr>
					</table>
				</div>
			</div>	
        </div>
        <div class="modal-footer bg-primary">
          <button type="button" class="btn btn-success" data-dismiss="modal">Κλείσιμο</button>
		  <?php //onclick="javascript:window.location.reload()" ?>
        </div>
      </div>
      
    </div>
</div>
<script>
function mship_set()
{
	var mship_id_user = $('#mship_id_user').html();
	var mship_date = $('#mship_date').val();
	var mship_id_packet = $('#mship_id_packet').val();
	var mship_sessions = $('#mship_sessions').val();
	var mship_amount = $('#mship_amount').val();
	
	$.ajax({
			url:"/add_user/membership_set.php" , 
			type: "POST" ,
			data: {mship_id_user, mship_date, mship_id_packet, mship_sessions, mship_amount},
			dataType: "text", 
			error: function(rtrn) {alert("error "+rtrn);	}, 
			success: function(rtrn) { 
				$('#successModal').modal();
			}		
	});			


}
</script>