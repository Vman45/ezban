<?php
include_once('db.php');

function ban($StartIP,$EndIP,$Description,$Expires,$days_to_ban,$InfoURL) {
        $mycon = condb();
        if($mycon) { # returns false if it failed
                $stmt = $mycon->prepare('INSERT INTO banranges (StartIP,EndIP,Description,Expires,days_to_ban,InfoURL) VALUES (:StartIP,:EndIP,:Description,:Expires,:days_to_ban,:InfoURL);');
                $stmt->bindParam(':StartIP',$StartIP);
                $stmt->bindParam(':EndIP',$EndIP);
                $stmt->bindParam(':Description',$Description);
                $stmt->bindParam(':InfoURL',$InfoURL);
                $stmt->bindParam(':Expires',$Expires);
                $stmt->bindParam(':days_to_ban',$days_to_ban);
                $stmt->execute();
        } else { # it failed... cope
                echo "FAIL... meh<br />\n";
        }
        $mycon = null;
}

function show_banlist() {
	$mycon = condb();
	if($mycon) { #returns false if failed
		$stmt = $mycon->prepare('SELECT StartIP FROM banranges;');
		$stmt->execute();
		while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
			echo($result['StartIP']);
			print("\n");
		}
	} else { # oops, it failed to connect to the db for some reason...
		echo "DB Connection Failed!\n";
	}

}
