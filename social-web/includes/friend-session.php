<?php
// include ('config/db.php');

	$id4 = mysqli_real_escape_string($conn, $_GET['id']);

	$query4 = 'SELECT * FROM  users WHERE id = '.$id4;
	$query5 = 'SELECT * FROM friend_request WHERE user2_id = '.$_SESSION['userId'];

	$result4 = mysqli_query($conn, $query4);
	$result5 = mysqli_query($conn, $query5);

	$user2 = mysqli_fetch_assoc($result4);
	$requests = mysqli_fetch_all($result5, MYSQLI_ASSOC);

	$_SESSION['requestId'] = $id4;
	
	mysqli_free_result($result4);
	mysqli_free_result($result5);

	mysqli_close($conn);
?>