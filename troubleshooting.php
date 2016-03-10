<?php 
include('includes/header.php');

echo $header_html;
echo $header_head;
echo $header_body;
?>

<div id="page">

	<div class="post">
			<h2 class="title">Basic PC Troubleshooting Tools</h2>
			<p>
				Some useful links when troubleshooting PC issues - I use these a lot.<br>
				<br>
				
<?php 
function writeItem($pitemLink, $pitemText, $pitemDescription)
{
	echo "<a target='blank' href='".$pitemLink."'>".htmlspecialchars($pitemText)."</a><br>";
	echo nl2br(htmlspecialchars($pitemDescription))."<br>";
	echo "<br>";
}

$itemLink = "http://stevengould.org";
$itemText = "CleanUp! 4.5.2";
$itemDescription = "Steven Gould's excellent free temporary file cleaner. Removes temporary files - good way to cleanup your PC. Nasties often reside in the temporary files area, so deleting these files is a good way to avoid a nasty infection.";
writeItem($itemLink, $itemText, $itemDescription);

$itemLink = "http://sourceforge.net/projects/hjt/";
$itemText = "HiJackThis";
$itemDescription = "Powerful program that shows you exactly what's running when your Windows PC starts up. Allows you to remove startup items easily. Be careful though, remove the wrong thing and you could cause legitimate programs to stop working!";
writeItem($itemLink, $itemText, $itemDescription);

$itemLink = "http://www.kaspersky.com/au/";
$itemText = "Kaspersky Internet Security Suite";
$itemDescription = "Kaspersky consistently achieves the highest scores in antivirus tests. It is a paid product, but I believe it is a worthwhile investment.";
writeItem($itemLink, $itemText, $itemDescription);

$itemLink = "http://www.microsoft.com/en-us/download/details.aspx?id=17657";
$itemText = "Windows Server 2003 Resource Kit Tools";
$itemDescription = "I use this for Robocopy. It's a great file copy tool - much more reliable than the standard windows copying in Windows Explorer. If you're constantly copying large amounts of data round on your PC, it's well worth taking the time to learn this little gem.";
writeItem($itemLink, $itemText, $itemDescription);

$itemLink = "http://www.malwarebytes.org/";
$itemText = "Malwarebytes Malware Removal Tool";
$itemDescription = "I've found this to be one of the best tools for removing malware around. There are countless scams out there that purport to remove malware, but in fact just infect you and then insist on your paying for the product to remove these so called 'threats'. Malwarebytes is a legitimate piece of software that can find and remove a load of unwanted nasters.";
writeItem($itemLink, $itemText, $itemDescription);
?>
			</p>
	</div>
</div>

<?php include('includes/footer.php'); ?>
