<!---file: add specification value for product--->
<!---author: harshad--->
<?php
    session_start();
    include 'connect.php';
    include 'filepath.php';

    if(isset($_GET['prod-id'])){
        $prod_id = $_GET['prod-id'];

        echo $prod_id;
        //fetching product details
        $prod_query = 'SELECT * from product where prod_id='.$prod_id.';';
        echo $prod_query;
        $prod_res = mysqli_query($connection, $prod_query);
        
            $prod_row = mysqli_fetch_assoc($prod_res);
            
            //fetching spec id, spec names
            $spec_names = array(); 
            $spec_name_query = 'SELECT spec_id, spec_name from sub_cat_spec where name="'.$prod_row['sub_category'].'" ORDER BY spec_id;';
            echo $spec_name_query;
            $spec_name_res = mysqli_query($connection, $spec_name_query);
            while($spec_name_row = mysqli_fetch_assoc($spec_name_res)){
                $spec_names[echo $spec_name_row['spec_id']] = $spec_name_row['spec_name'];
                //echo $spec_name_row['spec_id'].$spec_name_row['spec_name'];
            }
        
    }

    if(isset($_POST['prod-spec'])){
        foreach($spec_names as $spec_id->$spec_name){
            $spec_val_query = 'INSERT prod_spec(prod_id, spec_id, spec_value) VALUES('.$_POST['prod-id'].', '.$spec_id.', "'.$_POST['$spec_name'].'");';
            $spec_res = mysqli_query($connection, $spec_val_query);
        } 
    }
?>
<html>
    <head>
        <title><?php if(isset($prod_row['name'])){ echo $prod_row['name'].' | ';} ?>Add Spec Value</title>
        <link rel="stylesheet" type="text/css" href="<?php echo $css_asset ?>forms.css">
    </head>
    <body>
        <h1><?php echo $prod_row['name'] ?>: Add Specification Value</h1>
        <form action="<?php echo $forms_asset ?>fprodspec.php" method="post">

            <input type="hidden" name="prod-id" value="<?php echo $prod_id ?>">
            <table>
                <?php 
                    foreach($spec_names as $spec_id->$spec_name ){
                ?>
                <tr>
                    <td><?php echo $spec_names ?></td>
                    <td>
                        <input type="text" name="<?php echo $spec_name ?>" max-length="30" required>
                    </td>
                </tr>
                <?php
                    }
                ?>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Add" name="prod-spec">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>