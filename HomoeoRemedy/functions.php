<?php

include 'connection.php';

$sql = 'SELECT * FROM review ORDER BY rev_id DESC';
$resultSet = $conn->query($sql);

if(isset($_SESSION['ID'])) {
    $sql = "SELECT * from users WHERE user_id =".$_SESSION['ID'];
    $user_data = $conn->query($sql);
}

$sql = "SELECT t1.med_name, t1.review, t2.name FROM review as t1 JOIN users as t2
        ON t1.user_id = t2.user_id ORDER BY rev_id DESC";
$review_details = $conn->query($sql);

function objectToArray ($object) {
    if(!is_object($object) && !is_array($object))
        return $object;

    return array_map('objectToArray', (array) $object);
}



