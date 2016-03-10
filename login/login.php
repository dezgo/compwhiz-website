<?php 
include('../includes/header.php');

echo $header_html;
echo $header_head;
echo $header_body;
?>

<div id="page">

<div class="post">

<h1>Client Login</h1>

<form name="frmLogin" action="login_check.php" method="post">
<table>
<tr>
	<td>Email</td>
	<td><input type="text" name="txtEmail" maxlength="255" size="50"></td>
</tr>
<Tr>
	<td>Password</td>
	<td><input type="password" name="txtPassword" maxlength="20" size="20"></td>
</Tr>
</table>
<input type="submit" name="btnSubmit" value="Login">
</form>
<br>
<a href='reset_password_request.php'>Forgot Password</a>

</div>


</div>

<?php include('../includes/footer.php'); ?>
