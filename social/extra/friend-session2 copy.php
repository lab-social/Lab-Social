<?php
	$user2id = $_SESSION['userId'];

	$query5 = 'SELECT * FROM friend_request WHERE user2_id = '.$user2id.' AND open_req = 1';
	$query5a = 'SELECT * FROM friend_accept WHERE (user2_id = '.$user2id.' OR user1_id = '.$user2id.') AND accept = 1';

	// $query5b = '(SELECT * FROM friend_accept WHERE (user2_id = '.$user2id.' OR user1_id = '.$user2id.') AND accept = 1)';
	//  UNION (SELECT * FROM users WHERE (users.id = friend_accept.user1_id OR users.id = friend_accept.user2_id ))';

	// $queryid1 = 'SELECT user1_id FROM friend_accept WHERE user2_id = '.$user2id.' AND open_req = 1';
	$queryid1 = 'SELECT user1_id FROM friend_accept WHERE user2_id = '.$user2id;
	// $queryid2 = 'SELECT user2_id FROM friend_request WHERE user1_id = '.$user2id.' AND open_req = 1';

	$result5 = mysqli_query($conn, $query5);
	$result5a = mysqli_query($conn, $query5a);
	$result5b = mysqli_query($conn, $queryid1);
	// $result5c = mysqli_query($conn, $queryid2);

	$requests = mysqli_fetch_all($result5, MYSQLI_ASSOC);
	$friends = mysqli_fetch_all($result5a, MYSQLI_ASSOC);

	$friendid1 = mysqli_fetch_assoc($result5b);
	// $friendid2 = mysqli_fetch_assoc($result5c);
	print_r($friendid1);
	$friendName1 = $friendid1['user1_id'];
	print_r($friendName1);

	// $friendName2 = $friendid2['user1_id'];

	$queryname1 = 'SELECT username FROM users WHERE id = '.$friendName1;
	// $queryname2 = 'SELECT username FROM users WHERE id = '.$friendName2;
	$result5d = mysqli_query($conn, $queryname1);
	// $result5e = mysqli_query($conn, $queryname2);
	$friend1name = mysqli_fetch_assoc($result5d);
	// $friend2name = mysqli_fetch_assoc($result5e);
	$listname = $friend1name['username'];

	mysqli_free_result($result5);
	mysqli_free_result($result5a);
	mysqli_free_result($result5b);
	// mysqli_free_result($result5c);
	// mysqli_free_result($result5d);
	// mysqli_free_result($result5e);

	// mysqli_close($conn);

	// if (isset($_POST['acc-req'])) {
	// 	$sql = 'INSERT INTO friend_request (open_req) VALUES (0)';
	// 	mysqli_query($conn, $sql);
	// 	mysqli_close($conn);
	// }

	// print_r($friends);

	if(isset($_POST['acc-req'])){
		// Get form data
		$req_id = mysqli_real_escape_string($conn,$_POST['req-id']);
		$user1_id = mysqli_real_escape_string($conn,$_POST['user1-id']);
		$user2_id = mysqli_real_escape_string($conn,$_POST['user2-id']);

		$query6 = "UPDATE friend_request SET 
					open_req=0 
						WHERE id = {$req_id}";

		$query6a = "UPDATE friend_accept SET 
					request_id = $req_id,
					accept=1 
					WHERE user1_id = {$user1_id}
					AND user2_id = {$user2_id}";

		if(mysqli_query($conn, $query6) && mysqli_query($conn, $query6a)){
			header('Location: '.ROOT_URL.'friends.php');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}


?>