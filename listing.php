<?php 
session_start();
require 'connect.php';
require 'filepath.php';

$query = 'SELECT * from product where sub_category="'.$_GET['sub-category'].'"';


    $products = mysqli_query($connection, $query);
    if(mysqli_num_rows($products) == 0){
        echo '<h1>ERROR! Currently, No such data available.</h1>';
    }

    $brand_query = 'SELECT * from brand';
    $brand_assoc = array();
    $brand_res = mysqli_query($connection, $brand_query);
    if($brand_res){
        while($brand_row = mysqli_fetch_assoc($brand_res)){
            $brand_assoc[$brand_row['brand_id']] = $brand_row['name'];
        }
    }

?>


<html>
    <head>
        <title><?php echo $_GET['sub-category'].' | ElexFlex' ?></title>
        <link rel="stylesheet" href="assets/css/head.css">
        <link rel="stylesheet" href="assets/css/foot.css">
        <style>
            body{
                background-color:  #99a3a4;
            }
            img{
                width: 200px;
                height: 160px;
                display: inline;
                float: left;
                padding: 1% 1%;
            }
            .container{
                background-color: #ffffff;
                border: 1px solid #555555;
                border-radius: 10px;
                padding: 1% 1%;
                height: 200px;
                margin: 1%;
            }
            .prod-name{
                margin: 1% 0% 0.7% 10%;
            }
            main{
                position:fixed;
                top: 15%;
                left: 0;
                right: 0;
                bottom: 10%;
                overflow-x: hidden; 
                overflow-y: auto;
            }
            input[type="submit"]{
                background-color: #90EE90;
                border: 0px;
                border-radius: 5px;
                margin: 1%;
                padding: 0.5% 1%;
            }
    </style>
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
        <?php
            if( $products ){
                $prod_count = 0;
                while($prod_row = mysqli_fetch_assoc($products)){
                    $prod_count += 1;
                    if($prod_count < 20){
                        

        ?>
        <a href="detail.php?prod-id=<?php echo $prod_row['prod_id'] ?>">
            <div class="container">
                <img src="<?php echo $prod_img_path.$prod_row['img'] ?>" />
                <h2><?php echo $brand_assoc[$prod_row['brand_id']].' '.$prod_row['name']?></h2>
                <br>
                Price: 
                <?php echo $prod_row['price'];
                if(isset($_SESSION['user'])){
                ?>
                    <form action="booking.php" method="post">
                        <input type="hidden" name="prod-id" value="<?php echo $prod_row['prod_id'] ?>">
                        <input type="hidden" name="prod-name" value="<?php echo $prod_row['name'] ?>">
                        <input type="hidden" name="brand-id" value="<?php echo $prod_row['brand_id'] ?>">
                        <input type="hidden" name="brand-name" value="<?php echo $brand_assoc[$prod_row['brand_id']] ?>">
                        <input type="submit" value="Book">
                    </form>
                <?php
                }
                ?>
            </div>
        </a>
        <?php 
                    }
                }
            }
        ?>
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