<?php

include 'connection.php';

// This is a sample code in case you wish to check the username from a mysql db table

if(isset($_POST['username'])) {

$username = $_POST['username'];
$sql = "select user_id from users where username='$username'";
$sql_check = $conn->query($sql);

    if($sql_check->num_rows != 0) {
        echo '<font color="red">The username <STRONG>'.$username.'</STRONG> is already in use.</font>';
    }
    else {
        echo 'OK';
    }

}
