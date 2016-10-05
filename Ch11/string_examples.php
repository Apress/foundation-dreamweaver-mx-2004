<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>String examples</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
body {font-family: Arial, Helvetica, sans-serif;}
h1, h2 {font-family: Verdana, Arial, Helvetica, sans-serif;}
h1 {font-size: 125%;}
h2 {font-size: 115%;}
p {margin: 0 0 10px 25px;font-size: 85%;}
.phpCode {font-weight:bold;}
.phpOutput {color: blue;}
</style>
</head>

<body>
<h1>PHP strings</h1>
<h2>Use of single and double quotation marks</h2>
<?php
$name = 'David';
?>
<p><span class="phpCode">$name</span> has been set to 'David'.</p>
<p><span class="phpCode">echo 'Hi, $name';</span> (with single quotes) produces <span class="phpOutput"><?php echo 'Hi, $name'; ?></span></p>
<p><span class="phpCode">echo "Hi, $name";</span> (with double quotes) produces <span class="phpOutput"><?php echo "Hi, $name"; ?></span></p>
<p><span class="phpCode">echo "It's fine";</span> (using an apostrophe between double quotation marks) displays as expected: <span class="phpOutput"><?php echo "It's fine"; ?></span></p>
<h2>Escaping characters</h2>
<p><span class="phpCode">echo 'It\'s fine';</span> (escaping the apostrophe with a backslash) means PHP will not treat the apostrophe as a closing quote: <span class="phpOutput"><?php echo 'It\'s fine'; ?></span></p>
<?php
$totalPrice = 7.99;
?>
<p>To use a dollar sign with a variable inside double quotes, escape the dollar sign you want displayed with a backslash like this:</p>
<p><span class="phpCode">echo "The total is \$$totalPrice";</span> produces: <span class="phpOutput"><?php echo "The total is \$$totalPrice"; ?></span></p>
<p>Double quotes can also be escaped with a backslash. <span class="phpCode">echo "Shakespeare's \"Macbeth\"";</span> produces: <span class="phpOutput"><?php echo "Shakespeare's \"Macbeth\""; ?></span></p>
<h2>Creating space between concatenated strings</h2>
<?php
$greeting = 'Hi,';
$name = 'Pat';
?>
<p><span class="phpCode">$greeting</span> has been set to 'Hi,' and <span class="phpCode">$name</span> has been reset to 'Pat'.</p>
<p><span class="phpCode">echo $greeting . $name;</span> produces <span class="phpOutput"><?php echo $greeting . $name; ?></span></p>
<p><span class="phpCode">echo $greeting.' '.$name;</span> produces <span class="phpOutput"><?php echo $greeting.' '.$name; ?></span></p>
<p><span class="phpCode">echo "$greeting $name";</span> produces <span class="phpOutput"><?php echo "$greeting $name"; ?></span></p>
</body>
</html>
