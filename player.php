<!DOCTYPE HTML>
<!--
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
<title> CS2610 - Smart Subtitle </title>
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="Pragma" content="no-cache" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
<link rel="stylesheet" href="assets/css/main.css" />
<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
<meta http-equiv="Expires" content="-1" />
<link rel="stylesheet" type="text/css" href="SubPlayerJS.css">
<script type="text/javascript" src="sub.js" ></script>

</head>
<body>	
<center>
 <div id="divIDwhereVideoPlayerWillBeLoaded" style="width: 80%; height: 80%" onended="alert("Hiiii");"></div> 
</center>
<script>
<?php echo 'var newPlayer = new SubPlayerJS("#divIDwhereVideoPlayerWillBeLoaded", "'.$_GET["m"].'");'; ?>
<?php echo 	'newPlayer.setSubtitle("'.$_GET["s"].'");'; ?> 
<?php echo '$word_list="'.$_GET["w"].'";'; ?> 
	
</script>
<script type='text/javascript'>
    document.getElementById('SubPlayerVideo_1').addEventListener('ended',myHandler,false);
    function myHandler(e) {
    	//alert("You will be redirected to the world list page ... ");
        <?php echo "window.location.replace('wlist.php?w=".$_GET["w"]."');"; ?>

    }
</script>
</body>
</html>
