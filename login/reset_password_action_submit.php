<?php 
include('../includes/header.php');
include('../db/db_queries.php');

$client = new client();
$client->load_byActivationKey($_POST['txtCode']);
if ($client->resetPassword($_POST['txtPassword'])) {
	session_destroy();
	session_start();
	$_SESSION = array();
	$_SESSION['Email'] = $client->email;
	$client->clearActivationKey();
	header("Location: reset_password_success.php");
} else {
	$msg = "An error occurred while trying to reset your password";
}
$client = NULL;

echo $header_html;
echo $header_head;
echo $header_body;
?>

<div id="page">
<div class="post">

<?php echo $msg ?>

</div>
</div>

<?php include('../includes/footer.php'); ?>
