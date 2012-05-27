<?php
	error_reporting(0);
	require_once "lib/markdown.php";
	require_once "lib/config.php";
	require_once "lib/functions.php";

	if(isset($_GET['action'])) {
		if($_GET['action']=='edit') {
			$edit=true;
		}
	} else $edit = false;
	if(isset($_GET['p'])) {
		$page=$_GET['p'];
		$contents=file_get_contents("$md_dir/$page.md");
		if($contents==false)
			$contents = "";
		$new = false;
	} else {
		$new = true;


	}
	$title=print_title($page);

?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?> | Strabo</title>

	<link rel="stylesheet" href="<?php echo $prefix; ?>/style.css" type="text/css"/>
	<link rel="apple-touch-icon" href="<?php echo $prefix; ?>/touch-icon-iphone.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $prefix; ?>/touch-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $prefix; ?>/touch-icon-iphone4.png" />
	<link rel="shortcut-icon" href="<?php echo $prefix; ?>/favicon.ico"></link>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>

	<script src="<?php echo $prefix; ?>/js/script.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $prefix; ?>/js/ace.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $prefix; ?>/js/mode-markdown.js" type="text/javascript" charset="utf-8"></script>
    <script>
    var editor;
    window.onload = function() {
        editor = ace.edit("editor");
		var MarkdownMode = require("ace/mode/markdown").Mode;
		editor.getSession().setMode(new MarkdownMode());
		editor.getSession().setUseWrapMode(true);
    };

    </script>

</head>
<body>
<header id="main_header">
	<a href="<?php echo $prefix; ?>">Home</a>
	<a href="<?php echo $prefix; ?>/new">New</a>
	<a href="<?php echo $prefix; ?>/<?php echo $page; ?>">Back</a>
	<a id="save" >Save</a>
	<a href="/wiki/<?php echo $page; ?>/delete">Delete</a>
</header>
<?php if($new) { ?>
	<input type="text" id="page_name" placeholder="Document Name...">
<?php } else { ?>
	<input type="hidden" value="<?php echo $page ?>" id="page_name">
	<h2><?php echo print_title($page); ?></h2>
<?php } ?>

	<div id="editor"><?php echo $contents;  ?></div>

<footer id="main_footer">
created with love by <a href="http://twitter.com/willpots">@willpots</a>
</footer>

</body>
</html>