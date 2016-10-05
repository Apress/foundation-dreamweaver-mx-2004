<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Simple session 3</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php
// check whether session var is set
if (isset($_SESSION['name'])) {
  // if set, greet by name
  echo 'Hi, '.$_SESSION['name'];
  echo '. See, I remembered your name! ';
  // unset session var
  session_unregister('name');
  // end session
  session_destroy();
  echo '<a href="session2.php">Page 2</a>';
  }
else { // display if not recognized
  echo 'Sorry, I don\'t know you.<br />';
  echo '<a href="session1.php">Login</a>';
  }
?>
</body>
</html>
