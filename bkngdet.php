<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php 
  session_start();
  require 'connect.php';

  $book_query = 'SELECT * from booking where username="'.$_SESSION['user'].'"';
  $book_res = mysqli_query($connection, $book_query);
?>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/head.css">
    <link rel="stylesheet" href="assets/css/foot.css">
    <title>ELEXFLEX | Booking Detail</title>
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
      .cont {
      background-color: grey;
      border: 1px;
      min-height: 100px;
      padding-top: 20px;
      margin-top:20px;
      margin-bottom: 20px;
      margin-left:20px;
      margin-right:20px;
  }
      .container {
  font-family: comic sans ms;
  font-style: inherit;
  
  color: black;
  box-shadow: 0px 0px 10px 4px #C72C1C;
  min-height: 100px;
  width: 600px;
  margin-left: 30%;
  background-color: #e74c3c;
  margin-top: 20px;
  margin-bottom: 20px;
  padding-bottom: 30px;
  text-align: center;
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
      <?php
        while($book_row = mysqli_fetch_assoc($book_res)){
          $user_query = 'SELECT * from user_data where username="'.$book_row['username'].'"';
          $user_res = mysqli_query($connection, $user_query);
          $user_row = mysqli_fetch_assoc($user_res);

          $prod_query = 'SELECT * from product where prod_id='.$book_row['prod_id'].';';
          $prod_res = mysqli_query($connection, $prod_query);
          $prod_row = mysqli_fetch_assoc($prod_res);

          $brand_query = 'SELECT name from brand where brand_id='.$prod_row['brand_id'].';';
          $brand_res = mysqli_query($connection, $brand_query);
          $brand_row = mysqli_fetch_assoc($brand_res);

          $sub_cat_query = 'SELECT * from sub_category where name="'.$prod_row['sub_category'].'"';
          $sub_cat_res = mysqli_query($connection, $sub_cat_query);
          $sub_cat_row = mysqli_fetch_assoc($sub_cat_res);

      ?>
      <div class="cont">
      <div class="container" id="namediv"><br>Customer Name<br>
                <b><?php  echo $user_row['fname'].' ' ?></b><b><?php  echo $user_row['mname'].' ' ?></b><b><?php  echo $user_row['lname'] ?></b>
        </div><br>
      <br>
      <div class="container" id="namediv"><br>Product Name<br>
                <b><?php echo $brand_row['name'].' '.$prod_row['name'] ?></b>
            </div><br>
      <br>
      <div class="container" id="namediv"><br>Product Details<br>
                <b><?php echo $sub_cat_row['category'] ?></b><br><b><?php echo $sub_cat_row['name'] ?></b><br>
                <b><?php echo $prod_row['price'] ?></b>
            </div><br>
      </div>
      <?php
        }
      ?>
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
