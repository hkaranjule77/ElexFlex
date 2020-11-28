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
    <div class="inner2" id="sub2div">ELECTRONIC APPLIANCES</div>
    <br><br>
    <div class="inner3" id="sub3div">
        <div id="category" class="category1">
        	<input type="image" name="computerAPP" class="image1" src="https://api.time.com/wp-content/uploads/2017/05/laptops.jpg?quality=85">
            <label for="comp" id="comp">COMPUTERS</label>  <br>  
            <select onchange="redirect_page('s1')" id="s1">
                <option>SELECT Category</option>
                <option value="Laptop">Laptop</option>
                <option value="Monitor">Monitor</option>
                <option value="Mouse">Mouse</option>
                <option value="Keyboard">Keyboard</option>
                <option value="Ram">Ram</option>
                <option value="Storage">Storage</option>
            </select>    
        </div>
        <div id="category" class="category2" >
        	<input type="image" name="mobile" class="image1"  src="https://i.cdn.newsbytesapp.com/images/l142_5951592045581.jpg">
            <label for="mobiles" id="phone">ENTERTAINMENT</label> <br>
            <select onchange="redirect_page('s2')" id="s2">
                <option>SELECT Category</option>
                <option value="SmartPhones">SmartPhones</option>
                <option value="Television">Television</option>
            </select>
        </div>
    </div>
    <div class="inner3" id="sub3div">
        <div id="category" class="category3" >
        	<input type="image" name="washingmachine" class="image1" src="https://www.ledlightexpert.com/assets/templates/ledlightexpert-core/images/led-bulb-on_2_OPT.jpg">
            <label for="washingmac" id="washmc">LIGHTS</label> <br>
            <select onchange="redirect_page('s3')" id="s3">
                <option>SELECT Category</option>
                <option value="Bulb">Bulb</option>
                <option value="decoratives">decoratives</option>
                <option value="Led">Led</option>
                <option value="Torch">Torch</option>
                <option value="Lamp">Lamp</option>
            </select>
        </div>
        <div id="category" class="category4" >
        	<input type="image" name="fridge" class="image1" src="https://www.sathya.in/Media/Default/Thumbs/0029/0029021-lg-fridge-gld241argy.jpg">
            <label for="fridge" id="ref">OTHERS</label> <br>
            <select onchange="redirect_page('s4')" id="s4">
                <option>SELECT Category</option>
                <option value="Fridge" >Fridge</option>
                <option value="Fan">Fan</option>
                <option value="Microwave">Microwave</option>
                <option value="Mixer">Mixer</option>
                <option value="Juicer">Juicer</option>
                <option value="Washing+Machine">Washing Machine</option>
            </select>
        </div>
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
    window.location.replace('listing.php?sub-category='+select_ele.value);
}
</script>

</body>
</html>