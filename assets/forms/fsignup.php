<?php
session_start(); 

$valid = "SELECT * FROM user_acc WHERE username = '".$_POST["email"]."';";
$mysqli = new mysqli("localhost","root","","elexflex");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
    
    $res = $mysqli->query($valid);
    $row= mysqli_fetch_assoc($res);
    $count=mysqli_num_rows($res);



if($_POST["psw"]!=$_POST["psw-repeat"]){
    echo '<script>alert("Password re-entered is different")</script>';
    header("Location: ../../myaccount.php");
}
elseif($count == 1){
    echo '<script>alert("Username already taken")</script>';
    header("Location: ../../myaccount.php");
}
else{

$sql = "INSERT INTO user_acc (username, password, user_type, act_date, act_time) VALUES ('".$_POST["email"]."','".$_POST["psw"]."', 'Customer', CURDATE(), CURTIME());";
echo 'reached here';
    if ($mysqli->query($sql) === TRUE) {
      $_SESSION['type'] = 'Customer';
        $_SESSION['user'] = $_POST["email"];
        header("Location: ../../myaccount.php");
      } else {
        echo '<script>alert("Error: ")</script>';
        header("Location: ../../myaccount.php");
        // "Error: " , '$sql' . "<br>" , '$mysqli->error' ---to find error
      }
}

?>