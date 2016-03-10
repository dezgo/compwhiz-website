<?php 
// redirect back to home page if no email passed in
if (!isset($_POST['txtEmail'])) {
	header("Location: ../index.php");
	exit();
}

include('../includes/header.php');
include('../db/db_queries.php'); 
include('login_common.inc');

$html = "";
$html .= $header_html;
$html .= $header_head;
$html .= $header_body;

$email=$_POST['txtEmail']; 
$password=$_POST['txtPassword']; 

$client = new client();
$bOK = $client->load_byEmail($email);
if ($bOK) { //
	$bOK = $client->checkLogin($email, $password);
}

if ($bOK) {
	if ($client->active == 0) {
		// registered, but not yet activated
		$html .= "<div id='page'>";
		$html .= "<div class='post'>";
		$html .= "You have not yet activated. Click the link in the activation email.<br>";
		$html .= "<BR>";
		$html .= "<a href='register_send_activation_submit.php?email=$email'>Click here</a> if you'd like to get the activation email re-sent<br>";
		$html .= "</div></div>";
	}
	else {
		// Register $myusername, $mypassword and redirect to file "login_success.php"
		$_SESSION['Email'] = $email;
		header("location:login_success.php");
		exit();
	}
}
else {
	$html .= "<div id='page'>";
	$html .= "<div class='post'>";
	$html .= "Wrong Username or Password. <a href='javascript:history.back()'>Try again</a> or "; 
	$html .= "<a href='reset_password_request_submit.php?email=$email'>request a password reset</a>";
	$html .= "</div></div>";
	}
$client = NULL;

echo $html;

include('../includes/footer.php'); 
?>
