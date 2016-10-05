<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Order confirmation</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
body {font-family: Verdana, Arial, Helvetica, sans-serif;color:#000;background:#fff;}
h1 {color:#fc0; font-size: 125%;}
p, tr {font-size: 85%;}
p {width: 450px;}
</style>
</head>

<body>
<h1>Your order</h1>
<p>
<?php 
  // Get the data from the form
  $name = $_POST['name'];
  $address = $_POST['address'];
  $roqCran = $_POST['roqCran'];
  $latte = $_POST['latte'];
	
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
. Thank you for your order.
</p>

<p>Please check the details. You have ordered:</p>
<table width="400" border="0">
<tr>
<th scope="col">Item</th>
<th scope="col">Ordered</th>
<th scope="col">Price</th>
<th scope="col">Cost</th>
</tr>
<tr>
<td>Roquefort &amp; Cranberry</td>
<td><?php echo $roqCran; ?></td>
<td>$2.50</td>
<td><?php echo $roqCran * 2.5; ?></td>
</tr>
<tr>
<td>Latte</td>
<td><?php echo $latte; ?></td>
<td>$1.89</td>
<td><?php echo $latte * 1.89; ?></td>
</tr>
<tr>
<td>Delivery charge </td>
<td>&nbsp;</td>
<td>$0.50</td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="3" align="right">Total amount due </td>
<td><?php echo $roqCran * 2.5 + $latte * 1.89 + 0.5; ?></td>
</tr>
</table>
<p>Your order will be delivered to: <?php echo $address; ?></p>
</body>
</html>
