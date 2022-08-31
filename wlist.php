<!DOCTYPE HTML>
<!--
    Forty by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>Word List</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css" />
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    </head>
    <body>

        <!-- Wrapper -->
            <div id="wrapper">

                <!-- Header -->
                    <header id="header" class="alt">
                        <a href="index.html" class="logo"><strong>Smart</strong> <span>Subtitle</span></a>
                        <nav>
                            <a href="#menu">Menu</a>
                        </nav>
                    </header>

                <!-- Menu -->
                    <nav id="menu">
                        <ul class="links">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html">About SmartSubtitle</a></li>
                            <li><a href="contact.html">Contact Us</a></li>

                        </ul>
                    </nav>

<?php  	

	$wlist_path = $_GET["w"];
		
    $lines = file($wlist_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $data = array_map(function($v){
        list($word, $meaning) = explode(":", $v);
        return ["Word" => $word, "Meaning" => $meaning];
    }, $lines);
//var_dump($data);
?>


<section id="about">
<div class="inner">
<header class="major">  
<h3>Highlighted Words</h3>
</header>
<div align="center"> 
<div class="table-wrapper">
<table class="alt">
    <thead align="center">
        <tr>
        <th>Word</th>
        <th>Meaning</th>
        </tr>
    </thead>
<tbody>
<?php foreach($data as $user){ ?>
    <tr>
        <td><?php echo $user["Word"]; ?></td>
        <td><?php echo $user["Meaning"]; ?></td>
    </tr>
<?php } ?>
</tbody>
</table>
</div>
</div>

</div>
</section>

<!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrolly.min.js"></script>
            <script src="assets/js/jquery.scrollex.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
            <script src="assets/js/main.js"></script>
</div>
</body>
</html>