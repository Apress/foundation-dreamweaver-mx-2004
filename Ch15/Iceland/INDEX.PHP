<?php require_once('Connections/cmsCon.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_news = 4;
$pageNum_news = 0;
if (isset($_GET['pageNum_news'])) {
  $pageNum_news = $_GET['pageNum_news'];
}
$startRow_news = $pageNum_news * $maxRows_news;

mysql_select_db($database_cmsCon, $cmsCon);
$query_news = "SELECT DATE_FORMAT(cms_news.storyDate, '%M %D, %Y') as 'storyDate', cms_news.headline, cms_news.story FROM cms_news ORDER BY cms_news.storyDate DESC, cms_news.newsID DESC";
$query_limit_news = sprintf("%s LIMIT %d, %d", $query_news, $startRow_news, $maxRows_news);
$news = mysql_query($query_limit_news, $cmsCon) or die(mysql_error());
$row_news = mysql_fetch_assoc($news);

if (isset($_GET['totalRows_news'])) {
  $totalRows_news = $_GET['totalRows_news'];
} else {
  $all_news = mysql_query($query_news);
  $totalRows_news = mysql_num_rows($all_news);
}
$totalPages_news = ceil($totalRows_news/$maxRows_news)-1;

$queryString_news = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_news") == false && 
        stristr($param, "totalRows_news") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_news = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_news = sprintf("&totalRows_news=%d%s", $totalRows_news, $queryString_news);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/main.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Images from Iceland - news</title>
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
      <p><script type="text/javascript" language="JavaScript">
<!--  
randomSplash() 
//-->
</script></p>
      <!-- InstanceEndEditable --></div>
  <div id="copyArea">
      <h1><!-- InstanceBeginEditable name="pageHeading" --><img src="assets/title_news.gif" alt="News" width="274" height="20" /><!-- InstanceEndEditable --></h1>
  <!-- InstanceBeginEditable name="pageCopy" -->
	<?php do { ?>
<h2><?php echo $row_news['storyDate']; ?>: <?php echo $row_news['headline']; ?></h2>
<p><?php echo $row_news['story']; ?></p>
<?php } while ($row_news = mysql_fetch_assoc($news)); ?>
<table border="0" width="50%" align="center">
<tr>
<td width="23%" align="center">
<?php if ($pageNum_news > 0) { // Show if not first page ?>
<a href="<?php printf("%s?pageNum_news=%d%s", $currentPage, 0, $queryString_news); ?>"><img src="First.gif" border=0></a>
<?php } // Show if not first page ?>
</td>
<td width="31%" align="center">
<?php if ($pageNum_news > 0) { // Show if not first page ?>
<a href="<?php printf("%s?pageNum_news=%d%s", $currentPage, max(0, $pageNum_news - 1), $queryString_news); ?>"><img src="Previous.gif" border=0></a>
<?php } // Show if not first page ?>
</td>
<td width="23%" align="center">
<?php if ($pageNum_news < $totalPages_news) { // Show if not last page ?>
<a href="<?php printf("%s?pageNum_news=%d%s", $currentPage, min($totalPages_news, $pageNum_news + 1), $queryString_news); ?>"><img src="Next.gif" border=0></a>
<?php } // Show if not last page ?>
</td>
<td width="23%" align="center">
<?php if ($pageNum_news < $totalPages_news) { // Show if not last page ?>
<a href="<?php printf("%s?pageNum_news=%d%s", $currentPage, $totalPages_news, $queryString_news); ?>"><img src="Last.gif" border=0></a>
<?php } // Show if not last page ?>
</td>
</tr>
</table>
<!-- InstanceEndEditable --></div>
  </div>
  <div id="footer">
    <p><a href="index.php">news</a> | <a href="about.php">about</a> | <a href="gallery.html">gallery</a> | <a href="contact.php">contact</a>  | <a href="javascript: scrollTo(0,0);">top</a></p>
  </div>
</div>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($news);
?>
