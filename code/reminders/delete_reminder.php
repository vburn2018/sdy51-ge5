<?php
include __DIR__.'/../conf/conf.php';

$sql = 'DELETE FROM reminder WHERE id_reminder='.$_POST['id_reminder'];
$result = $conn->query($sql) or die('Error, query delete user failed');
echo "deleted";
mysqli_close($conn);
?>