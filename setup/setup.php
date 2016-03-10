<?php 
include('../includes/header.php');

echo $header_html;
echo $header_head;
echo $header_body;
?>

<div id="page">

<div class="post">

<?php 
if (!$debug) {
	die('What are you doing here?!');
}
?>

<ul>
<li><a href='dropdb.php'>Drop Database</a></li>
<li><a href='createdb.php'>Create Database</a></li>
</ul>
</div>

</div>

<?php include('../includes/footer.php'); ?>
