<?php
    session_start();

    require 'connect.php';
    require 'filepath.php';

    //getting all categories
    $cat_query = 'SELECT name from category';
    $cat_res = mysqli_query($connection, $cat_query);

    if(isset($_POST['submit'])){
        $img_file = $_FILES['prod-img'];
        $img_name = $_POST['img-name'].'.jpg';
        $prod_ins_query = 'INSERT into product(name, img, price, sub_category, brand_id) VALUES("'.$_POST['prod-name'].'", "'.$img_name.'", "'.$_POST['prod-price'].'", "'.$_POST['sub-category'].'", '.$_POST['brand-id'].');';
        if(move_uploaded_file($img_file["tmp_name"], $prod_img_path.$img_name )){
            $prod_res = mysqli_query($connection, $prod_ins_query);
            echo '
            <script type="text/javascript">
                alert("New Product added.");
                window.location.href = "./myaccount.php";
            </script>
            ';
        }
    }
    else if(isset($_POST['category'])){
        //getting all sub-categories
        $sub_cat_query = 'SELECT name from sub_category where category="'.$_POST['category'].'";';
        $sub_cat_res = mysqli_query($connection, $sub_cat_query);

        //getting all brand
        $brand_query = 'SELECT * from brand;';
        $brand_res = mysqli_query($connection, $brand_query);
    }

?>
<html>
    <head>
        <title>Add Product | ElexFlex</title>
        <link rel="stylesheet" type="text/css" href="<?php echo $css_asset?>forms.css">
    </head>
    <body>
        <h1>Add Product</h1>
        <form action="#" method="post" enctype="multipart/form-data">
            <table>

                <!---CATEGORY--->
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category">
                            <option disabled selected> -- Select Category -- </option>
                            <?php
                                while($cat_row = mysqli_fetch_assoc($cat_res)){
                                    echo '<option';
                                    if(isset($_POST['category']) && $_POST['category'] == $cat_row['name']) echo ' selected';
                                    echo'>'.$cat_row['name'].'</option>';
                                }
                            ?>
                        </select>
                    </td>
                </tr>

                <?php
                    if(isset($_POST['category'])){
                ?>
                <!---SUB CATEGORY--->
                <tr>
                    <td>Sub-Category</td>
                    <td>
                        <select name="sub-category">
                            <option selected disabled> -- Select Sub-Category -- </option>
                            <?php 
                                while($sub_cat_row = mysqli_fetch_assoc($sub_cat_res)){
                                    echo '<option';
                                    if(isset($_POST['sub-category']) && $_POST['sub-category'] == $sub_cat_row['name']) echo ' selected';
                                    echo '>'.$sub_cat_row['name'].'</option>';
                                }
                            ?>
                        </select>
                    </td>
                </tr>

                <!---BRAND--->
                <tr>
                    <td>Brand</td>
                    <td>
                        <select name="brand-id">
                            <option selected disabled> -- Select Sub-Category -- </option>
                            <?php 
                                while($brand_row = mysqli_fetch_assoc($brand_res)){
                                    echo '<option value="'.$brand_row['brand_id'].'"';
                                    if(isset($_POST['brand-id']) && $_POST['brand-id'] == $brand_row['name']) echo ' selected';
                                    echo '>'.$brand_row['name'].'</option>';
                                }
                            ?>
                        </select>
                    </td>
                </tr>

                <!---PRODUCT--->
                <tr>
                    <td colspan="4"><h4>Product</h4></td>
                </tr>
                <tr>
                    <td> Name</td>
                    <td><input type="text" name="prod-name" maxlength="30" required></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="text" name="prod-price" maxlength="20" required></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><input type="file" accept="image/*" name="prod-img" required></td>
                </tr>
                <tr>
                    <td>New Name for Image</td>
                    <td><input type="text" accept="image/*" name="img-name" maxlength="30" required></td>
                </tr>
                <?php
                    }
                ?>
                <tr>
                    <td colspan="2">
                        <center>
                            <input type="submit" 
                             name="<?php if(! isset($_POST['category'])) echo 'next'; else echo 'submit'; ?>" 
                             value="<?php if(! isset($_POST['category'])) echo 'Next'; else echo 'Add Product'; ?>"
                            >
                        </center>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>