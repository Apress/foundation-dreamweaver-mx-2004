<?php
// initiate session
session_start();
// check POST array for valid data
if (isset($_POST['name']) && !empty($_POST['name'])) {
  // set session variable
  $_SESSION['name'] = $_POST['name'];
  }
?>  
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Simple session 2</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
// check session var is set
if (isset($_SESSION['name'])) {
  // if set, greet by name
  echo 'Hello, '.$_SESSION['name'].'. ';
  echo '<a href="session3.php">Next</a>';
  }
else { // if not set, send back to login
  echo 'Who are you?
  <a href="session1.php">Login</a>';
  }
?>
</body>
</html>
