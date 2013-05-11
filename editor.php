<?php
	error_reporting(0);
	require_once "lib/MarkdownWiki.php";

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
	<title><?php echo $title ?> | Strabo</title>
	<?php get_head(); ?>
	<script src="<?php echo $prefix; ?>/src/ace.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $prefix; ?>/src/mode-markdown.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo $prefix; ?>/src/theme-twilight.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $prefix; ?>/js/editor.js" type="text/javascript" charset="utf-8"></script>

</head>
<body>
<header id="main_header">
	<a href="<?php echo $prefix; ?>">Home</a>
	<a href="<?php echo $prefix; ?>/new">New</a>
	<a href="<?php echo $prefix; ?>/<?php echo $page; ?>">Back</a>
	<a id="save" >Save</a>
	<a href="javascript:deleteDocument('/wiki/<?php echo $page; ?>/delete');">Delete</a>
</header>
<?php if($new) { ?>
	<input type="text" id="page_name" placeholder="Document Name...">
<?php } else { ?>
	<input type="hidden" value="<?php echo $page ?>" id="page_name">
	<h2><?php echo print_title($page); ?></h2>
<?php } ?>

	<div id="editor"><?php echo $contents;  ?></div>

<?php get_footer(); ?>
</body>
</html>