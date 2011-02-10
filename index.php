<?php
if($_POST){
	include_once("shortener.php");
	include_once("include.php");
	$googer = new GoogleURLAPI($key);
	if($_POST['action'] == "shorten"){
		$shortened = $googer->shorten($_POST['to_shorten']);
		$expanded = $_POST['to_shorten'];
		$short = 1;
	}elseif($_POST['action'] == "expand"){
		$expanded = $googer->expand($_POST['to_expand']);
		$shortened = $_POST['to_expand'];
		$short = 2;
	}
}else{
	$expanded = "http://";
	$shortened = "http://goo.gl/";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Shortener/Expander: Google URL API</title>
	<meta name="generator" content="TextMate http://macromates.com/">
	<meta name="author" content="Parker Moore">
	<!-- Date: 2011-02-10 -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.min.js"></script>
	<script type="text/javascript">
		$.fn.center = function () {
			this.css("position","absolute");
			this.css("top", ( $(window).height() - this.height() ) / 2+$(window).scrollTop() + "px");
			this.css("left", ( $(window).width() - this.width() ) / 2+$(window).scrollLeft() + "px");
			return this;
		}
	</script>
	<style type="text/css">
	body, html {
		margin: 0;
		padding: 0;
		font-size: 20px;
		font-family: "Geneva";
		text-align: center;
	}
	#container {
		width: 600px;
	}
	input {
		font-size: 40px;
		text-align: center;
	}
	header{
		text-align: left;
		font-size: 50px;
		color: #fff291;
	}
	.goog {
		position:absolute;
		right:0;
		top:0;
	}
	</style>
</head>
<body>
	<img src="google_logo.png" class="goog">
	<div id="container">
		<header>Google URL Shortener</header>
	<form id="shorten" method="post">
		<input type="hidden" value="shorten" name="action">
		<input type="text" value="<?php echo $expanded; ?>" name="to_shorten">
		<input type="Submit" value="Shorten">
	</form><br>
	<form id="expand" method="post">
		<input type="hidden" value="expand" name="action">
		<input type="text" value="<?php echo $shortened; ?>" name="to_expand">
		<input type="Submit" value="Expand">
	</form>
	<?php
	if($short==1){
		echo "Result:<br>";
		echo $shortened;
	}elseif($short==2){
		echo "Result:<br>";
		echo $expanded;
	}
	?>
	<script type="text/javascript">
		$("#container").center();
		$(".goog").css('top', $("#container").offset().top+($("#container").height()/1.9));
		$(".goog").css('left', $("#container").offset().left-15);
	</script>
	</div>
</body>
</html>
