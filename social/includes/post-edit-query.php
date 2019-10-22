<?php
	// get ID
	$id = mysqli_real_escape_string($conn, $_GET['id']);
    // $id2 = mysqli_real_escape_string($conn, $_GET['id']);
    
    	// var_dump($id);

	
	// $_SESSION['pst_cmt'] = $id;
	
	// Create Query
	$query = 'SELECT * FROM posts WHERE id = '.$id;

	// Get Result
	$result = mysqli_query($conn, $query);


	// Fetch Data
	$post = mysqli_fetch_assoc($result);


	//var_dump($posts);

	// Free Result
	mysqli_free_result($result);

	$msg = '';
    $msgClass = '';
    $msgButton = 0;

    $author = $_SESSION['userName'];
    $userid1 = $_SESSION['userId'];
    $postid1 = $_SESSION['pst_cmt'];

if(isset($_POST['sub-post-edit'])) {

    $title = htmlspecialchars($_POST['title']);
    $body = htmlspecialchars($_POST['body']);


    if(empty($body)) {
        // error fill in all fields
        $msg = 'please write a comment.';
        $msgClass = 'reg-dang';
        $msgButton = 2;

    } else {

        $sql = "UPDATE posts SET title=?, body=?
                WHERE id = {$id}";
        $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            // error sql error
            $msg = 'sql error';
            $msgClass = 'reg-dang';
            $msgButton = 2;
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $title, $body);
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