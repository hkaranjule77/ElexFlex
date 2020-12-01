<?php
    require 'connect.php';
    require 'filepath.php';

    $query = 'SELECT * from category';

    $result = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="assets/css/first page.css">
    </head>
    <body>
        <div class="container1" id="maindiv">
            <div class="inner1" id="sub1div">
                WELCOME TO ELEXFLEX
            </div>
            <div class="inner2" id="sub2div">ELECTRONIC APPLIANCES</div>
            <br><br>
            
                <?php
                    $count = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        if($count % 2 == 0)
                            echo '<div class="inner3" id="sub3div">';
                ?>
                <div id="category" class="category" >
                    <img class="image1" src="<?php echo $cat_img_path.$row['img'] ?>"> <br>
                    <label for="fridge" id="ref"><?php echo $row['name'] ?></label> <br>
                    <select onchange="redirect_page('select<?php echo $count?>')" id="select<?php echo $count?>">
                        <option>SELECT Category</option>
                        <?php 
                            $query2 = 'SELECT name from sub_category where category=\''.$row['name'].'\'';
                            $sub_cats = mysqli_query($connection, $query2);
                            while($sub_cat=mysqli_fetch_assoc($sub_cats)){
                        ?>
                        <option value="<?php echo $sub_cat['name'] ?>"><?php echo $sub_cat['name']; ?></option>
                    </select>
                </div>
                <?php
                            }
                            if($count % 2 + 1 == 0)
                                echo '</div>';
                            $count++;
                    }
                ?>
            </div>
        </div>

        <div class="extrainfo">
            <a href="aboutus.html">ABOUT US</a><br>
            <br>
            <a href="contact.html">CONTACT</a>
        </div>
        <script type="text/javascript">
        function redirect_page(select_id){
            var select_ele = document.getElementById(select_id);
            window.open('listing.php?sub-category='+select_ele.value, '_self');
        }
        </script>
    </body>
</html>