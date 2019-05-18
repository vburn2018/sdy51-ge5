<?php
include __DIR__.'/../conf/conf.php';
date_default_timezone_set('Europe/Athens');
$date = (string) date('Y-m-d H:i', time());	
$sql = 'SELECT * FROM reminder WHERE (id_user='.$_POST['id_user'].' AND start_date=\''.$date.'\') LIMIT 1';
//$sql = 'SELECT * FROM reminder WHERE id_user='.$_POST['id_user'].' LIMIT 1';
$result = $conn->query($sql) or die('Error12');

if(mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
	echo json_encode($row); 
	}
else { 
	echo 'Error'; 
	//echo $date;
	}

mysqli_close($conn);
?>