<?php 
include('../includes/header.php');
include('../db/db_queries.php');

echo $header_html;
echo $header_head;
?>

<script type="text/javascript" src="../includes/validatePassword.js"></script>
<script type="text/javascript">

function validateForm(oForm)
{
	if (!validatePassword(oForm["txtPassword"].value, oForm["txtPassword_Confirm"].value))
		return false;
}

</script>

<?php echo $header_body; ?>

<div id="page">
<div class="post">

<?php 
$client = new client();
$ok = $client->load_byActivationKey($_GET['code']);
if ($ok == NULL) {
	echo "The link you clicked doesn't correspond to anyone in the database.<Br>";
	echo "<BR>";
	echo "<a href='reset_password_request.php?email'>Click here</a> to retry the password reset process.";	
} else {
?>

<form name="frmResetPassword" action="reset_password_action_submit.php" onsubmit='return validateForm(this)' method='post'>
<table>
<tr>
	<td>New Password</td>
	<td><input type="password" name="txtPassword" size="50"></td>
</tr>
<tr>
	<td>Confirm Password</td>
	<td><input type="password" name="txtPassword_Confirm" size="50"></td>
</tr>
</table>
<Br>
<input type="hidden" name="txtCode" value="<?php echo $_GET['code'] ?>">
<input type="button" name="btnCheck" value="Check" onclick="alert validateForm(frmResetPassword)">&nbsp;&nbsp;
<input type="submit" name="btnSubmit" value="Reset">
</form>
<Br>
<small>Note: your password must contain a minimum of 8 characters including at least 1 lowercase, 1 uppercase, and 1 numeric character.</small>

<?php } ?>

</div>
</div>

<?php include('../includes/footer.php'); ?>
