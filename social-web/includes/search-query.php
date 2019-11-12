<?php
if (isset($_POST['submit-search'])) {
    $search99 = mysqli_real_escape_string($conn, $_POST['search']); 
    $sql99 = "SELECT * FROM posts WHERE title LIKE '%$search99%' OR author LIKE '%$search99%' OR body LIKE '%$search99%'";
    $result99 = mysqli_query($conn, $sql99);
    $srchrslts = mysqli_fetch_all($result99, MYSQLI_ASSOC);
    mysqli_free_result($result99);
}
?>