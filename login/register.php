<?php 
include('../includes/header.php');

echo $header_html;
echo $header_head;
echo $header_body;
?>

<script type="text/javascript" src="../includes/validatePassword.js"></script>
<script type="text/javascript">
function validateForm(oForm)
{
	if (validateRequired(oForm["txtFirstname"].value, "Please enter your firstname") == false)
		return false;

	if (validateRequired(oForm["txtLastname"].value, "Please enter your lastname") == false)
		return false;

	if (validateRequired(oForm["txtEmail"].value, "Please enter your email") == false)
		return false;

	if (validateEmail(oForm["txtEmail"].value) == false)
			return false;

	if (!validatePassword(oForm["txtPassword"].value, oForm["txtPassword_Confirm"].value))
		return false;

	var bOK = confirm("Send activation email to " + oForm["txtEmail"].value + "?");
	if (bOK) {
		document.body.style.cursor = 'wait';
		return true;
	} else {
		return false;
	}
}

</script>

<div id="page">

<div class="post">

<h1>Create an account</h1>

<form name="frmLogin" action="register_submit.php" onsubmit='return validateForm(this)' method='post'>
<table>
<tr>
	<td>Firstname&nbsp;<span class='mandatory_star'>*</span></td>
	<td><input type="text" name="txtFirstname" maxlength="50" size="50"></td>
</tr>
<tr>
	<td>Lastname&nbsp;<span class='mandatory_star'>*</span></td>
	<td><input type="text" name="txtLastname" maxlength="50" size="50"></td>
</tr>
<tr>
	<td>Email&nbsp;<span class='mandatory_star'>*</span></td>
	<td><input type="text" name="txtEmail" maxlength="255" size="50"></td>
</tr>
<Tr>
	<td>Password&nbsp;<span class='mandatory_star'>*</span></td>
	<td><input type="password" name="txtPassword" maxlength="20" size="20"></td>
</Tr>
<Tr>
	<td>Re-enter&nbsp;Password&nbsp;<span class='mandatory_star'>*</span></td>
	<td><input type="password" name="txtPassword_Confirm" maxlength="20" size="20"></td>
</Tr>
</table>
<?php if ($debug) {?>
<input type="button" name="btnCheck" value="Check" onclick="alert(validateForm(frmLogin));">&nbsp;&nbsp;
<?php } ?>
<input type="submit" name="btnSubmit" value="Register">
</form>
<Br>
<small>Note: your password must contain a minimum of 8 characters including at least 1 lowercase, 1 uppercase, and 1 numeric character.</small>
</div>

</div>

<?php include('../includes/footer.php'); ?>
