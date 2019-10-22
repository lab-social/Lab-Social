<?php

// include('includes/comment-query2.php');

// $id5 = mysqli_real_escape_string($conn, $_GET['id']);
// $_SESSION['pst_cmt'] = $id5;

    $userid1 = $_SESSION['userId'];
    
    // $userid2 = $_SESSION['requestId'];
    // $req_sender = $_SESSION['userName'];
    // $userid2 = $user['id'];

if(isset($_POST['btn-comment'])) {

    $commenta = htmlspecialchars($_POST['btn-cmt']);

        $sql = "INSERT INTO comments (post_id, user_id) VALUES (?, ?)";
        $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            // error sql error
            echo "error";
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $commenta, $userid1);
            mysqli_stmt_execute($stmt);

            // success 
   
        }

        mysqli_close($conn);

    }
   


