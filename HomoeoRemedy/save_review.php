<?php
file_put_contents('saved.txt', $_POST['tags'], FILE_APPEND);
file_put_contents('saved.txt', ',', FILE_APPEND);

session_start();
include 'connection.php';

$med_name = $_POST['med_name'];
$review = $_POST['review'];
$user_id = $_SESSION['ID'];
$sql = "INSERT INTO review (med_name, review, user_id)
	VALUES ('$med_name', '$review', '$user_id')";

if ($conn->query($sql) === TRUE) {
	    echo "Review Added";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}



header('Location: med_review.php');
