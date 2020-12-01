<?php
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
    </head>
    <body>
        <table>
            <tr>
                <td><img src="files\img\product\inspiron1.png"></td>
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
            <tr>
                <td>
                    <h1>
                    <?php
                        if(mysqli_num_rows($brand_res) == 1){
                            echo mysqli_fetch_assoc($brand_res)['name'];
                        }
                        if(mysqli_num_rows($prod_res) == 1){
                            $prod_row = mysqli_fetch_assoc($prod_res);
                            echo ' '.$prod_row['name'];
                        }
                    ?>
                    </h1>
                    PRICE: <b><?php echo $prod_row['price'] ?></b>
                </td>
            </tr>
        </table>
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