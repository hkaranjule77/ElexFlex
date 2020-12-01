<?php
session_start();

require '..\..\connect.php';


    $brand_id = $_POST['brand-id'];
    $prod_id = $_POST['prod-id'];
    $username = $_SESSION['user'];
    $usertype = $_SESSION['type'];

    $insert_query = 'INSERT INTO booking(prod_id, username) Values('.$prod_id.',"'.$username.'")';
    $result = mysqli_query($connection, $insert_query);
    if($result){
        echo 'Booked Succesfully';
    }

?>