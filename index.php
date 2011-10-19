<?php
require_once( '../../wp-load.php' );
include_once(ABSPATH . WPINC . '/feed.php');
$rss = fetch_feed( 'http://andrewnacin.com/feed/?foo=true' );

if ( is_wp_error( $rss ) )
	wp_die( 'error' );
	
$rss_items = $rss->get_items(0, 1); 
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>When Did Nacin Last Blog?</title>
	<meta name="description" content="">
	<meta name="author" content="Benjamin J. Balter">

	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="stylesheet" href="css/style.css">

	<script src="js/libs/modernizr-2.0.min.js"></script>
	<script src="js/libs/respond.min.js"></script>
</head>
<body>

<div id="container">
	<header>
		When Did Nacin Last Blog?
	</header>
	<div id="main" role="main">
<?php
 
foreach ( $rss_items as $item ) {
	echo human_time_diff( $item->get_date('U') );
	break;
}

?> ago
	</div>
	<footer>

	</footer>
</div> <!--! end of #container -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>

<!-- scripts concatenated and minified via ant build script-->
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>
<!-- end scripts-->


<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
	<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->
<div id="source">
	<a href="https://github.com/benbalter/When-Did-Nacin-Last-Blog">source</a>
</div>
</body>
</html>
