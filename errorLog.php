#!/usr/bin/php
<?php


	function errorLog($log){
		date_default_timezone_get();
		$date = date('Y-m-d H:i:s');
		$file = "logs.txt";
		$fh = fopen($file, 'a') or die("Can't open file");
		fwrite($fh, "\n" . $date . "\t" . $log);
		fclose($fh);
	}

	/**
	function errorLogDB($log){
		date_default_timezone_get();
		$date = date('Y-m-d H:i:s');
		$file = "DBlogs.txt";
		$fh = fopen($file, 'a') or die("Can't open file");
		if(strlen($log) > 100)
			fwrite($fh, "\n" . $date . "\t" . "String is too long to print because it has " . strlen($log) . " characters");
		else	
			fwrite($fh, "\n" . $date . "\t" . $log);
		fclose($fh);
		
	}
	function errorLogDMZ($log){
		date_default_timezone_get();
		$date = date('Y-m-d H:i:s');
		$file = "DMZlogs.txt";
		$fh = fopen($file, 'a') or die("Can't open file");
		if(strlen($log) > 100)
			fwrite($fh, "\n" . $date . "\t" . "String is too long to print because it has " . strlen($log) . " characters");
		else	
			fwrite($fh, "\n" . $date . "\t" . $log);
		fclose($fh);
	}
		
**/
	
?>
