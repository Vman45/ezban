<?php 

function con() {
echo "Connect here!";
}


function condb() {
	$user = 'root';
	$password = 'root';
	$db = 'ezban';
	$host = 'localhost';
	$port = 8889;
	try {
		$link = new PDO("mysql:host=$host;dbname=$db", $user, $password);
		// set err mode
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	#	echo "\n\n\n\nconnected!\n\n\n\n<br />";
		return $link;
	} catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	} 
}

function initdb() {
	$vulnerable_sql_query = "INSERT INTO user (username,disabled,passwd) VALUES ('guest',0,'ChangeMe123')";
	$mycon = condb();
	$mycon->exec($vulnerable_sql_query);
}
