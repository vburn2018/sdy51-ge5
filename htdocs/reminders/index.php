<?php 
include __DIR__.'/../header_footer/header.php';
include __DIR__.'/../conf/conf.php';
include __DIR__.'/../reminders/reminders_modals.php';
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
if(isset($_POST['submit_new_reminder'])||isset($_POST['update_reminder'])){

	$id_user = $_SESSION['id_user'];
	$title = $_POST['title'];
	$message  = $_POST['message'];
	$start_date = $_POST['start_date'];
	$repetition = "0000000";
	if (isset($_POST['repeat']))
		{
			foreach ($_POST['repeat'] as &$value) 
				{
					if ($value=='Sun') { $repetition[0]='1'; }
					if ($value=='Mon') { $repetition[1]='1'; }
					if ($value=='Tue') { $repetition[2]='1'; }
					if ($value=='Wed') { $repetition[3]='1'; }
					if ($value=='Thu') { $repetition[4]='1'; }
					if ($value=='Fri') { $repetition[5]='1'; }
					if ($value=='Sat') { $repetition[6]='1'; }
				}
		}
	
	if(isset($_POST['submit_new_reminder'])) { 		
		$sql = 'INSERT INTO reminder (id_user,title,message,start_date,repetition)
				VALUES ('.$id_user.',
						"'.$title.'",
						"'.$message.'",
						"'.$start_date.'",
						"'.$repetition.'"
						)';
	}				
	else {		
		//$id_reminder = $_POST['id_reminder'];
		$sql = 'UPDATE reminder SET 
						id_user = '.$id_user.', 
						title = "'.$title.'", 
						message = "'.$message.'", 
						start_date = "'.$start_date.'", 
						repetition = "'.$repetition.'"
						WHERE id_reminder = '.$_POST['id_reminder'].'';
	}
				
			if ($conn->query($sql) === TRUE) {
				//echo '<div class="alert alert-success">';
				//echo 	'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
				//echo 	'<strong>Επιτυχία!</strong> Τα στοιχεία καταχωρήθηκαν.';
				//echo '</div>';
				
				echo '<script>$("#successModal").modal();</script>';
				}
			else {
				echo $sql.'<br>';
				exit("Database Connection Error!");
				}
	}
?>

<button data-toggle="collapse" data-target="#reminders_form" class="btn btn-primary btn-lg active">+Νέα υπενθύμιση</button>

<div class="container-fluid collapse " style="padding: 10px 0px 30px 0px;" id="reminders_form">	
<form class='form-horizontal col-md-6 rh6-bg-grey-1 col-md-offset-3 rh6-shadow' style='padding: 0% 5% 1% 5%' method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
<?php

echo('<h3>Καταχώρηση νέας υπενθύμισης</h3>'); 
$sql = 'SELECT * FROM reminder WHERE id_user='.$_SESSION['id_user'];
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
			<input type="text" name="message" id="message" tabindex="1" class="form-control" placeholder="Μήνυμα" value="" required>
		</div>	
	</div>	

	<div style="overflow:hidden;">
		<div class="form-group">
			<div class="container-fluid">
				<div class="col-xs-12">
				<span class="input-group-addon" >Ημερομηνία εμφάνισης</span>
					<input name="start_date" class="form-control" type="text" id="datetimepicker12" hidden>
				</div>
			</div>	
		</div>
		<script type="text/javascript">
			$(function () {
				$('#datetimepicker12').datetimepicker({
					locale: 'el', 
					inline: true,
					format : 'YYYY-MM-DD HH:mm',
					sideBySide: true
				});
			});
		</script>
	</div>	
	
	<div class="form-group">  	
			<span class="input-group-addon" >Επανάληψη κάθε:</span>
			<span class="button-checkbox">
				<button type="button" class="btn" data-color="success"> Κυριακή</button>
				<input type="checkbox" name="repeat[]" value="Sun" class="hidden" />
			</span>
			<span class="button-checkbox">
				<button type="button" class="btn" data-color="success"> Δευτέρα</button>
				<input type="checkbox" name="repeat[]" value="Mon" class="hidden" />
			</span>
			<span class="button-checkbox">
				<button type="button" class="btn" data-color="success"> Τρίτη</button>
				<input type="checkbox" name="repeat[]" value="Tue" class="hidden" />
			</span>
			<span class="button-checkbox">
				<button type="button" class="btn" data-color="success"> Τετάρτη</button>
				<input type="checkbox" name="repeat[]" value="Wed" class="hidden" />
			</span>
			<span class="button-checkbox">
				<button type="button" class="btn" data-color="success"> Πέμπτη</button>
				<input type="checkbox" name="repeat[]" value="Thu" class="hidden" />
			</span>
			<span class="button-checkbox">
				<button type="button" class="btn" data-color="success"> Παρασκευή</button>
				<input type="checkbox" name="repeat[]" value="Fri" class="hidden" />
			</span>
			<span class="button-checkbox">
				<button type="button" class="btn" data-color="success"> Σάββατο</button>
				<input type="checkbox" name="repeat[]" value="Sat" class="hidden" />
			</span>
	</div>		

  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">	
      <button type="submit" name="submit_new_reminder" class="btn btn-primary btn-lg btn-block active">Καταχώρηση</button>
    </div>
  </div>
  
