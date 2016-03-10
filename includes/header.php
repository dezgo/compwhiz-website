<?php 
switch ($_SERVER['SERVER_NAME']) {
	case '27.124.117.1':
		$g_WR = '/~computer/';
		break;
	default:
		$g_WR = '/';
		break;
}	

//session_save_path("/tmp/session");
session_name("compwhiz");
session_start();
if ($_SERVER["REQUEST_URI"] == $g_WR.'login/logout.php') {
	session_destroy();
	session_start();
	$_SESSION = array();
}

if (isset($_SESSION['Email'])) {
	$debug = ($_SESSION['Email'] == 'derekgg@gmail.com');
} else $debug = false;
	
if ($debug) {
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
}

function playWelcome()
{
	//if (isCurrentPage("index.php") == "")

	if ($_SESSION['played'] == ".")
		$html = "";
	else
		$html = "
			<audio autoplay>
			<source src='".$GLOBALS['g_WR']."audio/welcome.mp3' type='audio/mpeg'>
			</audio>";
	$_SESSION['played'] = ".";
	return $html;
}

function isCurrentPage($sPage)
{
	if (strcmp($_SERVER["REQUEST_URI"], $GLOBALS['g_WR']) == 0 && strcmp($sPage, "index.php") == 0) {
		$sPage = "";
	}
	if (strcmp($_SERVER["REQUEST_URI"], $GLOBALS['g_WR'].$sPage) == 0)
		return "current_page_item";
	else 
		return "";
}

$header_html = "
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 3.0 License

Name       : Dangled  
Description: A two-column, fixed-width design with a dark color scheme.
Version    : 1.0
Released   : 20120807
-->
<html xmlns='http://www.w3.org/1999/xhtml'>
";

$header_head = "
<head>
<meta name='keywords' content='' />
<meta name='description' content='The home of Computer Whiz - Canberra. I specialise in home-user PC issues from malware infections, to new PCs; basically anything your PC can throw at me.' />
<meta http-equiv='content-type' content='text/html; charset=utf-8' />
<title>Computer Whiz - Canberra</title>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />
<link href='".$g_WR."style.css' rel='stylesheet' type='text/css' media='screen' />
<script type='text/javascript' src='".$g_WR."includes/validation.js'></script>
<noscript>
It appears that JavaScript is not enabled in your browser. This website works best when JavaScript is enabled. See <a target='_blank' href='http://support.google.com/adsense/bin/answer.py?hl=en&answer=12654'>http://support.google.com/adsense/bin/answer.py?hl=en&answer=12654</a> for a description of how to enable it.<br>
<br> 
</noscript>
<script type='text/javascript'>

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-35423033-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
";

$header_body = "
</head>
<body>
";
//$header_body .= playWelcome();

$header_body .= "
<div id='wrapper'>

<div id='page'>
<table width='100%'>
<tr>
<td>
";
if ($debug) {
	$header_body .= "<a href='".$g_WR."setup/setup.php'>Setup</a>";
}

$header_body .= "
</Td>
<td style='width:100%' align='right'>
<table>
<tr>
";
/*
if (isset($_SESSION['Email'])) {
			$header_body .= "<td>".$_SESSION['Email']."&nbsp;|&nbsp;</td>";
			$header_body .= "<td><a href='".$g_WR."login/logout.php'>Logout</a></td>";
} else {
			$header_body .= "<td><a href='".$g_WR."login/register.php'>Register</a>&nbsp;|&nbsp;</td>";
			$header_body .= "<td><a href='".$g_WR."login/login.php'>Login</a></td>";
}
*/
$header_body .= "
</tr>
</table>
</td></tr>
</table>
</div>
	<div id='menu'>
		<ul>
			<li class='".isCurrentPage("index.php")."'><a href='".$g_WR."index.php'>Home</a></li>
			<li class='".isCurrentPage("apps.php")."'><a href='".$g_WR."apps.php'>Must-have Apps</a></li>
			<li class='".isCurrentPage("troubleshooting.php")."'><a href='".$g_WR."troubleshooting.php'>PC Troubleshooting</a></li>
			<li class='".isCurrentPage("videos.php")."'><a href='".$g_WR."videos.php'>How-to Videos</a></li>
			<li class='".isCurrentPage("contact.php")."'><a href='".$g_WR."contact.php'>Contact</a></li>
		</ul>
	</div>
	<!-- end #menu -->
	<div id='header'>
		<div id='logo'>
			<h1><a href='#'>Computer Whiz</a>&nbsp;&nbsp;&nbsp;<span>Canberra</span></h1>
		</div>
	</div>
	<!-- end #header -->
";
