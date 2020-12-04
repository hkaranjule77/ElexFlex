<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php 
session_start();
require 'db_connection.php';
$conn = Connect();
?>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/head.css">
    <link rel="stylesheet" href="assets/css/foot.css">
    <title>ELEXFLEX | Elctronics shop</title>
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
      .mainmain{
          margin-left: 25%;
          margin-top: 10%;
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
      <div class="mainmain">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/A_VMF57YgQE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
