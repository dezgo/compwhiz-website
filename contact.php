<?php 
include('includes/header.php');
include('db/db_queries.php');

if (isset($_SESSION['Email'])) {
	$client = new client();
	$client->load_byEmail($_SESSION['Email']);
	$name = $client->firstname.' '.$client->lastname;
	$email = $_SESSION['Email'];
	$client = NULL;
} else {
	$name = "";
	$email = "";
}

echo $header_html;
echo $header_head;
echo $header_body;
?>

<script type="text/javascript">
function validateForm(oForm)
{
	var sField = oForm["custname"].value;
	if (sField==null || sField=="") {
		alert("Please enter your name");
		return false;
	}

	var sField = oForm["email"].value;
	if (sField==null || sField=="") {
		alert("Please enter your email address");
		return false;
	}

	return validateEmail(sField);
}
</script>


<div id="page">

<div class="post">

<form name='contactForm' action='contact_submit.php' onsubmit='return validateForm(this)' method='post'>
<table>
<tr>
<td>
<table cellpadding="5" cellspacing="0" border="0" width="100%">

<tr>
	<td width="20%">Name&nbsp;<span class='mandatory_star'>*</span></td>
	<td width="80%"><input type="text" name="custname" size="50" value="<?php echo $name?>"></td>
</tr>
<tr>
	<td>Email&nbsp;<span class='mandatory_star'>*</span></td>
	<td><input type="text" name="email" size="50" value="<?php echo $email?>"></td>
</tr>
<tr>
	<td>Phone</td>
	<td><input type="text" name="phone" size="50"></td>
</tr>
<tr>
	<td>Address</td>
	<td><textarea name="Address" rows="3" cols="50"></textarea></td>
</tr>
<tr>
	<td nowrap>Device Type</td>
	<td><input type="text" name="devicetype" size="50"><br>
	e.g. Desktop / Laptop</td>
</tr>
<tr>
	<td>Operating System</td>
	<td><input type="text" name="os" size="50"><br>
	e.g. Windows 7</td>
</tr>
<tr>
	<td nowrap>Description of Issue</td>
	<td><textarea name="issue" rows="15" cols="50"></textarea></td>
</tr>
<tr>
	<td nowrap>Best time to call</td>
	<td><input type="text" name="calltime" size="50"><br>
	e.g. morning, evening, after 7pm</td>
</tr>

</table>
</td>
<td>
<img src='images/business-stress.jpeg' width='330' height='495'>
</td>
</tr>
</table>
<br>
<center>
<input type="submit" value="Get Help Now!">
</center>
</form>
</div>
</div>

<?php include('includes/footer.php'); ?>
