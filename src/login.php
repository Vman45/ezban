<?php
if (!defined("BASE_PATH")) define('BASE_PATH', isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : substr($_SERVER['PATH_TRANSLATED'],0, -1*strlen($_SERVER['SCRIPT_NAME'])));
include_once(BASE_PATH.'/inc/ezban.php');

  // Sanitize incoming username and password
  $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $passwd = filter_var($_POST['passwd'], FILTER_SANITIZE_STRING);

  // Connect to the MySQL server
  $mycon = condb();

  // Determine whether an account exists matching this username and password
#TODO: md5() needs replacing...
  $stmt = $mycon->prepare("SELECT id FROM user WHERE username = :username and passwd = md5(:passwd)");

  // Bind the input parameters to the prepared statement
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':passwd', $passwd); 

  // Execute the query
  $stmt->execute();

  // Store the result so we can determine how many rows have been returned
  $stmt->storeresult();

  if ($stmt->num_rows == 1) {

    // Bind the returned user ID to the $id variable
    $stmt->bind_result($id); 
    $stmt->fetch();

    // Update the account's last_login column
    $stmt = $db->prepare("UPDATE user SET last_login = NOW() WHERE id = :id");
    $stmt->bindParam(':id', $id); 
    $stmt->execute();

    // Redirect the user to the home page
    #header('Location: http://www.example.com');
  }
