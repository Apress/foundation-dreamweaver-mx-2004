<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Order confirmation</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>
<h1>Your order</h1>
<p>
<?php 
  // Get the data from the form
  $name = $_POST['name'];
	
  // Find out what hour of the day it is
  $date = date('H');
  
  // Work out a suitable greeting
  if($date <= 11) { // if between 0 and 11
    $greeting = 'Good morning, ';
    }
  // or if afte 11 and before 17 (5pm)
  elseif ($date > 11 and $date < 17) {
    $greeting = 'Good afternoon, ';
    }
  else { // otherwise
    $greeting = 'Good evening, ';
    }

  // Print out the greeting and name
  echo $greeting.$name; 
?>
</body>
</html>
