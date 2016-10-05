<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Foreach loop</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>
<?php
$names = array('George', 'Craig', 'Beckie', 'Kylie', 'Steve', 'Nancy', 'David');
foreach ($names as $individual) {
  echo $individual.'<br />';
  }
?>
</body>
</html>
