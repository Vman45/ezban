<?php
  # URL that generated this code:
  # http://txt2re.com/index-php.php3?s=Some%20organization:1.0.0.0-1.255.255.255&1&4&-6&-25&78&57&2

  $txt='Some organization:1.0.0.0-1.255.255.255';

  $re1='(Some)';	# Word 1
  $re2='( )';	# White Space 1
  $re3='((?:[a-z][a-z]+))';	# Word 2
  $re4='(.)';	# Any Single Character 1
  $re5='((?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?))(?![\\d])';	# IPv4 IP Address 1
  $re6='(.)';	# Any Single Character 2
  $re7='((?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?))(?![\\d])';	# IPv4 IP Address 2

  if ($c=preg_match_all ("/".$re1.$re2.$re3.$re4.$re5.$re6.$re7."/is", $txt, $matches))
  {
      $word1=$matches[1][0];
      $ws1=$matches[2][0];
      $word2=$matches[3][0];
      $c1=$matches[4][0];
      $ipaddress1=$matches[5][0];
      $c2=$matches[6][0];
      $ipaddress2=$matches[7][0];
      print "($word1) ($ws1) ($word2) ($c1) ($ipaddress1) ($c2) ($ipaddress2) \n";
  }

  #-----
  # Paste the code into a new php file. Then in Unix:
  # $ php x.php 
  #-----
?>
