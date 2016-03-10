<?php 
include('includes/header.php');

echo $header_html;
echo $header_head;
echo $header_body;
?>

<div id="page">

	<div class="post">
			<h2 class="title">Must-have applications</h2>
			<p>
				There are a few must-have applications. They save hours, or increase your productivity tenfold. I guess it can be a little subjective, but for my money these are those apps<br>
				<br>

<?php 
function writeItem($pitemLink, $pitemText, $pitemDescription)
{
	echo "<a target='blank' href='".$pitemLink."'>".htmlspecialchars($pitemText)."</a><br>";
	echo nl2br(htmlspecialchars($pitemDescription))."<br>";
	echo "<br>";
}

$itemLink = "http://partners.carbonite.com/computerwhiz-canberra";
$itemText = "Carbonite Online Backup";
$itemDescription = "We are a reseller for this excellent cloud backup solution. Carbonite gives you unlimited backup for each PC it runs on. No more swapping external hard drives.";
writeItem($itemLink, $itemText, $itemDescription);

$itemLink = "https://lastpass.com/";
$itemText = "LassPass";
$itemDescription = "With a thousand and one passwords to remember, all of which should be complex, unique, and change regularly, it's literally impossible to handle without a good password manager... enter lastpass.

Lastpass saves passwords in an encrypted format online. You then enter a 'master' password to open your lastpass vault and retrieve the password. It automatically logs into websites so you can use it like you'd use bookmarks. It's an awesome app.";
writeItem($itemLink, $itemText, $itemDescription);

$itemLink = "http://evernote.com/";
$itemText = "Evernote";
$itemDescription = "My memory. This awesome tool takes care of any information you need to remember. Once a note is loaded in, it can be tagged, moved to a particular notebook, full-text search is available. This app is great.";
writeItem($itemLink, $itemText, $itemDescription);

$itemLink = "http://db.tt/Xbu1WqV";
$itemText = "Dropbox";
$itemDescription = "Cloud hosted drive you can use on any computer you login to. All your data is backed up, even files you delete can be recovered within 30 days of deletion. Previous versions of files are stored. This service is excellent at what it does.";
writeItem($itemLink, $itemText, $itemDescription);

$itemLink = "http://followupthen.com/";
$itemText = "followupthen";
$itemDescription = "Great online service for reminders. It's a simple concept. You get an email, you can't act on it now, but you don't want to forget. Easy! Forward it to followupthen with the date and time you want to be reminded as the recipient. Followupthen will forward it back to you at the time you specified. Simple huh? It's a great tool.";
writeItem($itemLink, $itemText, $itemDescription);

?>

</p>
</div>
</div>

<?php include('includes/footer.php'); ?>
