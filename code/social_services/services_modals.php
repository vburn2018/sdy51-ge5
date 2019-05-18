
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

<div class="modal fade" id="edit_service_modal" role="dialog">
    <div class="modal-dialog" role="document">
	<div class="modal-content">

        <div class="modal-body  bg-primary">
		<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->

		
<form class='form-horizontal' style='padding: 0% 5% 1% 5%' method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
<?php
	
	echo('<h3>Προβολή-Μεταβολή στοιχείων Υπηρεσίας</h3>');	

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
			<input type="text" name="description" id="description" tabindex="1" class="form-control input-lg" placeholder="Περιγραφή" value="" autofocus="autofocus" required>
		</div>	
	</div>	

	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" ><span class="glyphicon glyphicon-user" ></span></span>
			<input type="text" name="address" id="address" tabindex="1" class="form-control input-lg" placeholder="Διεύθυνση" value="" required>
		</div>	
	</div>	

	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" ><span class="glyphicon glyphicon-phone" ></span></span>
			<input type="text" name="phone" id="phone" tabindex="1" class="form-control input-lg" placeholder="Τηλέφωνο" value="">
		</div>	
	</div>	
	

  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
	  <input type="hidden" name="ul" value='<?php echo $_GET['ul'] ?>' />
		<input type="hidden" name="id_service" id="id_service" value='' />		  
      <button id="update_service" type="submit" name="update_service" class="btn btn-primary btn-lg btn-block active">Καταχώρηση</button>
    </div>
  </div>
</form>		
		
        <!--the right place-->
        <div class="modal-footer">
		
		  <button id="delete_button" type="submit" name="delete_service" class="btn btn-danger btn-lg pull-left" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span> Διαγραφή</button> 
		  <button type="button" class="btn btn-default btn-lg" data-dismiss="modal"><span class="glyphicon glyphicon-off"></span> Άκυρο</button>
        </div>
		</form>
		</div> <!--this is in the wrong place but its ok -->
     </div>
    </div>
</div>


<div class="modal fade" id="dial_service_modal" role="dialog">
    <div class="modal-dialog" role="document">
	<div class="modal-content">

        <div class="modal-body  bg-primary">
		<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->

<?php
	
	echo('<h3>Έγινε κλήση της Υπηρεσίας</h3>');	

?>
	<div class="form-group">							
		<div class="input-group">
			<input type="text" name="title" id="title" tabindex="1" class="form-control input-lg" placeholder="Τίτλος" value="" autofocus="autofocus">
		</div>	
	</div>

	<div class="form-group">							
		<div class="input-group">
			<input type="text" name="description" id="description" tabindex="1" class="form-control input-lg" placeholder="Περιγραφή" value="" autofocus="autofocus">
		</div>	
	</div>	

	<div class="form-group">							
		<div class="input-group">
			<input type="text" name="address" id="address" tabindex="1" class="form-control input-lg" placeholder="Διεύθυνση" value="">
		</div>	
	</div>	

	<div class="form-group">							
		<div class="input-group">
			<input type="text" name="phone" id="phone" tabindex="1" class="form-control input-lg" placeholder="Τηλέφωνο" value="">
		</div>	
	</div>	

        <!--the right place-->
        <div class="modal-footer">
		
		 
		  <button type="button" class="btn btn-default btn-lg" data-dismiss="modal"><span class="glyphicon glyphicon-off"></span> Οκ</button>
        </div>

		</div> <!--this is in the wrong place but its ok -->
     </div>
    </div>
</div>
