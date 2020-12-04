<?php
  session_start();

  require 'connect.php';

  $user_det_query = 'SELECT * from user_data where username="'.$_SESSION['user'].'";';
  $user_det_res = mysqli_query($connection, $user_det_query);
  $user_det_row = mysqli_fetch_assoc($user_det_res);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/userdata.css">
    <link rel="stylesheet" href="assets/css/head.css">
    <link rel="stylesheet" href="assets/css/foot.css">
    <title>ElexFlex | Personal Details</title>
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
      <div class="container" id="usernamediv"><br>USERNAME<br><br>
                <b><?php echo $_SESSION['user'] ?></b>
            </div><br>
            <div class="container" id="namediv"><br>YOUR NAME<br><br>
                <b><?php echo $user_det_row['fname'] ?></b>
                <br>
                <b><?php echo $user_det_row['mname'] ?></b>
                <br>
                <b><?php echo $user_det_row['lname'] ?></b>
            </div><br>

            <div id="contactdiv" class="container"><br>CONTACT DETAILS AND DATE OF BIRTH<br><br>
                <b><?php echo $user_det_row['dob'] ?></b>
                <br>
                <b><?php echo $user_det_row['mob_no'] ?></b>
                <br>
                <b><?php echo $user_det_row['email'] ?></b>
            </div>
            <br>

            
            <div id="qualifdiv" class="container"> <br>ENTER QUALIFICATIONS<br><br>

                <b><?php echo $user_det_row['qual'] ?></b>
            </div>
            <br>
            <div class="submitdetails" >
              <form action="./userdetail.php?edit=">
                <input type="submit" class="form-submit" id="submitdetails" name="edit" value="Edit">
              </form>
            </div>
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
</html>