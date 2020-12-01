<?php
require 'connect.php';
require 'filepath.php';

error_reporting(E_ERROR | E_PARSE);

$category = $_POST['category'];
$sub_category = $_POST['sub-category'];
$product = $_POST['product'];
$serial_1 = $_POST['serial-1'];
$serial_2 = $_POST['serial-2'];

if(isset($category) && isset($sub_category) && isset($product) && isset($serial_1) && isset($serial_2)){
    $item_query = 'INSERT into item(srno1, srno2, prod_id) values("'.$serial_1.'","'.$serial_2.'",'.$product.')';
    $result = mysqli_query($connection, $item_query);
    echo 'Data added successfully.';
}
if(isset($category) && isset($sub_category)){
    $prod_query = 'SELECT prod_id, name from product where sub_category="'.$sub_category.'"';
    $prod_res = mysqli_query($connection, $prod_query);
}
if(isset($category)){
    $sub_cat_query = 'SELECT name from sub_category where category="'.$category.'"';
    $sub_cat_res = mysqli_query($connection, $sub_cat_query);
}
$cat_query = 'SELECT name from category';
$cat_res = mysqli_query($connection, $cat_query);

$query = 'SELECT * from ';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add ITEM</title>
        <link rel="stylesheet" type="text/css" href="assets\css\addItem.css">
        <link rel="stylesheet" href="assets/css/head.css">
        <link rel="stylesheet" href="assets/css/foot.css">
    </head>
    <body>
        <header>
            <?php include 'assets\html\header.html'; ?>
        </header>
        <h1>Add Item</h1>
        <form method="post" action="#">
            <table>
                <tr>
                    <td>
                        <label for="category">Category</label>
                    </td>
                    <td>
                        <select name="category">
                            <?php
                                if(mysqli_num_rows($cat_res)){
                                    while($cat_row = mysqli_fetch_assoc($cat_res)){
                            ?>
                                <option <?php if($category == $cat_row['name']) echo 'selected' ?> >
                                    <?php echo $cat_row['name'] ?>
                                </option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <?php if(isset($category) && $category != ''){ ?>
                <tr>
                    <td>
                        <label for="sub-category">Sub Category</label>
                    </td>
                    <td>
                        <select name="sub-category">
                            <?php
                                if(mysqli_num_rows($sub_cat_res)){
                                    while($sub_cat_row = mysqli_fetch_assoc($sub_cat_res)){
                            ?>
                                <option <?php if($sub_category == $sub_cat_row['name']) echo 'selected' ?> >
                                    <?php echo $sub_cat_row['name'] ?>
                                </option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <?php } ?>
                <?php if(isset($sub_category) && $sub_category != ''){?>
                <tr>
                    <td>
                        <label for="product">Product</label>
                    </td>
                    <td>
                        <select name="product">
                            <?php
                                if(mysqli_num_rows($prod_res)){
                                    while($prod_row = mysqli_fetch_assoc($prod_res)){
                            ?>
                                <option value="<?php echo $prod_row['prod_id'] ?>"<?php if($product == $prod_row['prod_id']) echo 'selected' ?> >
                                    <?php echo $prod_row['name'] ?>
                                </option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="serial-1">Serial Number 1:</label>
                    </td>
                    <td>
                        <input type="text" name="serial-1">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="serial-2">Serial Number 2:</label>
                    </td>
                    <td>
                        <input type="text" name="serial-2">
                    </td>
                </tr>
                        <?php }?>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="<?php if(isset($sub_category)) echo 'SUBMIT'; else echo 'NEXT'; ?>">
                    </td>
                </tr>
            </table>
        </form>
        <footer>
            <?php include 'assets\html\footer.html' ?>
        </footer>
    </body>
</html>