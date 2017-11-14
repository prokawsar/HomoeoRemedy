<?php

include 'connection.php';
session_start(); 

$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];
$phone = $_POST['phone'];
$address = $_POST['address'];


$sql = "INSERT INTO users (name, username, email, password, phone, address)
VALUES ('$name', '$username', '$email', '$pass', '$phone', '$address')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    $_SESSION['succMsg'] ="You have signed up successfully";
    header('location: login.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

