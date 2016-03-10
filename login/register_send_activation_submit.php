<?php 
include('../includes/header.php');
include('../db/db_queries.php'); 
include('login_common.inc');

echo $header_html;
echo $header_head;
echo $header_body;
?>

<div id="page">

<div class="post">

<?php 
$m_email = $_GET['email'];
sendActivationEmail($m_email)
?>

</div>

</div>

<?php include('../includes/footer.php'); ?>
