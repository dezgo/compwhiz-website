<?php 
include('../includes/header.php');
include('login_common.inc');
include('../db/db_queries.php'); 

echo $header_html;
echo $header_head;
echo $header_body;
?>

<div id="page">
<div class="post">

<?php 
$email = $_GET['email'];
$client = new client();
if ($client->load_byEmail($email)) {
	if ($client->active == 0)
	{
		echo "Please activate your account first. <a href='register_send_activation.php?email=$email'>Re-send activation email</a><Br>";
	} else {
		$client->setActivationKey();
		sendPasswordResetEmail($email, $client->code);
	}
} else {
	echo "That email address is not registered. <a href='register.php'>Register it now</a><br>";
}
$client = NULL;

?>
</div>
</div>

<?php include('../includes/footer.php'); ?>
