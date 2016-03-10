<?php 
include('includes/header.php');

$custname = $_POST["custname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["Address"];
$devicetype = $_POST["devicetype"];
$os = $_POST["os"];
$issue = $_POST["issue"];
$calltime = $_POST["calltime"];

date_default_timezone_set('Australia/ACT');

require_once('phpmailer/class.phpmailer.php');

$mail             = new PHPMailer();

$body             = file_get_contents('email_content.html');
$body             = str_replace("~custname~", $custname, $body);
$body             = str_replace("~email~", $email, $body);
$body             = str_replace("~phone~", $phone, $body);
$body             = str_replace("~address~", $address, $body);
$body             = str_replace("~devicetype~", $devicetype, $body);
$body             = str_replace("~os~", $os, $body);
$body             = str_replace("~issue~", $issue, $body);
$body             = str_replace("~calltime~", $calltime, $body);
$body             = eregi_replace("[\]",'',$body);

$mail->IsSMTP(); // telling the class to use SMTP
if ($debug)
	$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
else 
	$mail->SMTPDebug  = 1;
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "mail@computerwhiz.com.au";  // GMAIL username
$mail->Password   = "h4RRW2Ae";            // GMAIL password

$mail->SetFrom($email,$custname);
//$mail->SetFrom("website@computerwhiz.com.au","Computer Whiz Website");
$mail->Subject    = "Website Enqury from ".$custname;
$mail->MsgHTML($body);
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$address = "mail@computerwhiz.com.au";
$mail->AddAddress($address, "Computer Whiz Website");

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

echo $header_html;
echo $header_head;
echo $header_body;

echo '<div id="page">';
echo '<div class="post">';

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}

echo '</div></div>';

if ($debug)
	echo $body;
?>

<?php include('includes/footer.php'); ?>
