<?php 
// include ('config/db.php');
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
			mysqli_stmt_bind_param($stmtq, "sssss", $userpost, $domain_num, $pauthor, $ptitle, $pbody);
			mysqli_stmt_execute($stmtq);
			echo "one";
			// header("refresh: 3");
			header("Location: index.php");
			echo "two";

        } 
            mysqli_close($conn);

	}
?>
