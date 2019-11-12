<?php

$myId = $_SESSION['userId'];

$queryIn = 'SELECT * FROM messages WHERE reciever_id = '.$myId.' AND status = 0';
$queryOut = 'SELECT * FROM messages WHERE sender_id = '.$_SESSION{'userId'};

$resultIn = mysqli_query($conn, $queryIn);
$resultOut = mysqli_query($conn, $queryOn);

$inmessages = mysqli_fetch_all($resultIn, MYSQLI_ASSOC);
$outmesages = mysqli_fetch_all($resultOut, MYSQLI_ASSOC);\

mysqli_free_result($resultIn);
mysqli_free_result($resultOut);

if(isset($_POST['message-read'])){
		// Get form data
		$messageid = mysqli_real_escape_string($conn,$_POST['msg-id']);
		$messagesubject = mysqli_real_escape_string($conn,$_POST['msg-subject']);
		$senderid = mysqli_real_escape_string($conn,$_POST['sender-id']);
		$recieverid = mysqli_real_escape_string($conn,$_POST['reciever-id']);
		$uniqueid = mysqli_real_escape_string($conn,$_POST['unique-id']);
        $inbox = 'inbox';
        $outbox = 'outbox';

		$queryP = "UPDATE messages SET 
					status=1 
					WHERE id = {$messageid}";

		$queryQ = "UPDATE mailboxes SET 
                    status=1,
					message_id = '$messageid'
					WHERE uni_id = '$uniqueid'";
                    
		$queryR = "UPDATE mailboxes SET 
                    status=1,
					message_id = '$messageid'
					WHERE uni_id = '$uniqueid'";

		if(mysqli_query($conn, $queryP) && mysqli_query($conn, $queryQ) && mysqli_query($conn, $queryR)){
			header('Location: messages.php');
			// header('Location: '.ROOT_URL.'friends.php');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}

?>