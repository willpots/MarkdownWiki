<?php
if(isset($_GET['p'])) {
	$page=$_GET['p'];
	if($_POST['content']=="") {

	} else if(isset($_POST['content'])){
		$fh = fopen('files/'.$page.'.md','w');
		fwrite($fh, $_POST['content']);
		fclose($fh);
		echo "File Saved Successfully!";
	}


}


?>