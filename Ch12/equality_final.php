<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Equality test</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>
<?php
$itemsOrdered = 20;
echo "Variable is set to $itemsOrdered";
echo '<br /><br />';
if ($itemsOrdered = 5) {
  echo 'Yes, five items were ordered';
  }
echo '<br /><br />';
echo "Variable is set to $itemsOrdered";
?>
</body>
</html>
