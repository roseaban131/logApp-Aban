<?php

$DB_HOST= "localhost";
$DB_USER = "root";
$DB_PASS= "root";
$DB_NAME = "mydatabase";

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

	if(mysqli_connect_errno()){
		echo 'Failed to connect to MySQL '. mysqli_connect_errno();
	}