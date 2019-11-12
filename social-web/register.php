<?php
include('includes/head2.php');
include('includes/register-verify.php');
?>
<?php
include('includes/headhtml.php');
include('includes/navheader.php');
?>
<!-- body content here -->
<?php
if(isset($_SESSION['userId'])) {
include('includes/frontpage.php');
} else {
include('includes/action-bar.php');
include('includes/register-content.php');
}
?>
<?php
include('includes/footer.php');
?>