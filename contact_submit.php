<?php 
include('includes/header.php');

echo $header_html;
echo $header_head;
echo $header_body;

echo '<div id="page">';
echo '<div class="post">';

use \google\appengine\api\mail\Message;

$custname = $_POST["custname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["Address"];
$devicetype = $_POST["devicetype"];
$os = $_POST["os"];
$issue = $_POST["issue"];
$calltime = $_POST["calltime"];

date_default_timezone_set('Australia/ACT');

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

try
{
	$message          = new Message();
	$message->setSender("mail@computer-whiz.appspotmail.com");
	$message->addTo("mail@computerwhiz.com.au");
	$message->setSubject("Website Enqury from ".$custname);
	$message->setHtmlBody($body);


	$message->send();
  echo "Message sent!";
} catch (InvalidArgumentException $e) {
  echo "Error sending email: ".$e;
}

echo '</div></div>';

if ($debug)
	echo $body;
?>

<?php include('includes/footer.php'); ?>