</form>
</div>

<div class="container-fluid " style="padding-top: 5px;">
	<table id="table_id" class="table display" style="width:100%">
		<thead>
			<tr>
				<th></th>
				<th>Τίτλος</th>
				<th>Μήνυμα</th>
				<th>Έναρξη</th>
				<th>Επανάληψη</th>
				<th></th>
			</tr>
		</thead>	
		<tbody>
<?php
	$result = $conn->query($sql) or die('Error, query reminder failed');
	$row_cnt = mysqli_num_rows($result);
	$cur_row = 0;	
	$data = '';
if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
			$repet = (string) $row['repetition'];
			$rpt = "";
			$rpt .= (substr($repet, 0, 1) == '1') ? 'Κυρ ' : '';
			$rpt .= (substr($repet, 1, 1) == '1') ? 'Δευ ' : '';
			$rpt .= (substr($repet, 2, 1) == '1') ? 'Τρί ' : '';
			$rpt .= (substr($repet, 3, 1) == '1') ? 'Τετ ' : '';
			$rpt .= (substr($repet, 4, 1) == '1') ? 'Πέμ ' : '';
			$rpt .= (substr($repet, 5, 1) == '1') ? 'Παρ ' : '';
			$rpt .= (substr($repet, 6, 1) == '1') ? 'Σάβ' : '';

			echo '<tr id=tr-'.$row['id_reminder'].'>
				<td></td>
				<td><strong>'.$row['title'].'</strong></td>
				<td>'.$row['message'].'</td>
				<td>'.$row['start_date'].'</td>
				<td>'.$rpt.'</td>
				<td>
					<button 
							type="button" 
							id="edit-'.$row['id_user'].'" 
							class="btn btn-primary glyphicon glyphicon-edit" 
							onclick="edit_reminder('.$row['id_reminder'].')"
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
	$( "li:contains('Υπενθυμίσεις')" ).ready(function(e) {
			$( "nav li.active" ).removeClass('active');
			$("li:contains('Υπενθυμίσεις')").addClass('active');
			});
/* ======================================================================*/	
</script>

<script>
$(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i>');
            }
        }
        init();
    });
});
</script>

<script>
function del_reminder(id_reminder) {
	//alert(id_reminder);
	$('#edit_reminder_modal').modal('hide');
	$("#confirmModal").modal();
	$('#confirmModal').on('hide.bs.modal', function (e) { 
		var tmpid = $(document.activeElement).attr('id'); 
		
		if (tmpid=='delete') {
			
			$.ajax({
			url:"/reminders/delete_reminder.php" , 
			type: "POST" ,
			data: {id_reminder},
			success: function(rtrn) { 
						//alert(JSON.stringify(data, null, 4));
						if (rtrn == 'deleted') {
								document.getElementById("successModal_h2").innerHTML = "Η Διαγραφή ολοκληρώθηκε.";
								document.getElementById("successModal_h3").innerHTML = "Επιτυχής διαγραφή!";
								$("#successModal").modal();
								$('#table_id').DataTable().row('#tr-'+id_reminder).remove().draw( false );
								//location.reload();
							}	
					}		
			});				
		}
		else { $('#edit_reminder_modal').modal(); }
		$('#confirmModal').off();
	}); 
}
</script>

<script>
function edit_reminder(id_reminder) {

			$.ajax({
			url:"/reminders/edit_reminder.php" , 
			type: "POST" ,
			data: {id_reminder},
			dataType: "json", 
			error: function(rtrn) {alert(rtrn);	}, 
			success: function(rtrn) { 
						//alert(JSON.stringify(data, null, 4));
						if (rtrn != 'Error, edit user failed') {
								//document.getElementById("confirmModal_h2").innerHTML = "Η Διαγραφή ολοκληρώθηκε.";
								//document.getElementById("confirmModal_h3").innerHTML = "Επιτυχής διαγραφή!";
								//$("#successModal").modal();
								//$('#table_id').DataTable().row('#tr-'+id_user).remove().draw( false );
								
								$("#edit_reminder_modal #title").val(rtrn.title);
								$("#edit_reminder_modal #message").val(rtrn.message);
								$("#edit_reminder_modal #start_date").val(rtrn.start_date);
								$("#edit_reminder_modal #repetition").val(rtrn.repetition);
								
								$("#edit_reminder_modal #id_reminder").val(id_reminder);
								
								$("#edit_reminder_modal #delete_button").attr('onclick', 'del_reminder('+id_reminder+')');
								
								$("#edit_reminder_modal").modal();
								//alert(id);
								
								//var keys = Object.keys(rtrn);	alert(keys);
								//location.reload();
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