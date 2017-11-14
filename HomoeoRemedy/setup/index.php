<?php
	$servername = "localhost";
	$username = "root"; // MySql username
	$password = ""; // MySql password

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE db_homoeo";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}


$conn = new mysqli($servername, $username, $password, 'db_homoeo');
// sql to create table
$sql = "CREATE TABLE users (
    id INT(6) AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP
    )";
if ($conn->query($sql) === TRUE) {
    echo "Table Users created successfully";
}