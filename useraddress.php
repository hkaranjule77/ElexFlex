<?php
include("connconf.php");
session_start();

?>


<html>

<head>
    <link rel="stylesheet" type="text/css" href="assets/css/userdata.css">
</head>

<body>
    <form action="useraddress.php" method="POST">
        <div class="maincont">
            <div id="addressdiv" class="container"><br>ENTER YOUR ADDRESS DETAILS<br><br>

                <input type="text" class="form-control" id="inputstreet" placeholder="Street" name="inputstreet">

                <input type="text" class="form-control" id="inputhome" placeholder="Home" name="inputhome">

                <input type="text" class="form-control" id="landmark" placeholder="Landmark" name="landmark">

                <input type="text" class="form-control" id="inputCity" placeholder="City" name="inputCity" required>

                <input type="text" class="form-control" id="inputdistrict" placeholder="District" name="inputdistrict" required>

                <input type="text" class="form-control" id="inputdistate" placeholder="State" name="inputstate" required>


               
            </div><br>

            <div class="submitdetails1">
                <input type="submit" class="form-submit" id="submitdetails1" name="submitdetails1" value="CONFIRM">
            </div>
        </div>
    </form>
    <?php
    $mysqli = new mysqli("localhost","root","","elexflex");

    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }
    $valid = "SELECT * FROM user_add WHERE username = '".$_SESSION["user"]."';";
    $res = $mysqli->query($valid);

    while($row= mysqli_fetch_array($res))
    {
    echo "
    <div class = 'addresses'>
    Street:  ".$row['local_street']."<br>
    Home:   ".$row['home']."<br>
    Landmark:   ".$row['landmark']."<br>
    City:    ".$row['city']."<br>
    District:    ".$row['dist']."<br>
    State:    ".$row['state']."<br><br><br>
    </div>
    ";
    }
    ?>
</body>

<?php
if (isset($_POST['submitdetails1'])) {
    $username = $_POST['username'];
    $home = $_POST['inputhome'];
    $inputstreet = $_POST["inputstreet"];
    $inputlandmark = $_POST['landmark'];
    $inputcity = $_POST['inputCity'];
    $inputdistrict = $_POST['inputdistrict'];
    $inputstate = $_POST['inputstate'];

    $res = "INSERT INTO user_add(username, home, local_street, landmark, city, dist, state) VALUES ('".$_SESSION['user']."','".$_POST['inputhome']."','".$_POST['inputstreet']."','".$_POST['landmark']."','".$_POST['inputcity']."','".$_POST['inputdistrict']."','".$_POST['inputstate']."')";
    if ($mysqli->query($res) === TRUE) {
          header("Location: ./myaccount.php");
        } else {
          echo "Error: " , $res , "<br>" , $mysqli->error;

          //"Error: " , '$sql' . "<br>" , '$mysqli->error' ---to find error
        }
}
?>

</html>