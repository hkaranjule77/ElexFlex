<?php
session_start();
include("connconf.php");


?>


<html>
<head>
    <link rel="stylesheet" type="text/css" href="assets/css/userdata.css">
    <link rel="stylesheet" href="assets/css/head.css">
    <link rel="stylesheet" href="assets/css/foot.css">
    <style>
     main{
        position:fixed;
        top: 15%;
        left: 0;
        right: 0;
        bottom: 10%;
        overflow-x: hidden; 
        overflow-y: auto;
      }
      @media screen and (max-width: 600px) {
      .col-25, .col-75, input[type=submit] {
      width: 100%;
      margin-top: 0;
      }
      }
    </style>
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
      <form method="POST" name='userdetail' onclick=validateform()>
        <div class="maincont">
            <div class="container" id="usernamediv"><br>ENTER a USERNAME<br><br>
                <input type="username" class="form-control" id="username" placeholder="UserName" name="username" required>
            </div><br>
            <div class="container" id="namediv"><br>ENTER YOUR NAME<br><br>
                <input type="name" class="form-control" id="inputfname" placeholder="First Name" name="inputfname" required>

                <input type="name" class="form-control" id="inputmname" placeholder="Middle Name" name="inputmname" required>

                <input type="name" class="form-control" id="inputlname" placeholder="Last Name" name="inputlname" required>
            </div><br>

            <div id="contactdiv" class="container"><br>CONTACT DETAILS AND DATE OF BIRTH<br><br>
                <input type="date" class="form-control" id="inputdob" placeholder="Date of Birth" name="inputdob" required>

                <input type="text" class="form-control" id="inputnumber" placeholder="mobile number" name="inputnumber" required>

                <input type="email" class="form-control" id="inputemail" placeholder="email" name="inputemail" required>
            </div>
            <br>

            
            <div id="qualifdiv" class="container"> <br>ENTER QUALIFICATIONS<br><br>

                <input type="text" class="form-control" id="inputqualification" placeholder="Qualification" name="inputqualification" required>
            </div>
            <br>
            <div class="submitdetails" >
                <input type="submit" class="form-submit" id="submitdetails" name="submitdetails" value="CONFIRM">
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
    
</body>

<?php
if(isset($_POST['submitdetails']))
{
    $mysqli = new mysqli("localhost","root","","elexflex");

    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }

    $valid = "SELECT * FROM user_acc WHERE username = '".$_SESSION["user"]."';";
    $res = $mysqli->query($valid);
    $row= mysqli_fetch_assoc($res);
    $count=mysqli_num_rows($res);

    if($count==0){
        $res = "INSERT INTO user_data(username, fname, mname, lname, qual, dob, mob_no, email) VALUES ('".$_POST['username']."','".$_POST['inputfname']."','".$_POST['inputmname']."','".$_POST['inputlname']."','".$_POST['inputqualification']."','".$_POST['inputdob']."','".$_POST['inputnumber']."','".$_POST['inputemail']."');";
        $res .= " UPDATE user_acc SET username='".$_POST['username']."' WHERE username='".$_SESSION['user']."';";
    }
    else{
        $res="UPDATE user_data SET username='".$_POST['username']."',fname='".$_POST['inputfname']."',mname='".$_POST['inputmname']."',lname='".$_POST['inputlname']."',qual='".$_POST['inputqualification']."',dob='".$_POST['inputdob']."',mob_no='".$_POST['inputnumber']."',email='".$_POST['inputemail']."' WHERE 1;";
        $res .= " UPDATE user_acc SET username='".$_POST['username']."' WHERE username='".$_SESSION['user']."';";
    }

if ($mysqli->multi_query($res) === TRUE) {
      $_SESSION['user'] = $_POST["username"];
      header("Location: ./useraddress.php");
    } else {
      echo "Error: " , $res , "<br>" , $mysqli->error;
      // "Error: " , '$sql' . "<br>" , '$mysqli->error' ---to find error
    }
}
?>


</html>