<?php
    session_start();

    require "connect.php";

    $user_add_query = 'SELECT * from user_add where username="'.$_SESSION['user'].'"';
    $user_add_res = mysqli_query($connection, $user_add_query);
    if(mysqli_num_rows($user_add_res) > 0){
        $add_already_exist = TRUE;
    }
    $user_add_row = mysqli_fetch_assoc($user_add_res);
?>


<html>

<head>
    <link rel="stylesheet" type="text/css" href="assets/css/userdata.css">
</head>

<body>
<header>
      <!--Header-->
      <?php
        include 'assets/html/header.html';
      ?>
      <!--Header-->
    </header>
    <main>
      <!-- Main Body -->
    <form action="useraddress.php" method="POST">
        <div class="maincont">
            <div id="addressdiv" class="container"><br>ENTER YOUR ADDRESS DETAILS<br><br>

                <input type="text" class="form-control" id="inputhome" placeholder="Home" name="inputhome"
                 <?php if(isset($user_add_row)) echo 'value="'.$user_add_row['home'].'"' ?> >

                 <input type="text" class="form-control" id="inputstreet" placeholder="Locality/Street" name="inputstreet"
                 <?php if(isset($user_add_row)) echo 'value="'.$user_add_row['local_street'].'"' ?> >

                <input type="text" class="form-control" id="landmark" placeholder="Landmark" name="landmark"
                 <?php if(isset($user_add_row)) echo 'value="'.$user_add_row['landmark'].'"' ?>>

                <input type="text" class="form-control" id="inputCity" placeholder="City" name="inputcity" required
                 <?php if(isset($user_add_row)) echo 'value="'.$user_add_row['city'].'"' ?>>

                <input type="text" class="form-control" id="inputdistrict" placeholder="District" name="inputdistrict" required
                 <?php if(isset($user_add_row)) echo 'value="'.$user_add_row['dist'].'"' ?> >

                <input type="text" class="form-control" id="inputdistate" placeholder="State" name="inputstate" required
                 <?php if(isset($user_add_row)) echo 'value="'.$user_add_row['state'].'"' ?> >


               
            </div><br>

            <div class="submitdetails1">
                <center><input type="submit" class="form-submit" id="submitdetails1" name="submitdetails1" value="CONFIRM"><center>
            </div>
        </div>
    </form>
    
      <!-- Main Body -->
      </main>
    <footer>
    <!--Footer-->
    <?php
    include 'assets/html/footer.html';
     ?>
     <!--Footer-->
    </footer>
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


    /*if($add_already_exist){
        $query = "UPDATE user_add SET home= ".$home.", local_street=".$inputstreet.", landmark=".$inputlandmark.", city=".$inputcity.", dist=".$inputdistrict.", state=".$inputstate." where username='".$_SESSION."'";
    }*/
        $query = "INSERT INTO user_add(username, home, local_street, landmark, city, dist, state) VALUES ('".$_SESSION['user']."','".$_POST['inputhome']."','".$_POST['inputstreet']."','".$_POST['landmark']."','".$_POST['inputcity']."','".$_POST['inputdistrict']."','".$_POST['inputstate']."')";
    if ($mysqli->query($query) === TRUE) {
        echo '<script type="text/javascript">alert("New addresss added.");</script>';
          header("Location: ./myaccount.php");
        } else {
          echo "Error: " , $res , "<br>" , $mysqli->error;

          //"Error: " , '$sql' . "<br>" , '$mysqli->error' ---to find error
        }
}
?>

</html>