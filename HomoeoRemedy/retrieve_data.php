<?php

include 'connection.php';
//2. generate query to select all data from db table
$sql = "SELECT * FROM medicine";
$medicine_data = $conn->query($sql);

$sql = "SELECT * FROM users";
$user_data = $conn->query($sql);


$sql = "SELECT * FROM remedy_type";
$med_type = $conn->query($sql);

$sql = "SELECT table1.*, table2.med_power, table3.remedy_type_name FROM medicine as table1 
JOIN med_power as table2
        ON table1.pow_id = table2.pow_id 
JOIN remedy_type as table3
        ON table1.type_id = table3.type_id 
";
$medicine_details = $conn->query($sql);

if(isset($_GET['id'])){
    $sql = "SELECT * FROM medicine WHERE remedy_id=".$_GET['id'];
    $update_med = $conn->query($sql);

    while($row = mysqli_fetch_assoc($update_med)) {
        $med_name = $row['remedy_name'];
        $pow_id = $row['pow_id'];
        $price = $row['price'];
        $type_id = $row['type_id'];
    }
}

$sql = "SELECT * FROM med_power";
$med_power = $conn->query($sql);

$sql = "SELECT * FROM remedy_order";
$order_details = $conn->query($sql);

if(isset($_SESSION['admin'])) {
    $sql = "SELECT * FROM remedy_order WHERE status=0";
    $total_order = $conn->query($sql);

    $sql = "SELECT table1.*, table2.* FROM remedy_order as table1 
        JOIN users as table2
                ON table1.user_id = table2.user_id  
        ";
    $order_details = $conn->query($sql);
}

if(isset($_SESSION['ID'])) {
    $sql = "SELECT * FROM remedy_order WHERE user_id=" . $_SESSION['ID'];
    $order_data_id = $conn->query($sql);
}

