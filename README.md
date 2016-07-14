Title: ezban
Author: Tyler Carney
email/XMPP: tyler.carney@gmail.com
Date: July 12, 2016	
Time: After work
Location: Portland, OR
License: AGPL
Description: Simple tool to manage a banlist of IP addresses.  

WARNING!!! NOT FIT FOR ANY USE! Probably contains a couple vulnerabilities still so don't go exposing this web service to anyone who doesn't need access to it.
This app was designed to resist SQL injection, but may be vulnerable to XSS, or other things I haven't thought about yet. So yeah, filter that port, .htaccess protect it (mod_ldap for bonus points).  The user/password system for this utility is primitive at this time.  It's only been worked on for 2 days, after long days at the office, but yeah.  It's a starting point and a flag in the ground for what ezban (I tried not to overthink it) should be.

Design notes:
Aim for simple and Done.
Features should be easy to add, but it shouldn't need many features to be Complete.
Prepared statements only. Even if you don't think you need it, it will make sure plus save you the work of re-writing it later.
Consistency in code where possible.  
Refactor if/when it matters.
I should be writing tests, but I haven't yet.

Usage: Addresses are entered into the database as an IP or STARTIP-STOPIP range, then output in a list when requested. 
Formats may be added as you can write an SQL query to describe what you want and a bit of PHP to . it together.

Features:
* Ban a single address or range
* Set an expiration date where appropriate/desired (Default is Yes)
TODO: Select default number of days to ban... 1?
* Require API key to request banlist
* Add a description to each entry
* Include a URL to link to additional information such as a ticket.
* p2p format example (per now 404 sourceforge page) may not be implemented until there's a reason... or sooner
# comments start with # and this starts the example list
Some organization:1.0.0.0-1.255.255.255
Another organization:8.0.0.0-8.255.255.255
#end example p2p list
* file encoding TBD - default for now TODO: verify clients consuming ezlist will read correctly
* To sanitize/validate:
	+ strip or replace all but last :
	+ verify IP addresses match valid format
	+ data shouldn't be URL encoded when it goes into the list


* Sample code for regexing p2p elements can be found in ezban/regex_examples
	+Run like this:  $php regex_examples/script.php
