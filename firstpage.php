<?php
    require 'connect.php';
    require 'filepath.php';

    $query = 'SELECT * from category';

    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)){
        echo $row['name'];
        echo '<img src="'.$cat_img_path.$row['img'].'" />';
    }
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
    <div class="inner2" id="sub2div">APPLIANCES</div>
    <br><br>
    <div class="inner3" id="sub3div">
        <div id="category" class="category1" onclick="location.href='laptops.html'">
        	<input type="image" name="computerAPP" class="image1" src="https://api.time.com/wp-content/uploads/2017/05/laptops.jpg?quality=85">
            <label for="comp" id="comp">LAPTOPS</label>
        </div>
        <div id="category" class="category2">
        	<input type="image" name="mobile" class="image1"  src="https://people.utm.my/asmawisham/files/2017/09/iphone-x-vs-8-and-8-plus-display-sizes-cameras-battery-life-face-id-vs-touch-id-and-other-tech-specs.jpg">
        	<label for="mobiles" id="phone">SMARTPHONES</label>
        </div></div>
    <div class="inner3" id="sub3div">
        <div id="category" class="category3">
        	<input type="image" name="washingmachine" class="image1" src="https://d2keuxbrvbdypo.cloudfront.net/media/catalog/product/cache/1/small_image/9df78eab33525d08d6e5fb8d27136e95/s/e/semi_automatic_product_list.png">
        	<label for="washingmac" id="washmc">WASHING MACHINES</label>
        </div>
        <div id="category" class="category4">
        	<input type="image" name="fridge" class="image1" src="https://www.sathya.in/Media/Default/Thumbs/0029/0029021-lg-fridge-gld241argy.jpg">
            <label for="fridge" id="ref">REFRIDGERATORS</label>
        </div>
    </div>
    </div>
</div>
</body>
</html>
