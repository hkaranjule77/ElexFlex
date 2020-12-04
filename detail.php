<?php
session_start();

require 'connect.php';
require 'filepath.php';

$query = 'SELECT * from product where prod_id ='.$_GET['prod-id'].';';

$product = mysqli_query($connection, $query);
if(mysqli_num_rows($product) == 1){
    $prod_row = mysqli_fetch_assoc($product);
    $sub_cat = $prod_row['sub_category'];

   
    

   

        $query4 = 'SELECT spec_name from sub_cat_spec where name="'.$sub_cat.'" ORDER By spec_id;';
        $spec_name_res = mysqli_query($connection, $query4);
        $query5 = 'SELECT spec_value from prod_spec where prod_id ='.$_GET['prod-id'].' ORDER By spec_id';
        $spec_val_res = mysqli_query($connection, $query5);

        $query6 = 'SELECT name from brand where brand_id ='.$prod_row['brand_id'];
        $brand_res = mysqli_query($connection, $query6);
        $brand_row = mysqli_fetch_assoc($brand_res);

        $query7 = 'SELECT * from product where prod_id='.$_GET['prod-id'];
        $prod_res = mysqli_query($connection, $query7);
        
    

}
else{
    echo '<h1>ERROR!in fetching your product.<br> Please, try again later!</h1>';
}



?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_GET['prod-id'].'-Product ID | ELEX FLEX' ?></title>
        <link rel="stylesheet" type="text/css" href="assets/css/detail.css">
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets/css/head.css">
        <link rel="stylesheet" href="assets/css/foot.css">
        <title>ELEXFLEX | Electronics shop</title>
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
        body{
            background-image: url("https://previews.123rf.com/images/tashatuvango/tashatuvango1603/tashatuvango160302250/54368250-e-shop-closeup-landing-page-in-doodle-design-style-on-laptop-screen-on-background-of-comfortable-wor.jpg");
        }
       
        td{
            border: 2px solid black;
            background-color: bisque;
            border-radius: 10px;
        }
        .imgtd{
            width: 300px;
            height: 300px;
            border: 2px solid black;
        }
        .spectable{
            margin-top: 100px;
            opacity:0.9;
            border-radius: 10px;
        }
        .imgtd{
            opacity:1;
        }
        .select:hover{
            box-shadow:
            0 0 5px 5px #000,  /* inner white */
            0 0 5px 5px rgb(250, 165, 165), /* middle magenta */
            0 0 5px 5px #0ff; /* outer cyan */
        }
        .select{
            background-color: green;
            font-size: 16px;
            font-family: 'Courier New', Courier, monospace;
            
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
        <div class="maindiv">
        <main>
        <table class="spectable">
            <tr>
                <td class="imgtd"><img src="files\img\product\<?php echo $prod_row['img']?>" ></td>
                <td colspan="2">
                    <h2>Specification</h2>
                    <table id="spec_table">
                        <?php 
                            while($name = mysqli_fetch_assoc($spec_name_res)){
                                $value = mysqli_fetch_assoc($spec_val_res);
                        ?>
                        <tr>
                                <td><?php echo $name['spec_name'] ?></td>
                                <td><?php echo $value['spec_value'] ?></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                </td>
            </tr>
        <table class="spectable1">
            <tr>
                <td class="downifotd">
                    <h1>
                    <?php
                        if(mysqli_num_rows($brand_res) == 1){
                            echo $brand_row['name'];
                        }
                        if(mysqli_num_rows($prod_res) == 1){
                            $prod_row = mysqli_fetch_assoc($prod_res);
                            echo ' '.$prod_row['name'];
                        }
                    ?>
                    </h1>
                    PRICE: <b><?php echo $prod_row['price'] ?></b>
                    <?php
                        echo 'reached another';
                        if(isset($_SESSION['user'])){
                            echo 'reached';
                    ?>
                        <form action="booking.php" method="post">
                            <input type="hidden" name="prod-id" value="<?php echo $prod_row['prod_id'] ?>">
                            <input type="hidden" name="prod-name" value="<?php echo $prod_row['name'] ?>">
                            <input type="hidden" name="brand-id" value="<?php echo $prod_row['brand_id'] ?>">
                            <input type="hidden" name="brand-name" value="<?php echo $brand_row['name'] ?>">
                            <input type="submit" class="select" value="Book">
                        </form>
                    <?php
                        }
                    ?>
                </td>
            </tr>
        </table>
        </main>
        </div>
        <footer>
        <?php
            include 'assets/html/footer.html';
        ?>
        </footer>
        <script type="text/javascript">
            var img_path = [
                <?php 
                    while($prod_img = mysqli_fetch_assoc($img_res) ){
                        echo $prod_img_path.$prod_img['img'].', ';
                    }
                ?>
            ]
        </script>
    </body>
</html>