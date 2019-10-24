<?php

// include('includes/post-query.php');

    $msg = '';
    $msgClass = '';
    $msgButton = 0;

    $userid1 = $_SESSION['userId'];
    $userid2 = $_SESSION['requestId'];
    $req_sender = $_SESSION['userName'];
    // $userid2 = $user['id'];
    // $userid2 = htmlspecialchars($_POST['req-user1']);
    $query123 = 'SELECT username FROM users WHERE id = '.$userid2;
	$result123 = mysqli_query($conn, $query123);
	$sendname = mysqli_fetch_assoc($result123);
	mysqli_free_result($result123);


if(isset($_POST['sub-request'])) {

    $requesttext = htmlspecialchars($_POST['msg-request']);
    // $userid2 = htmlspecialchars($_POST['req-user1']);
    $domain_name = htmlspecialchars($_POST['domain']);
    $domain_active = '1' ; 
    if(empty($requesttext)) {
        // error fill in all fields
        $msg = 'Please include a message.';
        $msgClass = 'reg-dang';
        $msgButton = 2;

    } else {
        
        $sql = "INSERT INTO friend_request (user1_id, user2_id, req_sender, body) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            // error sql error
            $msg = 'sql error1';
            $msgClass = 'reg-dang';
            $msgButton = 2;
        } else {
            mysqli_stmt_bind_param($stmt, "ssss", $userid1, $userid2, $req_sender, $requesttext);
            mysqli_stmt_execute($stmt);

            if($domain_name == "social"){
                $sql2 = "INSERT INTO friend_accept1 (user1_id, user2_id, sender, social) VALUES (?, ?, ?, ?)";
            } elseif($domain_name == "work"){
                $sql2 = "INSERT INTO friend_accept1 (user1_id, user2_id, sender, work) VALUES (?, ?, ?, ?)";
            } elseif($domain_name == "school"){
                $sql2 = "INSERT INTO friend_accept1 (user1_id, user2_id, sender, school) VALUES (?, ?, ?, ?)";
            } elseif($domain_name == "family"){
                $sql2 = "INSERT INTO friend_accept1 (user1_id, user2_id, sender, family) VALUES (?, ?, ?, ?)";
            }
        // $sql2 = "INSERT INTO friend_accept1 (user1_id, user2_id, sender) VALUES (?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt, $sql2)) {
            // error sql error
            $msg = 'sql error2';
            $msgClass = 'reg-dang';
            $msgButton = 2;
        } else {
            mysqli_stmt_bind_param($stmt, "ssss", $userid1, $userid2, $req_sender, $domain_active);
            mysqli_stmt_execute($stmt);

            if($domain_name == "social"){
                $sql2 = "INSERT INTO friend_accept2 (user1_id, user2_id, sender, social) VALUES (?, ?, ?, ?)";
            } elseif($domain_name == "work"){
                $sql2 = "INSERT INTO friend_accept2 (user1_id, user2_id, sender, work) VALUES (?, ?, ?, ?)";
            } elseif($domain_name == "school"){
                $sql2 = "INSERT INTO friend_accept2 (user1_id, user2_id, sender, school) VALUES (?, ?, ?, ?)";
            } elseif($domain_name == "family"){
                $sql2 = "INSERT INTO friend_accept2 (user1_id, user2_id, sender, family) VALUES (?, ?, ?, ?)";
            }

        // $sql2 = "INSERT INTO friend_accept2 (user1_id, user2_id, sender) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt, $sql2)) {
            // error sql error
            $msg = 'sql error3';
            $msgClass = 'reg-dang';
            $msgButton = 2;
        } else {
            mysqli_stmt_bind_param($stmt, "ssss", $userid2, $userid1, $req_sender, $domain_active);
            mysqli_stmt_execute($stmt);

    // success 
    $msg = 'friend request sent';
    $msgClass = 'reg-success';
    $msgButton = 1;

        }
    }
    mysqli_close($conn);

}

}
}