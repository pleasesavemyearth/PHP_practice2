<?php 
require './adbconfig.php';

// ! 삭제되지않음 ! 

$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id='".$id."'";

$conn->close();

header('Location: oo_memolistform.php');

?>