<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
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
      button.signout{
        width: 120px;
        background-color: #99A3A4;
        border: none;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-weight: 600;
        font-size: 24px;
        font-family: sans-serif;
        margin-left: 85%;
        margin-top: 2%;
        cursor: pointer;
        padding-left: 4px;
        padding-right: 4px;
        padding-top: 4px;
        padding-bottom: 4px;
      }
      li.e1{
        margin-top: 50px;
      }
      li.myad a{
        text-decoration: none;
        color: #99A3A4;
        font-weight: 600;
        font-size: 36px;
        text-align: center;
        font-family: sans-serif;
        margin-top: 10px;
        margin-bottom: 40px;
        margin-left: 15%;
        margin-right: 15%;
        padding: 12px;
        display: block;
        background: #E74C3C;
        border-radius: 13px;
        box-shadow: 0px 0px 20px 3px #99A3A4;
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
      <?php
      if(isset($_SESSION['user'])&& $_SESSION['type']=='Customer'){
        
      ?>
        <a href="./logout.php"><button class= 'signout'>Sign Out</button></a>
      <ul>
        <li class = 'myad e1'><a href="./userdetail.php">Personal Details</a></li>
      </ul>
      <?php
      }
      elseif(isset($_SESSION['user'])&& $_SESSION['type']=='Seller'){
      ?>
      <a href="./logout.php"><button class= 'signout'>Sign Out</button></a>
      <ul>
        <li class = 'myad e1'><a href="./userdetail.php">Personal Details</a></li>
        <li class = 'myad'><a href="./nadmin.php">Add New Admin</a></li>
        <li class = 'myad'><a href="./npro.php">Add new Product</a></li>
        <li class = 'myad'><a href="./ncat.php">Add new category</a></li>
        <li class = 'myad'><a href="./nsubcat.php">Add new Sub-category</a></li>
        <li class = 'myad'><a href="./addItem.php">Add items</a></li>
      </ul>
      <?php
      }
      else{
          include './login.php';
          include './signup.php';
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
