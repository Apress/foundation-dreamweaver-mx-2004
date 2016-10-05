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
  $priceRoqCran = 2.5;
  $priceLatte = 1.89;
  $totalRoqCran = $roqCran * $priceRoqCran;
  $totalLatte = $latte * $priceLatte;
  
  // Calculate the delivery cost
  if ($totalRoqCran + $totalLatte >= 10) {
    $delivery = 0;
	}
  else {
    $delivery = .5;
	}
  
  // Find out what hour of the day it is
  $date = date('H');
  
  // Work out a suitable greeting
  if($date <= 8) {
    $greeting = 'Good morning, ';
    }
  elseif($date>8 and $date<17){
    $greeting = 'Good afternoon, ';
	}
  else { 
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
<td>$<?php printf('%.2f', $priceRoqCran); ?></td>
<td><?php printf('%.2f', $totalRoqCran); ?></td>
</tr>
<tr>
<td>Latte</td>
<td><?php echo $latte; ?></td>
<td>$<?php printf('%.2f', $priceLatte); ?></td>
<td><?php printf('%.2f', $totalLatte); ?></td>
</tr>
<?php
if ($delivery > 0) {
?>
<tr>
<td>Delivery charge </td>
<td>&nbsp;</td>
<td>$<?php printf('%.2f', $delivery); ?></td>
<td><?php printf('%.2f', $delivery); ?></td>
</tr>
<?php
}
?>
<tr>
<td colspan="3" align="right">Total amount due </td>
<td><?php printf('%.2f', $totalRoqCran + $totalLatte + $delivery); ?></td>
</tr>
</table>
<p>Your order will be delivered to: <?php echo $address; ?></p>
<form name="form1" id="form1" method="post" action="acknowledge.php">
<input type="submit" name="Submit" value="Confirm order" />
<input name="name" type="hidden" id="name" value="<?php echo $name; ?>" />
<input name="address" type="hidden" id="address" value="<?php echo $address; ?>" />
<input name="roqCran" type="hidden" id="roqCran" value="<?php echo $roqCran; ?>" />
<input name="latte" type="hidden" id="latte" value="<?php echo $latte; ?>" />
<input name="delivery" type="hidden" id="delivery" value="<?php echo $delivery; ?>" />
<input name="totalRoqCran" type="hidden" id="totalRoqCran" value="<?php echo $totalRoqCran; ?>" />
<input name="totalLatte" type="hidden" id="totalLatte" value="<?php echo $totalLatte; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
