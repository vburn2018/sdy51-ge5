<?php
include __DIR__.'/../conf/conf.php';

$sql = 'SELECT * FROM service WHERE id_service='.$_POST['id_service'];
$result = $conn->query($sql) or die('Error, edit service failed');
$row = mysqli_fetch_assoc($result);
echo json_encode($row);
mysqli_close($conn);
?>