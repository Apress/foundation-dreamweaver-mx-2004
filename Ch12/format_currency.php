<?php
function currency($val,$curr) {
  switch(strtoupper($curr)) {
    case 'US':
	$symbol = '$';
	break;
	
	case 'UK':
	$symbol = '&pound;';
	$val *= 0.57;
	break;
	
	case 'EU':
	$symbol = '&euro;';
	$val *= 0.81;
	break;
	
	default:
	$symbol = '??';
	}
	
  return sprintf("$symbol%.2f",$val);
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Formatting currency</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>
<?php
$us = 50;
echo 'US: '.currency($us,'us').'<br />';
echo 'UK: '.currency($us,'uk').'<br />';
echo 'EU: '.currency($us,'eu').'<br />';
?>
</body>
</html>
