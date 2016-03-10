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

$db = new db();
$db->connect();

$multisql = file_get_contents(dirname($_SERVER['SCRIPT_FILENAME']).'/createdb.sql');
$sql = explode("//", $multisql);
for ($i=0; $i<count($sql); ++$i) {
	if (!$db->query($sql[$i])) {
		echo 'ERROR in SQL ['.$sql[$i].': '.$link->error;
	} else {
		echo 'SQL Executed OK: '.$sql[$i];
	}
	echo '<hr>';
}

$db = NULL;
?>
<br><br>
<a href='setup.php'>Back to setup</a>
</div>

</div>

<?php include('../includes/footer.php'); ?>
