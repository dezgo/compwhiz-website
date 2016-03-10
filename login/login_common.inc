<?php 

function sendPasswordResetEmail($p_email) {
	date_default_timezone_set('Australia/ACT');
	
	require_once('../phpmailer/class.phpmailer.php');
	
	// get first and last names from DB
	$client = new client();
	if (!$client->load_byEmail($p_email)) {
		die("ERROR: Can't find $p_email in database");
	}
	
	$mail             = new PHPMailer();
	
	$body             = file_get_contents('reset_password_content.html');
	$body             = str_replace("~url~", $_SERVER['SERVER_NAME'], $body);
	$body             = str_replace("~firstname~", $client->firstname, $body);
	$body             = str_replace("~code~", $client->code, $body);
	$body             = preg_replace('/\\\\/','',$body);
	
	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
	                                           // 1 = errors and messages
	                                           // 2 = messages only
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
	$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
	$mail->Username   = "mail@computerwhiz.com.au";  // GMAIL username
	$mail->Password   = "h4RRW2Ae";            // GMAIL password
	
	$mail->SetFrom("website@computerwhiz.com.au","Computer Whiz Website");
	$mail->Subject    = "Reset your password";
	$mail->MsgHTML($body);
	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	
	$mail->AddAddress($p_email, $client->firstname." ".$client->lastname);
	
	//$mail->AddAttachment("images/phpmailer.gif");      // attachment
	//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
	
	if(!$mail->Send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "An email has been sent to $p_email. When you receive the email, click the link to reset your password.";
	}
}

function sendActivationEmail($p_email) {
	date_default_timezone_set('Australia/ACT');
	
	require_once('../phpmailer/class.phpmailer.php');
	
	// get first and last names from DB
	$client = new client();
	if (!$client->load_byEmail($p_email)) {
		die("ERROR: Can't find email address '$p_email' in database");
	}
	
	$client->setActivationKey();
	
	$mail             = new PHPMailer();
	
	$body             = file_get_contents('register_email_content.html');
	$body             = str_replace("~url~", $_SERVER['SERVER_NAME'].$GLOBALS['g_WR'], $body);
	$body             = str_replace("~firstname~", $client->firstname, $body);
	$body             = str_replace("~code~", $client->code, $body);
	$body             = preg_replace('/\\\\/','',$body);
	
	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
	                                           // 1 = errors and messages
	                                           // 2 = messages only
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
	$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
	$mail->Username   = "mail@computerwhiz.com.au";  // GMAIL username
	$mail->Password   = "h4RRW2Ae";            // GMAIL password
	
	$mail->SetFrom("website@computerwhiz.com.au","Computer Whiz Website");
	$mail->Subject    = "Activate your account";
	$mail->MsgHTML($body);
	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	
	$mail->AddAddress($p_email, $client->firstname." ".$client->lastname);
	
	$client = NULL;
	
	if(!$mail->Send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "An activation email has been sent to $p_email. When you receive the email, click the link to complete the registration process.";
	}
}

?>