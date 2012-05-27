<?php

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
?>