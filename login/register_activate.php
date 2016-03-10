<?php 
include('../includes/header.php');
include('../db/db_queries.php'); 

echo $header_html;
echo $header_head;
echo $header_body;

$code = $_GET['code'];
$client = new client();
$bOK = true;

if ($client->load_byActivationKey($code)) {
	if ($client->activate()) {
		$_SESSION['Email'] = $client->email;
		header("location:login_success.php");
	} else {
		$bOK = false;
	}
} else {
	$bOK = false;
}
?>
<div id="page">
<div class="post">
<?php
if (!$bOK) {
	echo "Activation failed. Either your account is already active, or the activation key is invalid.<br>";
	echo "<br>";
	echo "<a href='register_send_activation.php?email='>Resend the activation key</a> or <a href='password_reset.php'>reset your password</a>.<br>";
}
$db_query = NULL;
?>

</div>
</div>

<?php include('../includes/footer.php'); ?>
