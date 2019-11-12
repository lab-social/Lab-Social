<?php 

// include ('config/db.php');

	$user2id = $_SESSION['userId'];
	
	$query = 'SELECT
		posts.id,
		posts.domain_num,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 1 AND friend_accept1.work = 1
		UNION
		SELECT
		posts.id,
		posts.domain_num,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user2_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 1 AND friend_accept1.work = 1
		UNION
		SELECT
		posts.id,
		posts.domain_num,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 1 AND friend_accept1.work = 1
		UNION
		SELECT
		posts.id,
		posts.domain_num,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 1 AND friend_accept1.work = 1
		UNION
		SELECT
		posts.id,
		posts.domain_num,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 2 AND friend_accept1.social = 1
		UNION
		SELECT
		posts.id,
		posts.domain_num,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user2_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 2 AND friend_accept1.social = 1
		UNION
		SELECT
		posts.id,
		posts.domain_num,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 2 AND friend_accept1.social = 1
		UNION
		SELECT
		posts.id,
		posts.domain_num,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 2 AND friend_accept1.social = 1
		UNION
		SELECT
		posts.id,
		posts.domain_num,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 3 AND friend_accept1.school = 1
		UNION
		SELECT
		posts.id,
		posts.domain_num,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user2_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 3 AND friend_accept1.school = 1
		UNION
		SELECT
		posts.id,
		posts.domain_num,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 3 AND friend_accept1.school = 1
		UNION
		SELECT
		posts.id,
		posts.domain_num,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 3 AND friend_accept1.school = 1
		UNION
		SELECT
		posts.id,
		posts.domain_num,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 4 AND friend_accept1.family = 1
		UNION
		SELECT
		posts.id,
		posts.domain_num,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user2_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 4 AND friend_accept1.family = 1
		UNION
		SELECT
		posts.id,
		posts.domain_num,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 4 AND friend_accept1.family = 1
		UNION
		SELECT
		posts.id,
		posts.domain_num,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 4 AND friend_accept1.family = 1
		UNION
			SELECT
			posts.id,
			posts.domain_num,
			posts.author,
			posts.body,
			posts.title,
			posts.publish_date,
			users.id AS userID,
			users.username
			FROM posts
			INNER JOIN users ON users.id = posts.user_id WHERE posts.user_id = '.$user2id.'
			ORDER BY publish_date
			LIMIT 50';

	
	$query2 = 'SELECT * FROM comments ORDER BY publish_date DESC';

	$querya = 'SELECT
		posts.id,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 1 AND friend_accept1.work = 1
		UNION
		SELECT
		posts.id,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user2_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 1 AND friend_accept1.work = 1
		UNION
		SELECT
		posts.id,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 1 AND friend_accept1.work = 1
		UNION
		SELECT
		posts.id,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 1 AND friend_accept1.work = 1
		UNION
			SELECT
			posts.id,
			posts.author,
			posts.body,
			posts.title,
			posts.publish_date,
			users.id AS userID,
			users.username
			FROM posts
			INNER JOIN users ON users.id = posts.user_id WHERE users.id = '.$user2id.' AND posts.domain_num = 1
			ORDER BY publish_date
			LIMIT 50';

	$queryb = 'SELECT
		posts.id,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 2 AND friend_accept1.social = 1
		UNION
		SELECT
		posts.id,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user2_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 2 AND friend_accept1.social = 1
		UNION
		SELECT
		posts.id,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 2 AND friend_accept1.social = 1
		UNION
		SELECT
		posts.id,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 2 AND friend_accept1.social = 1
		UNION
			SELECT
			posts.id,
			posts.author,
			posts.body,
			posts.title,
			posts.publish_date,
			users.id AS userID,
			users.username
			FROM posts
			INNER JOIN users ON users.id = posts.user_id WHERE users.id = '.$user2id.' AND posts.domain_num = 2
			ORDER BY publish_date
			LIMIT 50';

	$queryc = 'SELECT
		posts.id,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 3 AND friend_accept1.school = 1
		UNION
		SELECT
		posts.id,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user2_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 3 AND friend_accept1.school = 1
		UNION
		SELECT
		posts.id,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 3 AND friend_accept1.school = 1
		UNION
		SELECT
		posts.id,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 3 AND friend_accept1.school = 1
		UNION
			SELECT
			posts.id,
			posts.author,
			posts.body,
			posts.title,
			posts.publish_date,
			users.id AS userID,
			users.username
			FROM posts
			INNER JOIN users ON users.id = posts.user_id WHERE users.id = '.$user2id.' AND posts.domain_num = 3
			ORDER BY publish_date
			LIMIT 50';

	$queryd = 'SELECT
		posts.id,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 4 AND friend_accept1.family = 1
		UNION
		SELECT
		posts.id,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user2_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 4 AND friend_accept1.family = 1
		UNION
		SELECT
		posts.id,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 4 AND friend_accept1.family = 1
		UNION
		SELECT
		posts.id,
		posts.author,
		posts.body,
		posts.title,
		posts.publish_date,
		users.id AS userID,
		users.username
		FROM posts
		INNER JOIN users ON users.id = posts.user_id
		INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 4 AND friend_accept1.family = 1
		UNION
			SELECT
			posts.id,
			posts.author,
			posts.body,
			posts.title,
			posts.publish_date,
			users.id AS userID,
			users.username
			FROM posts
			INNER JOIN users ON users.id = posts.user_id WHERE users.id = '.$user2id.' AND posts.domain_num = 4
			ORDER BY publish_date
			LIMIT 50';

	$querye = 'SELECT * FROM users WHERE users.id != '.$user2id.' AND (NOT EXISTS (SELECT * FROM friend_accept1 WHERE (users.id = friend_accept1.user1_id AND friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1) OR (users.id = friend_accept1.user2_id AND friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1)))';

	// Result
	$result = mysqli_query($conn, $query);
	$result2 = mysqli_query($conn, $query2);
	$resulta = mysqli_query($conn, $querya);
	$resultb = mysqli_query($conn, $queryb);
	$resultc = mysqli_query($conn, $queryc);
	$resultd = mysqli_query($conn, $queryd);
	$resulte = mysqli_query($conn, $querye);

	// Fetch Data
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$comments = mysqli_fetch_all($result2, MYSQLI_ASSOC);
	$workposts = mysqli_fetch_all($resulta, MYSQLI_ASSOC);
	$socialposts = mysqli_fetch_all($resultb, MYSQLI_ASSOC);
	$schoolposts = mysqli_fetch_all($resultc, MYSQLI_ASSOC);
	$familyposts = mysqli_fetch_all($resultd, MYSQLI_ASSOC);
	$users = mysqli_fetch_all($resulte, MYSQLI_ASSOC);


	// Free Result
	mysqli_free_result($result);
	mysqli_free_result($result2);
	mysqli_free_result($resulta);
	mysqli_free_result($resultb);
	mysqli_free_result($resultc);
	mysqli_free_result($resultd);
	mysqli_free_result($resulte);
	// mysqli_free_result($resultImg);



	
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
		 $qstatement1 = "INSERT INTO posts (user_id, domain_num, author, title, body) VALUES (?, ?, ?, ?, ?)";
	
		$stmtq = mysqli_stmt_init($conn);
                
		if(!mysqli_stmt_prepare($stmtq, $qstatement1)) {
			// error sql error
			$msg = 'sql error';
			$msgClass = 'reg-dang';
			$msgButton = 2;
		} else {
			
			mysqli_stmt_bind_param($stmtq, "sssss",$userpost, $domain_num, $pauthor, $ptitle, $pbody);
			mysqli_stmt_execute($stmtq);

			header("refresh: 0");
		} 
	}

	if(isset($_POST['submit-mail'])) {
    $email = htmlspecialchars($_POST['update-email']);
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo "please enter a valid email";
    } else {
        $sql = "INSERT INTO mail_list (email) VALUE (?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                 echo "sql error";
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $email);
                    mysqli_stmt_execute($stmt);
                }
            }
} ?>