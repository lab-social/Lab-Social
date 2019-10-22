<?php 
    // Create Query
	$query2 = 'SELECT * FROM comments ORDER BY publish_date DESC';

	// $query2 = 'SELECT * FROM comments';

	// Get Result
	$result2 = mysqli_query($conn, $query2);

	// Fetch Data
	$comments = mysqli_fetch_all($result2, MYSQLI_ASSOC);
	// var_dump($posts);

	// Free Result
	mysqli_free_result($result2);

	// Close Connection
    mysqli_close($conn);
    
    ?>