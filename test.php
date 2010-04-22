<?php
 
// Make sure SimplePie is included. You may need to change this to match the location of simplepie.inc.
require_once('simplepie/simplepie.inc');
require_once('php-sdk/facebook.php');
 
// We'll process this feed with all of the default options.
$feed = new SimplePie();
 
// Set the feed to process.
$feed->set_feed_url('https://www.gastro-app.ethz.ch/cgi-bin/menuela/feed_2.0_de_11-1.xml');
 
// Run SimplePie.
$feed->init();
 
// This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
$feed->handle_content_type();
 
// Let's begin our XHTML webpage code.  The DOCTYPE is supposed to be the very first thing, so we'll keep it on the same line as the closing-PHP tag.
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
        "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>Sample SimplePie Page</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
 <!--
	<style type="text/css">
	body {
		font:12px/1.4em Verdana, sans-serif;
		color:#333;
		background-color:#fff;
		width:700px;
		margin:50px auto;
		padding:0;
	}
 
	a {
		color:#326EA1;
		text-decoration:underline;
		padding:0 1px;
	}
 
	a:hover {
		background-color:#333;
		color:#fff;
		text-decoration:none;
	}
 
	div.header {
		border-bottom:1px solid #999;
	}
 
	div.item {
		padding:5px 0;
		border-bottom:1px solid #999;
	}
	</style>
 -->
</head>
<body>

	<h1><a href="<?php echo $feed->get_permalink(); ?>"><?php echo $feed->get_title(); ?></a></h1>
	<p><?php echo $feed->get_description(); ?></p>

	<table>
	<tr>
		<td>
			Menu
		</td>
		<td>
			Description
		</td>
		<td>
			Who's going for it?
		</td>
	<tr>
	<?php
	/*
	Here, we'll loop through all of the items in the feed, and $item represents the current item in the loop.
	*/
	foreach ($feed->get_items() as $item):
	?>
		<tr>
			<td>
				<?php echo $item->get_title(); ?>
			</td>
			<td>
				<?php echo $item->get_description(); ?>
			</td>
			<td>
				
			</td>
		<tr>
	<?php endforeach; ?>
	</table>
</body>
</html>