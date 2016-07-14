<?php
if (!defined("BASE_PATH")) define('BASE_PATH', isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : substr($_SERVER['PATH_TRANSLATED'],0, -1*strlen($_SERVER['SCRIPT_NAME'])));
include_once(BASE_PATH.'/inc/ezban.php');

if (isset($_POST['submitted'])) {
	$Description = $_POST['Description'];
	$StartIP = $_POST['StartIP'];
	$EndIP = $StartIP;
	$InfoURL = $_POST['InfoURL'];
	if(isset($_POST['expires'])){
		#echo "expires!<br />";
		# pave the way...
		$Expires=1;
		$days_to_ban=$_POST['days_to_ban'];
	} else {
		# Expires wasn't checked, so let's set them up for an "eternal" ban
		$Expires=0;
		$days_to_ban=0; # shouldn't really get used, but easier to set
	}
	ban($StartIP,$EndIP,$Description,$Expires,$days_to_ban,$InfoURL);
	echo "<HR />Ban list update complete.<HR />";
}

?>
<HTML>
<BODY>
<form method="POST">
Ban IP<br /><hr />
IP: <input type="text" name="StartIP"><br />
Description/Reason: <input type="text" name="Description" size=255><br />
URL for more information on ban:<input type="text" name="InfoURL" size=255><br />
Expires:<input type="checkbox" name="expires" value="expires" checked>
Days to ban (if Expires set to Yes):<input type="text" name="days_to_ban"><br />
<input type="hidden" value="TRUE" name="submitted">
<input type="submit"><br />
</form>
</BODY>
</HTML>
