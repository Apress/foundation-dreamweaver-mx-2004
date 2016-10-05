<?php
function getTheDate() {
  // make sure return value empty
  $retVal = '';

  // check if date entered
  if (!empty($_POST['storyDate'])) {
    // assign to shorter variable
    $d = $_POST['storyDate'];

    // check if slashes used
    if (strpos($d,'/') === false) {
            $retVal = 'Error: Use slashes
to separate the date';
       }
    else { // if slashes, split into array
      $d = explode('/',$d);
      // remove any leading zeros
      $month = substr($d[0],0,1) == '0' ?
substr($d[0],1) : $d[0];
      $date = substr($d[1],0,1) == '0' ?
substr($d[1],1) : $d[1];
      // if year 2 digits, adjust century
      // 60 or above = 1960
      if (strlen($d[2]) == 2 && $d[2]>59) {
        $year = '19'.$d[2];
        }
      // 59 or less = 2000+
      elseif (strlen($d[2]) == 2) {
        $year = '20'.$d[2];
        }
      else {
        $year = $d[2];
        }

      // check the date is valid
      if (!checkdate($month,$date,$year)) {
        $retVal = 'Error: Date not valid';
        }
      // format for MySQL
      else {
        $retVal = '"'.$year.'-';
        $retVal .= $month.'-'.$date.'"';
        }
      }
    }
  // if no date set, use today’s date
  else {
    $retVal = '"'.date('Y-m-d').'"';
    }
  return $retVal;
  }
?>
<?php require_once('../Connections/cmsCon.php'); ?>
<?php
session_start();
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "login.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
$theDate = getTheDate();
if (strpos($theDate, 'ror')) {
  echo $theDate;
  }
else {

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO cms_news (storyDate, headline, story) VALUES (%s, %s, %s)",
                       $theDate,
                       GetSQLValueString($_POST['headline'], "text"),
                       GetSQLValueString($_POST['story'], "text"));

  mysql_select_db($database_cmsCon, $cmsCon);
  $Result1 = mysql_query($insertSQL, $cmsCon) or die(mysql_error());

  $insertGoTo = "menu.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>News content management page</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>

<h1>News</h1>
<form action="<?php echo $editFormAction; ?>" name="form1" id="form1" method="POST">
<p>Date:<br />
<input name="storyDate" type="text" id="storyDate" />
</p>
<p>Headline:<br /> 
<input name="headline" type="text" id="headline" size="50" />
</p>
<p>Story:<br />
<textarea name="story" cols="60" rows="10" id="story"></textarea>
</p>
<p>
<input type="submit" name="Submit" value="Enter" />
</p>
<input type="hidden" name="MM_insert" value="form1">
</form>
</body>
</html>
