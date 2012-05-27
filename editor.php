<?php
	error_reporting(0);
	require_once "lib/markdown.php";
	require_once "lib/functions.php";

	if(isset($_GET['action'])) {
		if($_GET['action']=='edit') {
			$edit=true;
		}
	} else $edit=false;
	if(isset($_GET['p'])) {
		$page=$_GET['p'];
		$contents=file_get_contents('files/'.$page.'.md');
		if($contents==false)
			$contents = "";

	} else {

	}
	$title=print_title($page);

?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?> | Strabo</title>

	<link rel="stylesheet" href="/wiki/style.css" type="text/css"/>
	<script src="/wiki/js/script.js" type="text/javascript" charset="utf-8"></script>
	<script src="/wiki/js/ace.js" type="text/javascript" charset="utf-8"></script>
	<script src="/wiki/js/mode-markdown.js" type="text/javascript" charset="utf-8"></script>

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
	<a href="/wiki">Home</a>
	<a href="/wiki/<?php echo $page; ?>">Back</a>
	<a href="javascript:saveContents();">Save</a>
</header>
	<div id="editor"><?php echo $contents;  ?></div>

<footer id="main_footer">
created with love by <a href="http://twitter.com/willpots">@willpots</a>
</footer>
<input type="hidden" value="<?php echo $page ?>" id="page_name">
</body>
</html>