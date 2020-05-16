	<?php
	//Include dB connection file
	include_once 'dbCon.php';
	//Create connection object without database name;
	$con = connect(FALSE);
	//why without DB name?
	//SQL to drop database;
	$sqlToCreateDB = "DROP DATABASE IF EXISTS LindisfarneDB;";
	if ($con->query($sqlToCreateDB) === TRUE) {
		echo "Database dropped successfully<br>";
	} else {
		echo "Error: " . $sqlToCreateDB . "<br>" . $con->error. "<br>";
	}

	//SQL to create database;
	$sqlToCreateDB = "CREATE DATABASE LindisfarneDB;";
	if ($con->query($sqlToCreateDB) === TRUE) {
		echo "Database created successfully<br>";
	} else {
		echo "Error: " . $sqlToCreateDB . "<br>" . $con->error. "<br>";
	}

	//Creating connection object with database name;
	$con = connect();


	mysqli_select_db($con, 'LindisfarneDB');
	//why again with DB name?

	//SQL to create table users
	$sql = "CREATE TABLE IF NOT EXISTS `users` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `name` varchar(255) NOT NULL,
	  `user_type` int(11) NOT NULL DEFAULT '1' COMMENT '0- Admin, 1-Customer',
	  `postal_address` varchar(255) NOT NULL, 
	  `postcode` integer (11) NOT NULL , 
	  `gender` char(8) NOT NULL,
	  `email` varchar(255) NOT NULL,
	  `password` varchar(255) NOT NULL,
	  PRIMARY KEY (`id`)
	);";


	if ($con->query($sql) === TRUE) {
		echo "users table created successfully<br>";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error. "<br>";
	}

	$sql = "CREATE TABLE IF NOT EXISTS `ticket_types` (
	  `ticket_type_id` int(11) NOT NULL AUTO_INCREMENT,
	  `ticket_type_name` varchar(255) NOT NULL,
	  `ticket_price` varchar(255) NOT NULL,
	  `on_discount` varchar(255) NOT NULL, 
	  `discount_amount` varchar (255) NOT NULL , 
	  `description` text NOT NULL,
	  PRIMARY KEY (`ticket_type_id`)
	);";


	if ($con->query($sql) === TRUE) {
		echo "ticket_types table created successfully<br>";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error. "<br>";
	}

	$sql = "CREATE TABLE IF NOT EXISTS `animals` (
	  `animal_id` int(11) NOT NULL AUTO_INCREMENT,
	  `animal_name` varchar(255) NOT NULL,
	  `animal_age` varchar(255) NOT NULL,
	  `animal_photo_id` varchar(255) NOT NULL,  
	  `description` text NOT NULL,
	  PRIMARY KEY (`animal_id`)
	);";


	if ($con->query($sql) === TRUE) {
		echo "animals table created successfully<br>";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error. "<br>";
	}


	$sql = "CREATE TABLE IF NOT EXISTS `images` (
	  `image_id` int(11) NOT NULL AUTO_INCREMENT,
	  `ref_id` varchar(255) NOT NULL,
	  `image_url` varchar(255) NOT NULL,
	  PRIMARY KEY (`image_id`)
	);";


	if ($con->query($sql) === TRUE) {
		echo "images table created successfully<br>";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error. "<br>";
	}


	$sql = "DROP TABLE IF EXISTS `booking`;";

	if ($con->query($sql) === TRUE) {
		echo "booking table dropped successfully<br>";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error. "<br>";
	}

	$sql = "CREATE TABLE if not exists `booking` (
	`booking_id` int(11) NOT NULL,
	`booking_type` varchar(255) NOT NULL,
	`booling_time` varchar(255) NOT NULL,
	`booking_cost` varchar(255) NOT NULL,
	`booked_by` varchar(255) NOT NULL,
	PRIMARY KEY (`booking_id`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

	if ($con->query($sql) === TRUE) {
		echo "booking table created successfully<br>";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error. "<br>";
	}

	$sql = "INSERT INTO `LindisfarneDB`.`users` 
	(`name`, `user_type`, `email`, `password`) 
	VALUES 
	('Admin', '0', 'admin@lindisfarnepark.com', '123'),
	('User','1','user@gmail.com','u123');";
	//why admin data and user data inserted from different pages

	if ($con->query($sql) === TRUE) {
		echo "user admin created successfully<br>
		email: admin@lindisfarnepark.com<br>password:123<br>";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error. "<br>";
	}

