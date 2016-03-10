<?php 
include('../includes/header.php');
include('../db/db_queries.php');

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

$db_query = new db_query();

if (!$db_query->dropDB())
	echo 'ERROR: '.$db_query->error;
else
	echo 'Database dropped';

$db_query = NULL;
?>
<br><br>
<a href='setup.php'>Back to setup</a>
</div>

</div>

<?php include('../includes/footer.php'); ?>
