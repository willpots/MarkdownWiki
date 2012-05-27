<?php
require_once "lib/markdown.php";
require_once "lib/config.php";
require_once "lib/functions.php";

if(isset($_GET['p'])) {

	if(!strstr($_GET['p'],'..')) {
		$filename = 'files/'.$_GET['p'].".md";
		unlink($filename);
	}
	header("Location:$prefix/");

}



?>