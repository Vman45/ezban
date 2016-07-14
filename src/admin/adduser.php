<?php
if (!defined("BASE_PATH")) define('BASE_PATH', isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : substr($_SERVER['PATH_TRANSLATED'],0, -1*strlen($_SERVER['SCRIPT_NAME'])));
include_once(BASE_PATH.'/inc/ezban.php');
include_once(BASE_PATH.'/inc/admin.php');

if (isset($_POST['submitted'])) {
	$userid = NULL;
	$username = $_POST['uname'];
	$passwd = $_POST['passwd'];

	$userid = add_user($username, $passwd);

	show_user_info($userid);
}

?>
<HTML>
<BODY>
<form method="POST">
Add a user:<br />
User Name: <input type="text" name="uname"><br />
Password: <input type="password" name="passwd"><br />
<input type="hidden" value="TRUE" name="submitted">
<input type="submit"><br />
</form>
</BODY>
</HTML>
