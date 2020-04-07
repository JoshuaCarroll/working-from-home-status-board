<?php

	// Why is this called "status_getter"?  Because it gets the status, dumbass.

	$filename = "status.txt";
	$myfile = fopen($filename, "r") or die("Unable to open file!");
	$status =  trim(fread($myfile,filesize($filename)));
	fclose($myfile);
	
	echo $status;
?>