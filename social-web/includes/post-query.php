<?php

include ('config/db.php');

	// get ID
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$id2 = mysqli_real_escape_string($conn, $_GET['id']);
	
	$_SESSION['pst_cmt'] = $id;
	
	// Create Query
	$query = 'SELECT * FROM posts WHERE id = '.$id;
	$query2 = 'SELECT * FROM comments WHERE post_id = '.$id.' ORDER BY publish_date DESC';
	$query3 = 'SELECT * FROM  users WHERE id = '.$id2;

	// Get Result
	$result = mysqli_query($conn, $query);
	$result2 = mysqli_query($conn, $query2);
	$result3 = mysqli_query($conn, $query3);

	// Fetch Data
	$post = mysqli_fetch_assoc($result);
	$comments = mysqli_fetch_all($result2, MYSQLI_ASSOC);
	$user = mysqli_fetch_assoc($result3);

	//var_dump($posts);

	// Free Result
	mysqli_free_result($result);
	mysqli_free_result($result2);
	mysqli_free_result($result3);

	$msg = '';
    $msgClass = '';
    $msgButton = 0;

    $author = $_SESSION['userName'];
    $userid1 = $_SESSION['userId'];
    $postid1 = $_SESSION['pst_cmt'];

    // $userid2 = $_SESSION['requestId'];
    // $req_sender = $_SESSION['userName'];
    // $userid2 = $user['id'];
    // $userid2 = htmlspecialchars($_POST['req-user1']);



if(isset($_POST['sub-comment'])) {

    $commenttext = htmlspecialchars($_POST['cmt-request']);
    // $userid2 = htmlspecialchars($_POST['req-user1']);


    if(empty($commenttext)) {
        // error fill in all fields
        $msg = 'please write a comment.';
        $msgClass = 'reg-dang';
        $msgButton = 2;

    } else {

        $sql = "INSERT INTO comments (post_id, user_id, author, body) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            // error sql error
            $msg = 'sql error';
            $msgClass = 'reg-dang';
            $msgButton = 2;
        } else {
            mysqli_stmt_bind_param($stmt, "ssss", $postid1, $userid1, $author, $commenttext);
            mysqli_stmt_execute($stmt);

    // success 
    $msg = 'comment posted';
    $msgClass = 'reg-success';
    $msgButton = 1;

        }
	}
	
	header("refresh: 0");

}
	// Close Connection
	mysqli_close($conn);
?>