<?php 
include('../includes/header.php');

echo $header_html;
echo $header_head;

$email = htmlspecialchars($_GET['email']);
?>

<script type="text/javascript" src="../includes/validatePassword.js"></script>
<script type="text/javascript">

function validateForm(oForm)
{
	if (!validatePassword(oForm["txtPassword"].value, oForm["txtPassword_Confirm"].value))
		return false;

	document.body.style.cursor = 'wait';
}

</script>

<?php echo $header_body; ?>

<div id="page">
<div class="post">

<form name="frmPasswordReset" action="register_send_activation_submit.php" onsubmit="return validateForm(this)" method="GET">
Enter your email address below to send the account activation email<br>
<input type="text" name="email" size="50" maxlength="255" value="<?php echo $email?>"><br>
<Br>
<input type="submit" name="btnSubmit" value="Continue">
</form>


</div>
</div>

<?php include('../includes/footer.php'); ?>
