<?php require_once('Connections/myConn.php'); ?>
<?php
$maxRows_my_contacts = 10;
$pageNum_my_contacts = 0;
if (isset($_GET['pageNum_my_contacts'])) {
  $pageNum_my_contacts = $_GET['pageNum_my_contacts'];
}
$startRow_my_contacts = $pageNum_my_contacts * $maxRows_my_contacts;

mysql_select_db($database_myConn, $myConn);
$query_my_contacts = "SELECT first_name, family_name, email, comments FROM contacts ORDER BY contactID DESC";
$query_limit_my_contacts = sprintf("%s LIMIT %d, %d", $query_my_contacts, $startRow_my_contacts, $maxRows_my_contacts);
$my_contacts = mysql_query($query_limit_my_contacts, $myConn) or die(mysql_error());
$row_my_contacts = mysql_fetch_assoc($my_contacts);

if (isset($_GET['totalRows_my_contacts'])) {
  $totalRows_my_contacts = $_GET['totalRows_my_contacts'];
} else {
  $all_my_contacts = mysql_query($query_my_contacts);
  $totalRows_my_contacts = mysql_num_rows($all_my_contacts);
}
$totalPages_my_contacts = ceil($totalRows_my_contacts/$maxRows_my_contacts)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Output of contacts database</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>
<table width="600" border="1" cellspacing="0" cellpadding="0">
<tr>
<th scope="col">First name </th>
<th scope="col">Family name </th>
<th scope="col">Email</th>
<th scope="col">Comments</th>
</tr>
<?php do { ?>
<tr valign="top">
<td><?php echo $row_my_contacts['first_name']; ?></td>
<td><?php echo $row_my_contacts['family_name']; ?></td>
<td><?php echo $row_my_contacts['email']; ?></td>
<td><?php echo nl2br($row_my_contacts['comments']); ?></td>
</tr>
<?php } while ($row_my_contacts = mysql_fetch_assoc($my_contacts)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($my_contacts);
?>
