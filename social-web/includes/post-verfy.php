<?php 

    // Check For Submit
	if(isset($_POST['sub-post'])){
        // Get form data
    
        $pdomain = mysqli_real_escape_string($conn, $_POST['domain']);
        $pauthor = mysqli_real_escape_string($conn,$_POST['author']);
		$ptitle = mysqli_real_escape_string($conn, $_POST['title']);
		$pbody = mysqli_real_escape_string($conn, $_POST['body']);

		$qstatement1 = "INSERT INTO posts(domain_num, author, title, body) VALUES ('$pdomain', '$pauthor', '$ptitle', '$pbody')";

		if(mysqli_query($conn, $qstatement1)){
			header('Location: '.ROOT_URL.'');
			// header('Location: index.php');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}
 ?>