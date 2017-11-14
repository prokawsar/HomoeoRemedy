<?php
session_start();
if(!isset($_SESSION['admin'])){
    header('location: login.php');
}
include_once ('../connection.php');

if($_GET){

    $id = $_POST['med_id'];
    $med_name = $_POST['med_name'];
    $pow_id = $_POST['med_potency'];
    $price = $_POST['price'];
    $type_id = $_POST['med_type'];

    $sql = "UPDATE medicine SET remedy_name='$med_name', pow_id='$pow_id', price='$price', type_id='$type_id' WHERE remedy_id='$id'";
    $conn->query($sql);

    $_SESSION['msg'] = "Remedy Updated";

} else if(isset($_POST['med_name'])){

    $med_name = $_POST['med_name'];
    $pow_id = $_POST['med_potency'];
    $price = $_POST['price'];
    $type_id = $_POST['med_type'];

    $sql = "INSERT into medicine (remedy_name, pow_id, price, type_id) VALUES ('$med_name', '$pow_id', '$price', '$type_id')";
    $conn->query($sql);
    $_SESSION['msg'] = "New Remedy Added";

}else if(isset($_POST['new_potency'])){
    $new_potency = $_POST['new_potency'];
    $sql = "INSERT into med_power (med_power) VALUES ('$new_potency')";
    $conn->query($sql);
    $_SESSION['msg'] = "New potency Added";

}
else{
    $pow_id = $_POST['pow_id'];
    $sql = "DELETE from med_power where pow_id= '$pow_id'";
    $conn->query($sql);
    $_SESSION['msg'] = "Potency Deleted";

}

function post_data(){
    $med_name = $_POST['med_name'];
    $pow_id = $_POST['med_potency'];
    $price = $_POST['price'];
    $type_id = $_POST['med_type'];
}

header('location: add_remedy.php');