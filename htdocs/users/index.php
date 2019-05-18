<?php 
include '../header_footer/header.php';
include '../conf/conf.php';
?>

<div style="padding: 50px 10px 10px 10px;">
<form method="post">
<p>Select table name: <select name="tName" onchange="this.form.submit()">
<?php 

$tables = mysqli_query($conn,"SHOW TABLES");

while($sqlTables = mysqli_fetch_array($tables,MYSQLI_ASSOC))
	{

	foreach ($sqlTables as $value) 
			{					
			echo "<option value='".$value."' ";
			if (isset($_POST['tName']) && $value == $_POST['tName']) {echo "selected";};
			echo ">".$value."</option> ";
			}		
	}
?>	
</select></p>
</form>
<?php 	
if (isset($_POST['tName'])) {
$sqlTableName = $_POST['tName'];

// FETCH sql table structure QUERY
$q = 'DESCRIBE '.$sqlTableName.'';
$r = mysqli_query($conn,$q) or die(mysql_error()); 

// FETCH sql table data QUERY
	$query = 'SELECT * FROM '.$sqlTableName.'';	
	$rows = $conn->query($query) or die('Error, '.$sqlTableName.' query failed'); // Check if there are any genres
?>

	
<table id=<?php echo '"'.$sqlTableName.'"'; ?> class="table row-border rh6-shadow">
	<thead>
		<tr>
			<?php
				while($row = mysqli_fetch_array($r,MYSQLI_ASSOC)) { // echo "{$row['Field']} - {$row['Type']}\n";
					echo "<th>".$row['Field']."</th>";}
			?>
		</tr>
	</thead>
	<tbody>
		<?php
			if ($rows->num_rows > 0) {
    
				while($row = $rows->fetch_assoc()) {
					echo "<tr>";
						foreach ($row as $value) 
							{ echo "<td>".$value."</td>"; }	
					echo "</tr>";
					}
				} 
			else { echo "0 results"; }
		?>	
	</tbody>
</table>
</div>
<?php } ?>


<?php 
include '../header_footer/footer.php';
?>

<script>
/* =================== SETS ACTIVE CLASS ON NAV CHOICE ==================*/	
	$( "li:contains('Add Lesson')" ).ready(function(e) {
			$( "nav li.active" ).removeClass('active');
			$("li:contains('Administration')").addClass('active');
			$("li:contains('Users')").addClass('active');
			});
/* ======================================================================*/				
</script>
