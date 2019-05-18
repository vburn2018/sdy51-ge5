<?php
include __DIR__.'/../conf/conf.php';

$sql = 'SELECT * FROM reminder WHERE id_reminder='.$_POST['id_reminder'];
$result = $conn->query($sql) or die('Error, edit reminder failed');
$row = mysqli_fetch_assoc($result);
echo json_encode($row);
mysqli_close($conn);
?>