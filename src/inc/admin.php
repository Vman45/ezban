<?php
include_once('db.php');

function add_user($username, $passwd) {
# Do you see the XSS here?
echo "Adding [$username] with password [$passwd]<br \>\n";
# Also, don't do this kids...
#	$vulnerable_sql_query = "INSERT INTO user (username,passwd) VALUES ('$username','$passwd');";
#	echo $vulnerable_sql_query;
#	$mycon->exec($vulnerable_sql_query);
# Instead:
        $mycon = condb();
	if($mycon) { # returns false if it failed
		$stmt = $mycon->prepare('INSERT INTO user (username,passwd,disabled) VALUES (:username,:passwd,0);');
		$stmt->bindParam(':username',$username);
		$stmt->bindParam(':passwd',$passwd);
		$stmt->execute();
	} else { # it failed... cope
		echo "FAIL... meh<br />\n";
	}
	$mycon = null;
	return 42; # fake a return so we can echo The Answer
}


function show_user_info($userid){
	echo "<HR />\n$userid\n<br />\n";
}
