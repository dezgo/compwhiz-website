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
$m_error = false;
$m_firstname = $_POST["txtFirstname"];
$m_lastname = $_POST["txtLastname"];
$m_email = $_POST["txtEmail"];
$m_password = $_POST["txtPassword"];
$m_password_confirm = $_POST["txtPassword_Confirm"];

// lots of work to do here to validate the form data, just in case javascript was switched off - you can never be too careful!
if ($m_firstname == "") {
	echo "Please enter your firstname<Br>";
	$error = true;
}
if ($m_lastname == "") {
	echo "Please enter your lastname<br>";
	$error = true; 
}
if ($m_email == "") {
	echo "Please enter your email address<br>";
	$error = true;
}
if ($m_password == "") {
	echo "Please enter your password<br>";
	$error = true;
}

if ($m_password != $m_password_confirm) {
	echo "Passwords don't match<br>";
	$error = true;
}

if (strlen($m_password) < 8) {
	echo "Your password must be at least 8 characters long<br>";
	$error = true;
}

if (strtoupper($m_password) == $m_password) {
	echo "Your password must include at least 1 lowercase character<br>";
	$error = true;
}

if (strtolower($m_password) == $m_password) {
	echo "Your password must include at least 1 uppercase character<br>";
	$error = true;
}

$string = preg_replace("/[^0-9]/", "",$m_password);
if ($string == "") {
	echo "Your password must include at least 1 number<br>";
	$error = true;
}

if ($m_error) {
	echo "<br>Click Back and try again.";
	exit();
}

// store this in the database first including activation code, and fact that they are currently inactive
$db_query = new db_query();
$active = $db_query->isActive($m_email);

if ($active != NULL) {
	if ($active == 1) {
		echo "It looks like your email address has already been registered. <a href='reset_password_request.php?email=$m_email'>Click here</a> if you'd like to reset your password.";
	} else {
		echo "It looks like you've registered, but have not yet activated. <a href='register_send_activation_submit.php?email=$m_email'>Click here</a> if you'd like to resend the activation email.";
	}
} else {
	
	$client = new client();
	$client->firstname = $m_firstname;
	$client->lastname = $m_lastname;
	$client->email = $m_email;
	if ($client->create()) {
		if ($client->resetPassword($m_password))
			sendActivationEmail($m_email);
		else 
			echo "ERROR: Couldn't save password";
	}
	else
	{
		echo "ERROR: Could not create record in database";
	}
	$client = NULL;
}
?>

</div>
</div>

<?php include('../includes/footer.php'); ?>
