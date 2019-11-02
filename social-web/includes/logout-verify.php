<?php
  if (isset($_POST['logout-sub'])) {
    session_start();
    session_unset();
    session_destroy();
    header("Location: index.php");
  }
?>