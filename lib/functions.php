<?php

// Config Goes Here
//	$prefix = ""; // Null By Default, Absolute Server Path
	$prefix = "/wiki";

//Relative Path from server dir
	$md_dir = "./files"; // Default




function print_file($file,$print=false) {

	$file = ucwords(str_replace('_',' ',substr($file,0,-3)));
	if($print==true)
		echo $file;
	return $file;
}
function link_file($file,$print=false) {

	$file = substr($file,0,-3);
	if($print==true)
		echo $file;
	return $file;
}
function print_title($title,$print=false) {
	$file = ucwords(str_replace('_',' ',$title));
	if($print==true)
		echo $file;
	return $file;
}
function titleify($title,$print=false) {
	$title = strtolower(str_replace(' ','_',$title));
	if($print==true)
		echo $title;
	return $title;

}
function get_head() {
	global $prefix, $md_dir;
?>
	<meta charset="utf-8">
	<link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="<?php echo $prefix; ?>/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo $prefix; ?>/handheld.css" type="text/css" media="handheld"/>

	<link rel="apple-touch-icon" href="<?php echo $prefix; ?>/touch-icon-iphone.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $prefix; ?>/touch-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $prefix; ?>/touch-icon-iphone4.png" />
	<link rel="shortcut-icon" href="<?php echo $prefix; ?>/favicon.ico"></link>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo $prefix; ?>/js/script.js" type="text/javascript" charset="utf-8"></script>
<?php
}


function get_header() {
	global $prefix, $md_dir;

?>



<?php
}

function get_footer() {
	global $prefix, $md_dir;
?>
<footer id="main_footer">
<p>created with love by <a href="http://twitter.com/willpots">@willpots</a>.</p>
<p>Content &copy; 2012, Strabo, LLC. </p>
<p>Markdown Wiki is released under MIT License and the source code is available <a href="https://github.com/willpots/MarkdownWiki">here</a>.</p>
</footer>
<?php
}
?>