<?php
  # URL that generated this code:
  # http://txt2re.com/index-php.php3?s=Some%20organization:1.0.0.0-1.255.255.255&1&4
 # Then it was modified a bit

  $txt='Some organization:1.0.0.0-1.255.255.255';

  $re1='.*?';	# Non-greedy match on filler
  $re2='((?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?))(?![\\d])';	# IPv4 IP Address 1
  $re3='.*?';	# Non-greedy match on filler
  $re4='((?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?))(?![\\d])';	# IPv4 IP Address 2

  if ($c=preg_match_all ("/".$re1.$re2.$re3.$re4."/is", $txt, $matches))
  {
      $ipaddress1=$matches[1][0];
      $ipaddress2=$matches[2][0];
      print "$ipaddress1\n$ipaddress2\n";
  }

  #-----
  # Paste the code into a new php file. Then in Unix:
  # $ php x.php 
  #-----
?>
