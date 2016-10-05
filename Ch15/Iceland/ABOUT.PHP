<?php require_once('Connections/cmsCon.php'); ?>
<?php
mysql_select_db($database_cmsCon, $cmsCon);
$query_about = "SELECT details FROM cms_about";
$about = mysql_query($query_about, $cmsCon) or die(mysql_error());
$row_about = mysql_fetch_assoc($about);
$totalRows_about = mysql_num_rows($about);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/main.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Images from Iceland - about</title>
<!-- InstanceEndEditable --><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Keywords" content="iceland, photography, geysir, gullfoss, thingvellir, waterfall, photo, craig grannell, images, landscapes" />
<meta name="Description" content="Images from Iceland - photographs from the land of fire and ice." />
<script language="JavaScript" src="iceland.js" type="text/javascript"></script>
<style type="text/css">
<!--
@import url(iceland.css);
-->
</style>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>
<div id="wrapper">
  <div id="masthead"><img src="assets/masthead.jpg" alt="Distant glacier photo" width="740" height="60" /><br />
      <img src="assets/nav_site_name.gif" alt="Images from Iceland" width="551" height="20" /><a href="index.php"><img src="assets/nav_news.gif" alt="News" width="35" height="20" border="0" /></a><a href="about.php"><img src="assets/nav_about.gif" alt="About" width="41" height="20" border="0" /></a><a href="gallery.html"><img src="assets/nav_gallery.gif" alt="Gallery" width="44" height="20" border="0" /></a><a href="contact.php"><img src="assets/nav_contact.gif" alt="Contact" width="49" height="20" border="0" /></a></div>
  <div id="content">
    <div id="photoArea">
      <!-- InstanceBeginEditable name="photoArea" -->
      <p><img src="assets/about.jpg" alt="Photo" width="400" height="300" /></p>
      <p>More images from Iceland<br />
        View more images in the <a href="gallery.html">gallery</a>.      </p>
  <!-- InstanceEndEditable --></div>
    <div id="copyArea">
      <h1><!-- InstanceBeginEditable name="pageHeading" --><img src="assets/title_about.gif" alt="News" width="274" height="20" /><!-- InstanceEndEditable --></h1>
	  <!-- InstanceBeginEditable name="pageCopy" -->
      <p><?php echo nl2br($row_about['details']); ?></p>
    <!-- InstanceEndEditable --></div>
  </div>
  <div id="footer">
    <p><a href="index.php">news</a> | <a href="about.php">about</a> | <a href="gallery.html">gallery</a> | <a href="contact.php">contact</a>  | <a href="javascript: scrollTo(0,0);">top</a></p>
  </div>
</div>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($about);
?>
