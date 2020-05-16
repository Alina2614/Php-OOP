<?php
//Class: 2017-05-08

function connect($flag=TRUE){
	$dbName = "lindisfarnedb";
	// Create connection

    $con = mysqli_connect("localhost", "root", "");
    if(!$con){
        die("Could not connect due to ".  mysqli_connect_error());
    }																																																																																																	
    return $con;
}
		
?>
