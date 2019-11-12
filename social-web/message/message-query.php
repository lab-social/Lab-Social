<?php 
 $msgsender = $_SESSION['userId'];
 $msgsenderid = $_SESSION['userName'];

	if(isset($_POST['message-submit'])){

		$msgsubject = htmlspecialchars($conn, $_POST['msgsubject']);
		$msgbody = htmlspecialchars($conn, $_POST['msgbody']);

		$msgquery = "INSERT INTO messages (sender, sender_id, subject, body) VALUES (?, ?, ?, ?)";

		$stmtmsg = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmtmsg, $msgquery)) {
			// error sql error
			$msg = 'sql error';
			$msgClass = 'reg-dang';
			$msgButton = 2;
		} else {
			mysqli_stmt_bind_param($stmtmsg, "ssss", $msgsender, $msgsenderid, $msgsubject, $msgbody);
			mysqli_stmt_execute($stmtmsg);
			// echo "one";
			// header("refresh: 3");
			header("Location: messages.php");
			// echo "two";
        }
            mysqli_close($conn);
	}
?>