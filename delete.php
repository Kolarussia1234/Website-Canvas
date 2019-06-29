<?php
require_once 'includes/dbh.inc.php';
error_reporting(E_ALL & ~E_NOTICE);
$id = $_GET['id'];
$sqlrequest = "DELETE FROM images WHERE id = $id";
$result = mysqli_query($conn,$sqlrequest);
if($result){
	header("Location: projects.php?deleteSuccess");
} else{
	header("Location: projects.php?deleteNotSucceed");
}


?>