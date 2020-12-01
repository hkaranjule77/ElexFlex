<?php 
  require 'connect.php';

  if(isset($_POST['fname'])){
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $mob_no = $_POST['mob-no'];
  $complaint = $_POST['complaint'];
  
  $insert_query = 'INSERT INTO complaint ( fname, lname, mob_no, complaint) VALUES("'.$fname.'","'.$lname.'","'.$mob_no.'","'.$complaint.'");';
  $result = mysqli_query($connection, $insert_query);
  echo $result;
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/head.css">
    <link rel="stylesheet" href="assets/css/foot.css">
    <title>ELEXFLEX | Review</title>
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
      img.e.jpg{
  width: 40%;
  border-radius: 50%;
}
input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  color: #E74C3C;
  font-family: sans-serif;
  font-weight: bolder;
  font-size: 18px;
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #99A3A4;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
    </style>
  </head>
  <body>
    <!--Connection-->
    <?php
      include 'db_connection.php';
      $conn = Connect();
    ?>
    <!--Connection-->
    <header>
      <!--Header-->
      <?php
      include 'assets/html/header.html';
      ?>
      <!--Header-->
    </header>
    <main>
      <!-- Main Body -->
      <div class="container">
  <form action="#" method="post">
  <img src="assets/img/e.png" alt="icon" class="icon">
  <div class="row">
      <div class="col-25">
        <label for="fname">First Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="fname" placeholder="Your name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Last Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="lname" placeholder="Your last name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="contact">Mobile Number</label>
      </div>
      <div class="col-75">
        <input type="text" id="contact" name="mob-no" placeholder="Your mobile number..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Subject</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="complaint" placeholder="Write something.." style="height:200px"></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
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
