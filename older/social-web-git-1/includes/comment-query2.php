<?php 

$id5 = mysqli_real_escape_string($conn, $_GET['id']);

$_SESSION['pst_cmt'] = $id5;

?>