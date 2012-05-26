<?php
	error_reporting(0);
	require_once "lib/markdown.php";
	if(isset($_GET['p'])) {
		$page=$_GET['p'];
		$contents=file_get_contents('files/'.$page.'.md');
		if($contents==false)
			$contents = file_get_contents('404.md');
		$contents=Markdown($contents);
	} else {
		$page='main';
		$contents="No files exist!";
		if ($handle = opendir('files/')) {
			$contents='<h1>Articles</h1><ul>';

		    while (false !== ($entry = readdir($handle))) {
		    	if($entry!='..'&&$entry!='.')
			        $contents .= '<li><a href="'.substr($entry,0,-3).'/">'.ucwords(substr($entry,0,-3)).'</a></li>';
		    }
		    $contents.='</ul>';
		    closedir($handle);
		}
	}
	$title=ucwords($page);

?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?> | Strabo</title>

	<link rel="stylesheet" href="/wiki/style.css" type="text/css"/>
</head>
<body>
<?php echo $contents;  ?>
</body>
</html>