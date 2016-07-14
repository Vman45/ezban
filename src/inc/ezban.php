<?php
include_once('db.php');

function ban($StartIP,$EndIP,$Description,$Expires,$days_to_ban,$InfoURL) {
        $mycon = condb();
        if($mycon) { # returns false if it failed
                $stmt = $mycon->prepare('INSERT INTO banranges (StartIP,EndIP,Description,Expires,days_to_ban,InfoURL) VALUES (:StartIP,:EndIP,:Description,:Expires,:days_to_ban,:InfoURL);');
                $stmt->bindParam(':StartIP',ip2long($StartIP));
                $stmt->bindParam(':EndIP',ip2long($EndIP));
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
			echo(long2ip($result['StartIP']));
			print("\n");
		}
	} else { # oops, it failed to connect to the db for some reason...
		echo "DB Connection Failed!\n";
	}

}

function show_p2p_banlist() {
	$mycon = condb();
	if($mycon) { #returns false if failed
		$stmt = $mycon->prepare('SELECT StartIP,EndIP,Description FROM banranges;');
		$stmt->execute();
		while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
			echo($result['Description'].':'.long2ip($result['StartIP']).'-'.long2ip($result['EndIP']));
			print("\n");
		}
	} else { # oops, it failed to connect to the db for some reason...
		echo "DB Connection Failed!\n";
	}

}
