<?php
include('includes/head2.php');
include('includes/profile-query.php');
?>
<?php
include('includes/headhtml.php');
include('includes/navheader.php');
?>
<!-- body content here -->
<?php
if(isset($_SESSION['userId'])) {
include('includes/action-bar.php');
include('includes/profile-content.php');
} else {
include('includes/frontpage.php');
}
?>
<?php
include('includes/footer.php');
?>


