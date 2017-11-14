<?php

include 'connection.php';

// Inialize session
session_start();

$username = $_POST['username'];
$pass = $_POST['password'];


$sql = "select * from users where username = '$username' and password = '$pass'";

    $row = $conn->query($sql);

    if($row->num_rows == 1){
        foreach($row as $res){

            if($res['user_type'] == 1){
                $_SESSION['admin'] = $username;
                $_SESSION['ID'] = $res['user_id'];
                header('location: admin/index.php');

            }else{
                // IF A USER STORE THEIR USERNAME, ID AND CURRENCY
                $_SESSION["username"] = $username;
                $_SESSION['ID'] = $res['user_id'];
                if(isset($_SESSION['url'])){
                    header("Location: ".$_SESSION['url']);
                }else{
                    header('Location: index.php');
                }
            }

            break;
        }

    //	echo "Login Successful </br>". $_POST['email'];
    }
    else{
    //	echo "Incorrect";
         $_SESSION['errMsg'] = "Invalid username or password";
         header('Location: login.php');
    }