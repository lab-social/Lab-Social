<?php


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
    mysqli_close($conn);

}

