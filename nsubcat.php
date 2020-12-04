<!DOCTYPE html>
<?php

session_start();
include 'filepath.php';
include 'connect.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElexFlex | New Sub Category</title>
    <link rel="stylesheet" href="assets/css/head.css">
    <link rel="stylesheet" href="assets/css/foot.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $css_asset ?>forms.css" >
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
      //include 'assets/html/header.html';
      ?>
      <!--Header-->
    </header>
    <main>
      <!-- Main Body -->
      <h1>ADD A NEW SUB CATEGORY</h1>
      <br>
    <form method="post" action="#" enctype="multipart/form-data">
      <table>
        <tr>
          <td>
            <label for="category">Category</label>
          </td>
          <td>
            <select name="category">
            <option disabled selected>-- Select Category --</option>
    <?php
      $records = mysqli_query($conn, "SELECT * From category");  // Use select query here 

      while($data = mysqli_fetch_array($records)){
          echo "<option value='". $data['name'] ."'>" .$data['name'] ."</option>";  // displaying data in option menu
      }	
    ?>  
            </select>
          </td>
        </tr>
        <tr>
          <td>
            <label for="name">Sub Category Name</label>
          </td>
          <td>
            <input type="text" name="name" class='catname' maxlength="30" placeholder="Smartphone (max 30 characters)">
          </td>
        </tr>
          <td colspan="2">
            <center><input type="submit" value="Submit" onsubmit="display_msg()" name='submit'></center>
          </td>
        </tr>
      </table>
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
  $sql = 'INSERT INTO sub_category (name, category) VALUES ("'.$_POST["name"].'", "'.$_POST["category"].'")';
  
  if (mysqli_query($connection, $sql)){
      header('Location:./myaccount.php');
  }
  else {
    echo "<script>Error: " , $res , "<br>" , $mysqli->error, "<script>";
    // "Error: " , '$sql' . "<br>" , '$mysqli->error' ---to find error
  }
}
?>
</html>