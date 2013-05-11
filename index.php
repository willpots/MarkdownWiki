<?php
	error_reporting(0);
	require_once "lib/MarkdownWiki.php";
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
	<title><?php echo $title ?> | Strabo</title>

	<?php get_head(); ?>
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
<h2><?php if($page!='home') echo print_title($page); ?></h2>
<?php echo $contents;  ?>
<?php get_footer(); ?>
</body>
</html>