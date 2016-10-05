<html>
<head>
<title>Test MySQL</title>
</head>
<body>
<?php
$host = 'localhost';
mysql_connect($host,'root','');
$sql='show status';
$result = mysql_query($sql);
if ($result == 0) {
  echo '<b>Error '.mysql_errno().': ';
  echo mysql_error().'</b>';
  }
elseif (mysql_num_rows($result) == 0)
   echo '<b>Query successful</b>';
else
{
?>
<!-- Table that displays the results -->
<table border="1">
  <tr><td><b>Variable_name</b></td>
  <td><b>Value</b></td></tr>
<?php
  for ($i = 0; $i < mysql_num_rows($result); $i++) {
    echo '<tr>';
    $row_array = mysql_fetch_row($result);
    for ($j = 0; $j < mysql_num_fields($result); $j++) {
      echo '<td>' . $row_array[$j] . '</td>';
      }
    echo '</tr>';
   }
?>
</table>
<?php } ?>
</body>
</html>