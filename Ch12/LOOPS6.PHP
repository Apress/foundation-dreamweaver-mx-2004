<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Simpler multiple foreach loop</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>
<?php
$sandwiches = array('sal' => 'Salmon',
    'blt' => 'Bacon, Lettuce &amp; Tomato',
    'avPra' => 'Avocado &amp; Prawn');
$snacks = array('pret' => 'Pretzels',
  'cashNut' => 'Cashew Nuts',
  'fajGuac' => 'Fajitas &amp; Guacomole');
$drinks = array('latte' => 'Cafe Latte',
    'dEsp' => 'Double Espresso',
    'minSp' => 'Mineral Water (sparkling)');
$menu = array('Sandwiches' => $sandwiches,
    'Snacks' => $snacks,
    'Drinks' => $drinks);
 
foreach ($menu as $category => $items) {
  echo "<h2>$category</h2>\n<ul>";
  foreach ($items as $item) {
    echo "<li>$item</li>\n";
	}
  echo "</ul>\n";
  } 
?>
</body>
</html>
