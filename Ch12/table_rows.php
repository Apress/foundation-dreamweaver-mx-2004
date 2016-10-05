<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Colored rows</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
.odd {
	background-color: #FFFFFF;
}
.even {
	background-color: #FFFFCC;
}
-->
</style>
</head>

<body>
<?php
echo '<table width="200" border="1">';
for ($i = 1;$i < 11;$i++) {
  if ($i % 2) {
    $class = 'odd';
	}
  else {
    $class = 'even';
	}
echo "<tr class='$class'><td>Row number: $i</td></tr>\n";
  }
echo '</table>';
?>
</body>
</html>
