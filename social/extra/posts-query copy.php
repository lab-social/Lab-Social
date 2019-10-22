<?php 

$user2id = $_SESSION['userId'];

	// $query = 'SELECT * FROM posts ORDER BY publish_date DESC';

	$query = '(SELECT *
	FROM users,posts,friend_accept1
	WHERE users.id = posts.user_id
	AND users.id = friend_accept1.user2_id
	AND friend_accept1.user1_id = '.$user2id.'
	AND friend_accept1.accept=1)
	UNION
	(SELECT *
	FROM users,posts,friend_accept2
	WHERE users.id = posts.user_id
	AND users.id = friend_accept2.user2_id
	AND friend_accept2.user1_id = '.$user2id.'
	AND friend_accept2.accept=1)
	UNION
	(SELECT *
	FROM users,posts,friend_accept2
	WHERE users.id = posts.user_id
	AND users.id = friend_accept2.user2_id
	AND friend_accept2.user2_id = '.$user2id.'
	AND friend_accept2.accept=1)
	UNION
	(SELECT *
	FROM users,posts,friend_accept2
	WHERE users.id = posts.user_id
	AND users.id = friend_accept2.user2_id
	AND friend_accept2.user2_id = '.$user2id.'
	AND friend_accept2.accept=1)';
	
	$query2 = 'SELECT * FROM comments ORDER BY publish_date DESC';

	$querya = '(SELECT users.username, posts.author, posts.id, posts.title, posts.body, posts.publish_date
	FROM users,posts,friend_accept1
	WHERE users.id = posts.user_id
	AND users.id = friend_accept1.user2_id
	AND friend_accept1.user1_id='.$user2id.'
	AND friend_accept1.accept=1
	AND posts.domain_num=1)
	UNION
	(SELECT users.username, posts.author, posts.id, posts.title, posts.body, posts.publish_date
	FROM users,posts,friend_accept2
	WHERE users.id = posts.user_id
	AND users.id = friend_accept2.user2_id
	AND friend_accept2.user1_id='.$user2id.'
	AND friend_accept2.accept=1
	AND posts.domain_num=1)
	UNION
	(SELECT users.username, posts.author, posts.id, posts.title, posts.body, posts.publish_date
	FROM users,posts,friend_accept2
	WHERE users.id = posts.user_id
	AND users.id = friend_accept2.user2_id
	AND friend_accept2.user2_id='.$user2id.'
	AND friend_accept2.accept=1
	AND posts.domain_num=1)
	UNION
	(SELECT users.username, posts.author, posts.id, posts.title, posts.body, posts.publish_date
	FROM users,posts,friend_accept2
	WHERE users.id = posts.user_id
	AND users.id = friend_accept2.user2_id
	AND friend_accept2.user2_id='.$user2id.'
	AND friend_accept2.accept=1
	AND posts.domain_num=1)';

	$queryb = 'SELECT
	posts.author,
	posts.body,
	posts.title,
	users.id AS userID,
	users.username
	FROM posts
	INNER JOIN users ON users.id = posts.user_id
	INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = 1 AND friend_accept1.accept = 1 AND posts.domain_num = 2
	UNION
	SELECT
	posts.author,
	posts.body,
	posts.title,
	users.id AS userID,
	users.username
	FROM posts
	INNER JOIN users ON users.id = posts.user_id
	INNER JOIN friend_accept1 ON users.id = friend_accept1.user2_id WHERE friend_accept1.user1_id = 1 AND friend_accept1.accept = 1 AND posts.domain_num = 2
	UNION
	SELECT
	posts.author,
	posts.body,
	posts.title,
	users.id AS userID,
	users.username
	FROM posts
	INNER JOIN users ON users.id = posts.user_id
	INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user1_id = 1 AND friend_accept1.accept = 1 AND posts.domain_num = 2
	UNION
	SELECT
	posts.author,
	posts.body,
	posts.title,
	users.id AS userID,
	users.username
	FROM posts
	INNER JOIN users ON users.id = posts.user_id
	INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = 1 AND friend_accept1.accept = 1 AND posts.domain_num = 2';
	
	'((SELECT posts.author, posts.id, posts.title, posts.body, posts.publish_date, users.id as userID
	FROM posts
	INNER JOIN users
	ON posts.user_id = users.id
	INNER JOIN friend_accept1
	ON friend_accept1.user1_id = users.id WHERE user2_id = 1 AND friend_accept1.accept = 1 AND posts.domain_num = 2)
	UNION
	(SELECT posts.author, posts.id, posts.title, posts.body, posts.publish_date, users.id as userID
	FROM posts
	INNER JOIN users
	ON posts.user_id = users.id
	INNER JOIN friend_accept1
	ON friend_accept1.user2_id = users.id WHERE user1_id = 1 AND friend_accept1.accept = 1 AND posts.domain_num = 2))
	UNION
	((SELECT posts.author, posts.id, posts.title, posts.body, posts.publish_date, users.id as userID
	FROM posts
	INNER JOIN users
	ON posts.user_id = users.id
	INNER JOIN friend_accept1
	ON friend_accept1.user1_id = users.id WHERE user2_id = 1 AND friend_accept1.accept = 1 AND posts.domain_num = 2)
	UNION
	(SELECT posts.author, posts.id, posts.title, posts.body, posts.publish_date, users.id as userID
	FROM posts
	INNER JOIN users
	ON posts.user_id = users.id
	INNER JOIN friend_accept1
	ON friend_accept1.user2_id = users.id WHERE user1_id = 1 AND friend_accept1.accept = 1 AND posts.domain_num = 2));'

	// '(SELECT users.username, posts.author, posts.id, posts.title, posts.body, posts.publish_date
	// FROM users,posts,friend_accept1
	// WHERE users.id = posts.user_id
	// AND users.id = friend_accept1.user2_id
	// AND friend_accept1.user1_id = '.$user2id.'
	// AND friend_accept1.accept = 1
	// AND posts.domain_num = 2)
	// UNION
	// (SELECT users.username, posts.author, posts.id, posts.title, posts.body, posts.publish_date
	// FROM users,posts,friend_accept2
	// WHERE users.id = posts.user_id
	// AND users.id = friend_accept2.user2_id
	// AND friend_accept2.user1_id = '.$user2id.'
	// AND friend_accept2.accept = 1
	// AND posts.domain_num = 2)
	// UNION
	// (SELECT users.username, posts.author, posts.id, posts.title, posts.body, posts.publish_date
	// FROM users,posts,friend_accept2
	// WHERE users.id = posts.user_id
	// AND users.id = friend_accept2.user2_id
	// AND friend_accept2.user2_id = '.$user2id.'
	// AND friend_accept2.accept = 1
	// AND posts.domain_num = 2)
	// UNION
	// (SELECT users.username, posts.author, posts.id, posts.title, posts.body, posts.publish_date
	// FROM users,posts,friend_accept2
	// WHERE users.id = posts.user_id
	// AND users.id = friend_accept2.user2_id
	// AND friend_accept2.user2_id = '.$user2id.'
	// AND friend_accept2.accept = 1
	// AND posts.domain_num = 2)';

	$query3 = '(SELECT users.username, posts.author, posts.id, posts.title, posts.body, posts.publish_date
	FROM users,posts,friend_accept1
	WHERE users.id = posts.user_id
	AND users.id = friend_accept1.user2_id
	AND friend_accept1.user1_id = '.$user2id.'
	AND friend_accept1.accept=1
	AND posts.domain_num=3)
	UNION
	(SELECT users.username, posts.author, posts.id, posts.title, posts.body, posts.publish_date
	FROM users,posts,friend_accept2
	WHERE users.id = posts.user_id
	AND users.id = friend_accept2.user2_id
	AND friend_accept2.user1_id = '.$user2id.'
	AND friend_accept2.accept=1
	AND posts.domain_num=3)
	UNION
	(SELECT users.username, posts.author, posts.id, posts.title, posts.body, posts.publish_date
	FROM users,posts,friend_accept2
	WHERE users.id = posts.user_id
	AND users.id = friend_accept2.user2_id
	AND friend_accept2.user2_id = '.$user2id.'
	AND friend_accept2.accept=1
	AND posts.domain_num=3)
	UNION
	(SELECT users.username, posts.author, posts.id, posts.title, posts.body, posts.publish_date
	FROM users,posts,friend_accept2
	WHERE users.id = posts.user_id
	AND users.id = friend_accept2.user2_id
	AND friend_accept2.user2_id = '.$user2id.'
	AND friend_accept2.accept=1
	AND posts.domain_num=3)';

	$queryd = '(SELECT users.username, posts.author, posts.id, posts.title, posts.body, posts.publish_date
	FROM users,posts,friend_accept1
	WHERE users.id = posts.user_id
	AND users.id = friend_accept1.user2_id
	AND friend_accept1.user1_id = '.$user2id.'
	AND friend_accept1.accept=1
	AND posts.domain_num=4)
	UNION
	(SELECT users.username, posts.author, posts.id, posts.title, posts.body, posts.publish_date
	FROM users,posts,friend_accept2
	WHERE users.id = posts.user_id
	AND users.id = friend_accept2.user2_id
	AND friend_accept2.user1_id = '.$user2id.'
	AND friend_accept2.accept=1
	AND posts.domain_num=4)
	UNION
	(SELECT users.username, posts.author, posts.id, posts.title, posts.body, posts.publish_date
	FROM users,posts,friend_accept2
	WHERE users.id = posts.user_id
	AND users.id = friend_accept2.user2_id
	AND friend_accept2.user2_id = '.$user2id.'
	AND friend_accept2.accept=1
	AND posts.domain_num=4)
	UNION
	(SELECT users.username, posts.author, posts.id, posts.title, posts.body, posts.publish_date
	FROM users,posts,friend_accept2
	WHERE users.id = posts.user_id
	AND users.id = friend_accept2.user2_id
	AND friend_accept2.user2_id = '.$user2id.'
	AND friend_accept2.accept=1
	AND posts.domain_num=4)';


	// $querya = 'SELECT * FROM posts WHERE domain_num = 1 ORDER BY publish_date DESC';
	$queryb = 'SELECT * FROM posts WHERE domain_num = 2 ORDER BY publish_date DESC';
	$queryc = 'SELECT * FROM posts WHERE domain_num = 3 ORDER BY publish_date DESC';
	$queryd = 'SELECT * FROM posts WHERE domain_num = 4 ORDER BY publish_date DESC';

	$usersessionid = $_SESSION['userId'];

	// $querye = 'SELECT * FROM users WHERE id != '.$usersessionid;

	// $queryf = 'SELECT * FROM friend_accept WHERE (user2_id = '.$user2id.' OR user1_id = '.$user2id.') AND accept = 1';

	// $querye = 'SELECT * FROM users WHERE users.id != '.$user2id.' AND NOT EXISTS (SELECT * FROM friend_accept1 WHERE friend_accept1.user1_id = users.id or friend_accept1.user2_id = users.id AND users.id != '.$user2id.')';
	$querye = 'SELECT * FROM users WHERE users.id != '.$user2id.' AND (NOT EXISTS (SELECT * FROM friend_accept1 WHERE (users.id = friend_accept1.user1_id AND friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1) OR (users.id = friend_accept1.user2_id AND friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1)))';

	// Result
	$result = mysqli_query($conn, $query);
	$result2 = mysqli_query($conn, $query2);

	$resulta = mysqli_query($conn, $querya);
	$resultb = mysqli_query($conn, $queryb);
	$resultc = mysqli_query($conn, $queryc);
	$resultd = mysqli_query($conn, $queryd);

	$resulte = mysqli_query($conn, $querye);
	// $resultf = mysqli_query($conn, $queryf);

	// Fetch Data
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$comments = mysqli_fetch_all($result2, MYSQLI_ASSOC);

	$workposts = mysqli_fetch_all($resulta, MYSQLI_ASSOC);
	$socialposts = mysqli_fetch_all($resultb, MYSQLI_ASSOC);
	$schoolposts = mysqli_fetch_all($resultc, MYSQLI_ASSOC);
	$familyposts = mysqli_fetch_all($resultd, MYSQLI_ASSOC);

	$users = mysqli_fetch_all($resulte, MYSQLI_ASSOC);
	// $connects = mysqli_fetch_all($resultf, MYSQLI_ASSOC);

		// foreach($users as $user) :
		// print_r($user['username']);
		// echo '<br>';
		// endforeach;

	// var_dump($posts);

	// Free Result
	mysqli_free_result($result);
	mysqli_free_result($result2);
	mysqli_free_result($resulta);
	mysqli_free_result($resultb);
	mysqli_free_result($resultc);
	mysqli_free_result($resultd);
	mysqli_free_result($resulte);
	// mysqli_free_result($resultf);

	if(isset($_POST['sub-post'])){
        // Get form data
		$userpost = $_SESSION['userId'];
        $pdomain = mysqli_real_escape_string($conn, $_POST['domain']);
        // $pauthor = mysqli_real_escape_string($conn,$_POST['author']);
        $pauthor = $_SESSION['userName'];
		$ptitle = mysqli_real_escape_string($conn, $_POST['title']);
		$pbody = mysqli_real_escape_string($conn, $_POST['body']);
		$domain_num = "";

		if($pdomain == "social"){
			$domain_num = "2";
		} elseif($pdomain == "work"){
			$domain_num = "1";
		} elseif($pdomain == "school"){
			$domain_num = "3";
		} elseif($pdomain == "family"){
			$domain_num = "4";
		}

		$qstatement1 = "INSERT INTO posts(user_id, domain_num, author, title, body) VALUES ('$userpost', '$domain_num', '$pauthor', '$ptitle', '$pbody')";

		if(mysqli_query($conn, $qstatement1)){
			// header('Location: '.ROOT_URL.'');
			header("refresh: 0");
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}
	
	// Close Connection
    mysqli_close($conn);
    
    ?>