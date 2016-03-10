<?php 
include('../includes/header.php');

echo $header_html;
echo $header_head;
echo $header_body;
?>

<script type="text/javascript">
function validateForm(oForm)
{
	if (validateRequired(oForm["email"].value, "Please enter an email address") == false)
		return false;

	if (validateEmail(oForm["email"].value) == false)
		return false;

	document.body.style.cursor = 'wait';
	return true;
}
</script>

<div id="page">
<div class="post">

<form name="frmResetPassword" action="reset_password_request_submit.php" onsubmit='return validateForm(this)' method="get">

Enter the email address you used to register below to receive an email with a link to reset your password.<br>
<input type="text" size="50" name="email"><Br>
<br>
<?php if ($debug) {?>
<input type="button" name="btnCheck" value="Check" onclick="validateForm(frmResetPassword)">&nbsp;&nbsp;
<?php } ?>
<input type="submit" value="Continue">

</form>

</div>
</div>

<?php include('../includes/footer.php'); ?>
