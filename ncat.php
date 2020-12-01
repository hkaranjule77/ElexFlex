<!DOCTYPE html>
<?php

session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElexFlex | New Category</title>
    <link rel="stylesheet" href="assets/css/head.css">
    <link rel="stylesheet" href="assets/css/foot.css">
    <title>ELEXFLEX | My Account</title>
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
      <h1>ADD A NEW CATEGORY</h1>
      <br>
    <form method="post">
    <label for="name">
    Category Name
    </label><br>
    <input type="text" name="name" class='catname'><br><br><br>
    <label for="image">
    <h3>Image Path</h3>
    <br>
    <h4>Add an image in the given path and then wite the image name with extention in the given field</h4>
    </label><br>
    <input type="text" name="img" class='catname' value='./files/img/category/'>
    <br><br><br>
    <input type="submit" value="Submit" name='submit'>
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
if(isset($_POST['submit'])){

$mysqli = new mysqli("localhost","root","","elexflex");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
$sql = "INSERT INTO category (name, img) VALUES ('".$_POST["name"]."', '".$_POST["img"]."');";
if ($mysqli->query($sql) === TRUE) {
    header("Location: ./myaccount.php");
  } else {
    echo "<script>Error: " , $res , "<br>" , $mysqli->error, "<script>";
    // "Error: " , '$sql' . "<br>" , '$mysqli->error' ---to find error
  }
}
?>
</html>