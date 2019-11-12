<?php

    $msg = '';
    $msgClass = '';
    $msgButton = 0;

if(isset($_POST['message-submit'])) {

    $msgsender = $_SESSION['userName'];
    $msgsenderid = $_SESSION['userId'];
    $msgreciever = htmlspecialchars($_POST['reciever']);
    $msgrecieverid = htmlspecialchars($_POST['recieverid']);
    // $msgreciever = htmlspecialchars($_GET['username']);
    // $msgrecieverid = htmlspecialchars($_GET['id']);
    // $msgreciever = mysqli_real_escape_string($conn, $_GET['username']);
	// $msgrecieverid = mysqli_real_escape_string($conn, $_GET['id']);
    $msgsubject = htmlspecialchars($_POST['msgsubject']);
    $msgbody = htmlspecialchars($_POST['msgbody']);
    $msguniq = uniqid('', true);
    $msginbox=0;
    $msgoutbox=1;
 
    if(empty($msgsubject)) {
        // error fill in all fields
        $msg = 'Please include a subject.';
        $msgClass = 'reg-dang';
        $msgButton = 2;

    } else {
        // $sql = "INSERT INTO messages (sender, subject, body) VALUES (?, ?, ?)";
        // $stmt = mysqli_stmt_init($conn);
        // if(!mysqli_stmt_prepare($stmt, $sql)) {
        //     // error sql error
        //     $msg = 'sql error1';
        //     $msgClass = 'reg-dang';
        //     $msgButton = 2;
        // } else {
        //     mysqli_stmt_bind_param($stmt, "sss", $msgsender, $msgsubject, $msgbody);
        //     mysqli_stmt_execute($stmt);
        //     // success 
        //     $msg = 'message sent';
        //     $msgClass = 'reg-success';
        //     $msgButton = 1;
        // }
        $msgquery = "INSERT INTO messages (sender, sender_id, reciever, reciever_id, title, body, uni_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
	
		$stmtmsg = mysqli_stmt_init($conn);
                
		if(!mysqli_stmt_prepare($stmtmsg, $msgquery)) {
			// error sql error
			$msg = 'sql error';
			$msgClass = 'reg-dang';
			$msgButton = 2;
		} else {
			mysqli_stmt_bind_param($stmtmsg, "sssssss", $msgsender, $msgsenderid, $msgreciever, $msgrecieverid, $msgsubject, $msgbody, $msguniq);
			mysqli_stmt_execute($stmtmsg);
        }

        // $query234 = 'SELECT id FROM messages WHERE sender_id = '.$_SESSION['userId'].' AND title = '.$msgsubject;
        // $result234 = mysqli_query($conn, $query234);
        // $msgrow = mysqli_fetch_assoc($result234);
        // mysqli_free_result($result234);
        // $msg_id = $msgrow['id'];

        print_r($msg_id);

		$mailboxquery1 = "INSERT INTO mailboxes (username, user_id, mailbox, title, uni_id) VALUES (?, ?, ?, ?, ?)";
		$stmtmailbox1 = mysqli_stmt_init($conn);       
		if(!mysqli_stmt_prepare($stmtmailbox1, $mailboxquery1)) {
			// error sql error
			$msg = 'sql error';
			$msgClass = 'reg-dang';
			$msgButton = 2;
		} else {
			mysqli_stmt_bind_param($stmtmailbox1, "sssss", $msgsender, $msgsenderid, $msgoutbox, $msgsubject, $msguniq);
			mysqli_stmt_execute($stmtmailbox1);
        } 

		$mailboxquery2 = "INSERT INTO mailboxes (username, user_id, mailbox, title, uni_id) VALUES (?, ?, ?, ?, ?)";
		$stmtmailbox2 = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmtmailbox2, $mailboxquery2)) {
			// error sql error
			$msg = 'sql error';
			$msgClass = 'reg-dang';
			$msgButton = 2;
		} else {
			mysqli_stmt_bind_param($stmtmailbox2, "sssss", $msgreciever, $msgrecieverid, $msginbox, $msgsubject, $msguniq);
			mysqli_stmt_execute($stmtmailbox2);
			// echo "one";
			// header("refresh: 3");
			// header("Location: friends.php");
            // echo "two";
            $msg = 'message sent';
            $msgButton = 1;

        } 

    }
    mysqli_close($conn);

}