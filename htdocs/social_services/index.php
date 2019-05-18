<?php 
include __DIR__.'/../header_footer/header.php';
include __DIR__.'/../conf/conf.php';
include __DIR__.'/../social_services/services_modals.php';
?>

<style>
.btn span.fa-check {    			
	opacity: 0;				
}
.btn.active span.fa-check {				
	opacity: 1;				
}
</style>
<div style='padding: 0px'></div>
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
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
		  
        </div>
      </div>
      
    </div>
</div>
<?php
if(isset($_POST['submit_new_service'])||isset($_POST['update_service'])){

	$id_user = $_SESSION['id_user'];
	$title = $_POST['title'];
	$description  = $_POST['description'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	
	if(isset($_POST['submit_new_service'])) { 		
		$sql = 'INSERT INTO service (id_user,title,description,address,phone)
				VALUES ('.$id_user.',
						"'.$title.'",
						"'.$description.'",
						"'.$address.'",
						"'.$phone.'"
						)';
	}				
	else {		
		$sql = 'UPDATE service SET 
						id_user = '.$id_user.', 
						title = "'.$title.'", 
						description = "'.$description.'", 
						address = "'.$address.'", 
						phone = "'.$phone.'"
						WHERE id_service = '.$_POST['id_service'].'';
	}
				
			if ($conn->query($sql) === TRUE) {
				
				echo '<script>$("#successModal").modal();</script>';
				}
			else {
				echo $sql.'<br>';
				exit("Database Connection Error!");
				}
	}
?>

<button data-toggle="collapse" data-target="#services_form" class="btn btn-primary btn-lg active">+Νέα υπηρεσία</button>

<div class="container-fluid collapse " style="padding: 10px 0px 30px 0px;" id="services_form">	
<form class='form-horizontal col-md-6 rh6-bg-grey-1 col-md-offset-3 rh6-shadow' style='padding: 0% 5% 1% 5%' method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
<?php

echo('<h3>Καταχώρηση νέας υπηρεσίας</h3>'); 
$sql = 'SELECT * FROM service';
?>
	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" ><span class="glyphicon glyphicon-paperclip" ></span></span>
			<input type="text" name="title" id="title" tabindex="1" class="form-control" placeholder="Τίτλος" value="" autofocus="autofocus" required>
		</div>	
	</div>	

	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" ><span class="glyphicon glyphicon-copy" ></span></span>
			<input type="text" name="description" id="description" tabindex="1" class="form-control" placeholder="Περιγραφή" value="" required>
		</div>	
	</div>	

	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" ><span class="glyphicon glyphicon-pushpin" ></span></span>
			<input type="text" name="address" id="address" tabindex="1" class="form-control" placeholder="Διεύθυνση" value="">
		</div>	
	</div>	
	
 	<div class="form-group">							
		<div class="input-group">
			<span class="input-group-addon" ><span class="glyphicon glyphicon-phone-alt" ></span></span>
			<input type="text" name="phone" id="phone" tabindex="1" class="form-control" placeholder="Τηλέφωνο" value="">
		</div>	
	</div>	

  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">	
      <button type="submit" name="submit_new_service" class="btn btn-primary btn-lg btn-block active">Καταχώρηση</button>
    </div>
  </div>
</form>
</div>

<div class="container-fluid " style="padding-top: 5px;">
	<table id="table_id" class="table display nowrap" style="width:100%">
		<thead>
			<tr>
				<th></th>
				<th>Τίτλος</th>
				<th>Περιγραφή</th>
				<th>Διεύθυνση</th>
				<th>Τηλέφωνο</th>
				<th></th>
				<th></th>
			</tr>
		</thead>	
		<tbody>
<?php
	$result = $conn->query($sql) or die('Error, query service failed');
	$row_cnt = mysqli_num_rows($result);
	$cur_row = 0;	
	$data = '';
if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
			
			echo '<tr id=tr-'.$row['id_service'].'>
				<td></td>
				<td><strong>'.$row['title'].'</strong></td>
				<td>'.$row['description'].'</td>
				<td>'.$row['address'].'</td>
				<td>'.$row['phone'].'</td>
				<td>
					<button 
							type="button" 
							id="edit-'.$row['id_service'].'" 
							class="btn btn-danger glyphicon glyphicon-phone-alt" 
							onclick="dial_service('	.$row['id_service'].','
													.$_SESSION['id_user'].',\''
													.$row['title'].'\',\''
													.$row['description'].'\',\''
													.$row['address'].'\',\''
													.$row['phone'].'\'
													)"
													
							>
					</button>	
                </td>
				<td>
					<button 
							type="button" 
							id="edit-'.$row['id_service'].'" 
							class="btn btn-primary glyphicon glyphicon-edit" 
							onclick="edit_service('.$row['id_service'].')"
							>
					</button>	
                </td>
            </tr>';
        }
    }
    else
    {
        // records now found 
        echo '<tr><td colspan="6">Records not found!</td></tr>';
    }
 ?>	
		<tbody>
	</table>
