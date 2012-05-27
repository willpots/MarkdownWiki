<?php
	error_reporting(0);
	require_once "lib/markdown.php";
	require_once "lib/config.php";
	require_once "lib/functions.php";
	if(isset($_GET['p'])) {
		$page=$_GET['p'];
		$contents=file_get_contents("$md_dir/$page.md");
		if($contents==false)
			$contents = file_get_contents('404.md');
		$contents=Markdown($contents);
	} else {
		$page='home';
		$contents=Markdown(file_get_contents("$md_dir/$page.md"));
		if ($handle = opendir('files/')) {
			$contents.='<h2>Pages</h2><ul>';

		    while (false !== ($entry = readdir($handle))) {
		    	if($entry!='..'&&$entry!='.'&&$entry!='home.md')
			        $contents .= '<li><a href="'.link_file($entry).'/">'.print_file($entry).'</a></li>';
		    }
		    $contents.='</ul>';
		    closedir($handle);
		}
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
</head>
<body>
<header id="main_header">
	<a href="<?php echo $prefix; ?>">Home</a>
	<a href="<?php echo $prefix; ?>/new">New</a>
<!-- 	<a href="/wiki/add_page">New</a> -->
	<?php if($page!='home') { ?>
	<a href="<?php echo $prefix; ?>/<?php echo $page; ?>/edit">Edit</a>
	<?php } ?>
</header>
<?php echo $contents;  ?>
<footer id="main_footer">
created with love by <a href="http://twitter.com/willpots">@willpots</a>
</footer>
</body>
</html>