<?php
include __DIR__.'/../conf/conf.php';

$sql = 'INSERT INTO user_service_call (id_user,id_service)
			VALUES ('.$_POST['id_user'].',
					'.$_POST['id_service'].'
					)';
$result = $conn->query($sql) or die('Error, dial service failed');
mysqli_close($conn);
?>