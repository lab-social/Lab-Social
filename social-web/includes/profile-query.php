<?php

include ('config/db.php');

$bquery1 = 'SELECT id, username, firstname, city, state, lastname, about, pic_status FROM users WHERE id = '.$_SESSION['userId'];

$bresult1 = mysqli_query($conn, $bquery1);

$profile = mysqli_fetch_assoc($bresult1);

mysqli_free_result($bresult1);

mysqli_close($conn);


?>