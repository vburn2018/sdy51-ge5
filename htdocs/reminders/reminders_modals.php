
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
				<h5><span id="successModal_h3">Τα στοιχεία καταχωρήθηκαν </span><br><br>Senior Care</h5>
			</div>
        </div>
        <div class="modal-footer bg-primary">
          <button type="button" class="btn btn-success" data-dismiss="modal">Κλείσιμο</button>
		  <?php //onclick="javascript:window.location.reload()" ?>
        </div>
      </div>
      
    </div>
</div>

<div class="modal fade" id="edit_reminder_modal" role="dialog">
    <div class="modal-dialog" role="document">
	<div class="modal-content">

        <div class="modal-body  bg-primary">
		<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->

		
<form class='form-horizontal' style='padding: 0% 5% 1% 5%' method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
<?php
	
	echo('<h3>Προβολή-Μεταβολή στοιχείων Υπενθύμισης</h3>');	

?>
	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" ><span class="glyphicon glyphicon-user" ></span></span>
			<input type="text" name="title" id="title" tabindex="1" class="form-control input-lg" placeholder="Τίτλος" value="" autofocus="autofocus" required>
		</div>	
	</div>

	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" ><span class="glyphicon glyphicon-user" ></span></span>
			<input type="text" name="message" id="message" tabindex="1" class="form-control input-lg" placeholder="Μήνυμα" value="" autofocus="autofocus" required>
		</div>	
	</div>	

	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" ><span class="glyphicon glyphicon-user" ></span></span>
			<input type="datetime-local" name="start_date" id="start_date" tabindex="1" class="form-control input-lg" placeholder="Ημερομηνία εμφάνισης" value="" required>
		</div>	
	</div>	

	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" ><span class="glyphicon glyphicon-phone" ></span></span>
			<input type="text" name="repetition" id="repetition" tabindex="1" class="form-control input-lg" placeholder="Επανάληψη" value="">
		</div>	
	</div>	
	

  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
	  <input type="hidden" name="ul" value='<?php echo $_GET['ul'] ?>' />
		<input type="hidden" name="id_reminder" id="id_reminder" value='' />		  
      <button id="update_reminder" type="submit" name="update_reminder" class="btn btn-primary btn-lg btn-block active">Καταχώρηση</button>
    </div>
  </div>
</form>		
		
        <!--the right place-->
        <div class="modal-footer">
		
		  <button id="delete_button" type="submit" name="delete_reminder" class="btn btn-danger btn-lg pull-left" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span> Διαγραφή</button> 
		  <button type="button" class="btn btn-default btn-lg" data-dismiss="modal"><span class="glyphicon glyphicon-off"></span> Άκυρο</button>
        </div>
		</form>
		</div> <!--this is in the wrong place but its ok -->
     </div>
    </div>
</div>

