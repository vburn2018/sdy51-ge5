<?php
include __DIR__.'/../conf/conf.php';

$sql = 'DELETE FROM service WHERE id_service='.$_POST['id_service'];
$result = $conn->query($sql) or die('Error, query delete service failed');
echo "deleted";
mysqli_close($conn);
?>