</div>	
<script>
/* =================== SETS ACTIVE CLASS ON NAV CHOICE ==================*/	
	$( "li:contains('Κοινωνικές Υπηρεσίες')" ).ready(function(e) {
			$( "nav li.active" ).removeClass('active');
			$("li:contains('Κοινωνικές Υπηρεσίες')").addClass('active');
			});
/* ======================================================================*/	
</script>

<script>
function del_service(id_service) {
	//alert(id_service);
	$('#edit_service_modal').modal('hide');
	$("#confirmModal").modal();
	$('#confirmModal').on('hide.bs.modal', function (e) { 
		var tmpid = $(document.activeElement).attr('id'); 
		
		if (tmpid=='delete') {
			
			$.ajax({
			url:"/social_services/delete_service.php" , 
			type: "POST" ,
			data: {id_service},
			success: function(rtrn) { 
						//alert(JSON.stringify(data, null, 4));
						if (rtrn == 'deleted') {
								document.getElementById("successModal_h2").innerHTML = "Η Διαγραφή ολοκληρώθηκε.";
								document.getElementById("successModal_h3").innerHTML = "Επιτυχής διαγραφή!";
								$("#successModal").modal();
								$('#table_id').DataTable().row('#tr-'+id_service).remove().draw( false );
								//location.reload();
							}	
					}		
			});				
		}
		else { $('#edit_service_modal').modal(); }
		$('#confirmModal').off();
	}); 
}
</script>

<script>
function edit_service(id_service) {

			$.ajax({
			url:"/social_services/edit_service.php" , 
			type: "POST" ,
			data: {id_service},
			dataType: "json", 
			error: function(rtrn) {alert(rtrn);	}, 
			success: function(rtrn) { 
						//alert(JSON.stringify(data, null, 4));
						if (rtrn != 'Error, edit user failed') {
								//document.getElementById("confirmModal_h2").innerHTML = "Η Διαγραφή ολοκληρώθηκε.";
								//document.getElementById("confirmModal_h3").innerHTML = "Επιτυχής διαγραφή!";
								//$("#successModal").modal();
								//$('#table_id').DataTable().row('#tr-'+id_user).remove().draw( false );
								
								$("#edit_service_modal #title").val(rtrn.title);
								$("#edit_service_modal #description").val(rtrn.description);
								$("#edit_service_modal #address").val(rtrn.address);
								$("#edit_service_modal #phone").val(rtrn.phone);
								
								$("#edit_service_modal #id_service").val(id_service);
								
								$("#edit_service_modal #delete_button").attr('onclick', 'del_service('+id_service+')');
								
								$("#edit_service_modal").modal();
								//alert(id);
								
								//var keys = Object.keys(rtrn);	alert(keys);
								//location.reload();
							}	
					}		
			});			

}
</script>
<script>
function dial_service(id_service,id_user,title,description,address,phone) {
//alert(id_service+','+id_user+','+title+','+description+','+address+','+phone)
			$.ajax({
			url:"/social_services/dial_service.php" , 
			type: "POST" ,
			data: {"id_service": id_service, "id_user": id_user},
			error: function(rtrn) {alert("Error: "+JSON.stringify(rtrn, null, 4));}, 
			success: function(rtrn) { 

						if (rtrn != 'Error, dial user failed') {

								$("#dial_service_modal #title").val(title);
								$("#dial_service_modal #description").val(description);
								$("#dial_service_modal #address").val(address);
								$("#dial_service_modal #phone").val(phone);
								
								$("#dial_service_modal #id_service").val(id_service);
								
								$("#dial_service_modal #delete_button").attr('onclick', 'del_service('+id_service+')');
								
								$("#dial_service_modal").modal();

							}	
					}		
			});			

}
</script>

<script>
$(document).ready(function() {

    $('#table_id').DataTable({
		 responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
        columnDefs: [ {
            className: 'control',
            orderable: false,
            targets:   0
        } ],
		 language: 
				{
				search:       "Αναζήτηση:",
				info:         "Εμφάνιση _START_ έως _END_ από _TOTAL_ εγγραφές",
				infoEmpty:    "Showing 0 to 0 of 0 entries",
				lengthMenu:   "Εμφάνιση _MENU_ εγγραφών",
				paginate: {
								first:      "Αρχική",
								last:       "Τελευταία",
								next:       "Επόμενη",
								previous:   "Προηγούμενη"
							},
				infoEmpty: 	"Δεν υπάρχουν εγγραφές"
				}
	});
});

</script>

<script>
$('#table_id tbody').on( 'click', '#btn', function () {
    table
        .row( $(this).parents('tr') )
        .remove()
        .draw();
} );

$('#successModal').on('hidden.bs.modal', function (e) {
	document.getElementById("successModal_h2").innerHTML = "Επιτυχής καταχώρηση! ";
	document.getElementById("successModal_h3").innerHTML = "Τα στοιχεία καταχωρήθηκαν ";
});
</script>