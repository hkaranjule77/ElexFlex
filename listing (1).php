<?php 
require 'connect.php';
require 'filepath.php';

$query = 'SELECT * from design where sub_category="'.$_GET['sub-category'].'"';


    $designs = mysqli_query($connection, $query);
    if(mysqli_num_rows($designs) == 0){
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
                width: 95%;
                height: 190px;
                display: inline;
                float: left;
                padding: 1% 1%;
                padding-bottom: 20px;
                border-radius: 10px
            }
            .container{
                background-color: #ffffff;
                border: 1px solid #555555;
                border-radius: 10px;
                padding: 1% 1%;
                height: 280px;
                margin: 1%;
            }
            .prod-name{
                margin: 1% 0% 0.7% 10%;

            }

            .prodinfo {
                text-align: start;
                border: 3px solid black;
                min-width: 500px;
                padding: 10px 10px 10px 10px;
                border-radius: 10px;
                border-color: indigo;

            }
            .prodinfo:hover {
                box-shadow: 2px 2px 5px 5px;
            }

            .listing {
                border: 3px solid black;
                padding: 10px 10px 10px 10px;
                width: 100%;
                height: 280px;
                border-radius: 10px;
                border-color: indigo;

            }

            img:hover {
                box-shadow: 2px 2px 5px 5px;
            }

            .imgplace {
                min-width: 300px;
                border: 3px solid black;
                padding: 10px 10px 10px 10px;
                border-radius: 10px;
                border-color: indigo;
            }


        </style>
    </head>
    <body>
        <?php
            if( $designs ){
                while($row = mysqli_fetch_assoc($designs)){
                    $prod_query = 'SELECT * from product where prod_id = '.$row['prod_id'];
                    $prod = mysqli_query($connection, $prod_query);
                    $prod_count = 0;
                    if($prod){
                        while($prod_row = mysqli_fetch_assoc($prod)){
                            $prod_count += 1;
                            if($prod_count < 11){
        ?>
        <div class="container">
            <table class="listing">
                <tr><td class="imgplace"><img src="<?php echo $prod_img_path.$prod_row['img'] ?>" /></td>
                    <td class="prodinfo">
            <h2>Name: <?php echo $prod_row['name'];?></h2>
            <br>
            Price: <?php echo $prod_row['price'];?></td></tr>
        </div>
            </table>
        <?php 
                            }
                        }
                    }
                }
            }
        ?>
    </body>
</html>