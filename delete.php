<?php
require_once "lib/MarkdownWiki.php";

if(isset($_GET['p'])) {

	if(!strstr($_GET['p'],'..')) {
		$filename = 'files/'.$_GET['p'].".md";
		unlink($filename);
	}
	header("Location:$prefix/");

}



?>