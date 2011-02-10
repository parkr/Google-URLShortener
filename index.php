<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>untitled</title>
	<meta name="generator" content="TextMate http://macromates.com/">
	<meta name="author" content="Parker Moore">
	<!-- Date: 2011-02-10 -->
</head>
<body>
<?php
include_once("shortener.php");
// Create instance with key
$key = 'AIzaSyBCykB_Wlz94Ek7AHkXvfDybyNfgDAaypw';
$googer = new GoogleURLAPI($key);

// Test: Shorten a URL
$shortDWName = $googer->shorten("http://davidwalsh.name");
echo $shortDWName; // returns http://goo.gl/i002

// Test: Expand a URL
$longDWName = $googer->expand($shortDWName);
echo $longDWName; // returns http://davidwalsh.name


?>
</body>
</html>
