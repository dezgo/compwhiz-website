<?php 
include('../includes/header.php');

echo $header_html;
echo $header_head;
echo $header_body;
?>

<div id="page">

<?php 
if (isset($_SESSION['Email'])) { 
	echo "Success! You are now logged in as ".$_SESSION['Email'];
}
else 
{
	echo "You still appear to be not logged in, something went wrong with the session....weird. You are in the database though.";
}
?>
</div>

<?php include('../includes/footer.php'); ?>
