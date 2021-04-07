<?php
	//error_reporting(E_ALL);
	//ini_set('display_errors', 1);

	$dbhost = "172.16.1.200";
	$port = "6432";
	$dbuser = "vachira_view";
	$dbpass = "vachira";
	//$dbuser = 'pkdb';
	//$dbpass = 'root@PKDB';
	$dbname = "pkdb";

	$connpg = pg_connect("host=$dbhost dbname=$dbname user=$dbuser password=$dbpass options='--client_encoding=UTF8'");
	if($connpg)
	{
		//echo "Pg Connection OK";
	}
	else{
		echo "Pg Connection Falied";
	}
	
	$serverName = "localhost";
	$userName = "root";
	$userPassword = "intraP@&sw0rd";
	$dbName = "hrm";
	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	if (mysqli_connect_errno()){
		echo "Database Connect Failed : " . mysqli_connect_error();
	}
	else{
		//echo "Database Connected.";
		mysqli_set_charset($conn,"utf8");
	}
?>