<?php 
	if(isset($_POST['msg-submit'])){

        $msgreciever = mysqli_real_escape_string($conn, $_GET['username']);
        $msgrecieverid = mysqli_real_escape_string($conn, $_GET['id']);
        $msgsender = $_SESSION['userName'];
        $msgsenderid = $_SESSION['userId'];
		$msgsubject = mysqli_real_escape_string($conn, $_POST['msgsubject']);
        $msgbody = mysqli_real_escape_string($conn, $_POST['msgbody']);
        $msginbox = 'inbox';
        $msgoutbox = 'outbox';

        var_dump($msgreciever, $msgrecieverid, $msgsender, $msgsenderid, $msgbody, $msginbox, $msgoutbox);

		$msgquery = "INSERT INTO messages (sender, sender_id, reciever, reciever_id, title, body) VALUES (?, ?, ?, ?, ?, ?)";
	
		$stmtmsg = mysqli_stmt_init($conn);
                
		if(!mysqli_stmt_prepare($stmtmsg, $msgquery)) {
			// error sql error
			$msg = 'sql error';
			$msgClass = 'reg-dang';
			$msgButton = 2;
		} else {
			mysqli_stmt_bind_param($stmtmsg, "ssssss", $msgsender, $msgsenderid, $msgreciever, $msgrecieverid, $msgsubject, $msgbody);
			mysqli_stmt_execute($stmtmsg);
		
        } 

		$mailboxquery1 = "INSERT INTO mailboxes (username, user_id, mailbox) VALUES (?, ?, ?)";
		$stmtmailbox1 = mysqli_stmt_init($conn);       
		if(!mysqli_stmt_prepare($stmtmailbox1, $mailboxquery1)) {
			// error sql error
			$msg = 'sql error';
			$msgClass = 'reg-dang';
			$msgButton = 2;
		} else {
			mysqli_stmt_bind_param($stmtmailbox1, "sss", $msgsender, $msgsenderid, $msgoutbox);
			mysqli_stmt_execute($stmtmailbox1);
        } 


		$mailboxquery2 = "INSERT INTO mailboxes (username, user_id, mailbox) VALUES (?, ?, ?)";
		$stmtmailbox2 = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmtmailbox2, $mailboxquery2)) {
			// error sql error
			$msg = 'sql error';
			$msgClass = 'reg-dang';
			$msgButton = 2;
		} else {
			mysqli_stmt_bind_param($stmtmailbox2, "sss", $msgreciever, $msgrecieverid, $msginbox);
			mysqli_stmt_execute($stmtmailbox2);
			// echo "one";
			// header("refresh: 3");
			header("Location: index.php");
			// echo "two";
        } 
            mysqli_close($conn);
	}
?>
