<?php
	$host		= "localhost";
	$username 	= "root";
	$password 	= "";
	$database	= "rcjsx10h_rcjsdb";

    $link = mysqli_connect($host, $username, $password, $database);
    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }
?>

