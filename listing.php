<?php 
require 'connect.php';
require 'filepath.php';

$query = 'SELECT * from product where sub_category="'.$_GET['sub-category'].'"';


    $products = mysqli_query($connection, $query);
    if(mysqli_num_rows($products) == 0){
        echo '<h1>ERROR! Currently, No such data available.</h1>';
    }

?>


<html>
    <head>
        <title><?php echo $_GET['sub-category'].' | ElexFlex' ?></title>
        <style>
            body{
                background-color: #bb595f;
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
        </style>
    </head>
    <body>
        <?php
            if( $products ){
                $prod_count = 0;
                while($prod_row = mysqli_fetch_assoc($products)){
                    $prod_count += 1;
                    if($prod_count < 11){
        ?>
        <div class="container">
            <img src="<?php echo $prod_img_path.$prod_row['img'] ?>" />;
            <h2><?php echo $prod_row['name'];?></h2>
            <br>
            Price: <?php echo $prod_row['price'];?>
        </div>
        <?php 
                    }
                }
            }
        ?>
    </body>
</html>