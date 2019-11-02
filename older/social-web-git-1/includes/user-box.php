<?php 
	$sqlImg = 'SELECT * FROM profile_img WHERE user_id = '.$picid;

        $resulte = mysqli_query($conn, $sql);
        if (mysqli_num_rows($resulte) > 0) {
            while ($row = mysqli_fetch_assoc($resulte)) {
                $picid = $row['id'];
                $sqlImg = 'SELECT * FROM profile_img WHERE user_id = '.$picid;
                $resultImg = mysqli_query($conn,$sqlImg);
                while ($rowImg = mysqli_fetch_assoc($resultImg)) {
                    echo "<div>";

                    if($rowImg['status'] == 1) {
                        echo "<img src='uploads/profile.".$picid.".jpg'>";
                    } else {
                        echo "<img src='images/testtube.jpg'>";
                    }
                    echo "<div>";
                }
            }
        }

?>