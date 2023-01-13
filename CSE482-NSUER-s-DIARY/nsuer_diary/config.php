<?php 
	session_start();
	//$server = "sql307.epizy.com";
	//$dbname = "epiz_32439834_nsuer_diary";
	//$username = "epiz_32439834";
	//$password = "t3A4LzQ8NPov";

	// connect to database [xampp]
	$conn = mysqli_connect("localhost", "root", "", "nsuer_diary");

	// connect to database [hosted]
	//$conn = mysqli_connect($server, $username, $password, $dbname);

	if (!$conn) {
		die("Error! Couldn't connect to database: " . mysqli_connect_error());
	}
?>