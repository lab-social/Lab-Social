<?php
include('includes/head2.php');
include('includes/posts-query.php');
?>
<?php
include('includes/headhtml.php');
include('includes/navheader.php');
?>
<!-- body content here -->
<?php
if(isset($_SESSION['userId'])) {
include('includes/action-bar-work.php');
include('includes/posts-work.php');
} else {
include('includes/frontpage.php');
}
?>
<?php
include('includes/footer.php');
?>