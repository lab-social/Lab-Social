<?php

include ('config/db.php');

	$user2id = $_SESSION['userId'];

	$query5 = 'SELECT * FROM friend_request WHERE user2_id = '.$user2id.' AND open_req = 1';

	$query5a = 'SELECT
	users.id,
	users.username,
	users.about,
	users.pic_status,
	friend_accept1.user1_id,
	friend_accept1.user2_id
	FROM users
	LEFT JOIN friend_accept1 ON users.id = friend_accept1.user2_id
	WHERE friend_accept1.user1_id IS NOT NULL
	AND friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1
	UNION
	SELECT
	users.id,
	users.username,
	users.about,
	users.pic_status,
	friend_accept2.user1_id,
	friend_accept2.user2_id
	FROM users
	LEFT JOIN friend_accept2 ON users.id = friend_accept2.user2_id
	WHERE friend_accept2.user1_id IS NOT NULL
	AND friend_accept2.user1_id = '.$user2id.' AND friend_accept2.accept = 1';
		
	$result5 = mysqli_query($conn, $query5);
	$result5a = mysqli_query($conn, $query5a);

	$requests = mysqli_fetch_all($result5, MYSQLI_ASSOC);
	$friends = mysqli_fetch_all($result5a, MYSQLI_ASSOC);

	mysqli_free_result($result5);
	mysqli_free_result($result5a);

	if(isset($_POST['acc-req'])){
		// Get form data
		$req_id = mysqli_real_escape_string($conn,$_POST['req-id']);
		$user1_id = mysqli_real_escape_string($conn,$_POST['user1-id']);
		$user2_id = mysqli_real_escape_string($conn,$_POST['user2-id']);

		$query6 = "UPDATE friend_request SET 
					open_req=0 
						WHERE id = {$req_id}";

		$query6a = "UPDATE friend_accept1 SET 
					request_id = $req_id,
					accept=1 
					WHERE user1_id = {$user1_id}
					AND user2_id = {$user2_id}";

		$query6b = "UPDATE friend_accept2 SET 
					request_id = $req_id,
					accept=1 
					WHERE user1_id = {$user2_id}
					AND user2_id = {$user1_id}";

		if(mysqli_query($conn, $query6) && mysqli_query($conn, $query6a) && mysqli_query($conn, $query6b)){
			header('Location: friends.php');
			// header('Location: '.ROOT_URL.'friends.php');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}


	if(isset($_POST['dec-req'])){
		// Get form data
		$req_id = mysqli_real_escape_string($conn,$_POST['req-id']);
		$user1_id = mysqli_real_escape_string($conn,$_POST['user1-id']);
		$user2_id = mysqli_real_escape_string($conn,$_POST['user2-id']);

		$query61 = "UPDATE friend_request SET 
					open_req=0 
						WHERE id = {$req_id}";

		$query6a1 = "UPDATE friend_accept1 SET 
					request_id = $req_id,
					accept=2 
					WHERE user1_id = {$user1_id}
					AND user2_id = {$user2_id}";

		$query6b1 = "UPDATE friend_accept2 SET 
					request_id = $req_id,
					accept=2 
					WHERE user1_id = {$user2_id}
					AND user2_id = {$user1_id}";

		if(mysqli_query($conn, $query61) && mysqli_query($conn, $query6a1) && mysqli_query($conn, $query6b1)){
			header('Location: friends.php');

			// header('Location: '.ROOT_URL.'friends.php');
			// header("refresh: 0");

		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}


?>