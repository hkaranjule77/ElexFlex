<?php
session_start();

$mysqli = new mysqli("localhost","root","","elexflex");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$sql = "SELECT * FROM user_acc WHERE username = '".$_POST["uname"]."' and password = '".$_POST["psw"]."';";
$res = $mysqli->query($sql);
$row= mysqli_fetch_assoc($res);
$count=mysqli_num_rows($res);

if($count==0){
    echo '<script>alert("Enterted Username or Password is wrong")</script>';
}
else{
    if(isset($_POST['admin']) && $_POST['admin']=='admin'){
        if($row['user_type']=='MGR'){
            $_SESSION['type'] = 'Seller';
            $_SESSION['user'] = $_POST["uname"];
            echo '<script>alert("Welcome Boss")</script>';
        }
        else{
            echo '<script>alert("You do not have access to this area")</script>';
        }
    }
    else{
        $_SESSION['type'] = 'Customer';
        $_SESSION['user'] = $_POST["uname"];
    }
}
header("Location: ../../myaccount.php");
?>