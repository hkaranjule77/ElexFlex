<?php
require './connect.php';
echo 'connected';
$query = "select * from category";
$result = mysqli_query($connection, $query);
if($result){
    echo 'got it';
    while($row = mysqli_fetch_assoc($result)){
        echo $row['name'];
    }
}
else{
    echo 'Connection failed'
}
?>