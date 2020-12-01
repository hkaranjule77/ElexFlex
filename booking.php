<?php 
    require 'connect.php';
    
    error_reporting(E_ERROR | E_PARSE);

    $brand_id = $_POST['brand-id'];
    $brand_name = $_POST['brand-name'];
    $prod_id = $_POST['prod-id'];
    $prod_name = $_POST['prod-name'];
    echo $brand.$brand_name.$prod_id.$prod_name;
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>

<h2>Booking</h2>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="assets\forms\fbooking.php" method="post">
      <input type="hidden" name="brand-id" value="<?php echo $brand_id ?>" >
      <input type="hidden" name="prod-id" value="<?php echo $prod_id ?>" >

        <div class="row">
          <div class="col-50">
            <div class="row">
              <div class="col-50">
                <label for="state">Brand</label>
                <input type="text" id="brand-name" name="brand-name" value="<?php echo $brand_name ?>"  readonly>
              </div>
              <div class="col-50">
            <label for="prod-name">Product</label>
            <input type="text" id="prod-name" name="prod-name" value="<?php echo $prod_name ?>" readonly>
              </div>
            </div></div>
        </div>
        <input type="submit" value="Book this product" class="btn">
      </form>
    </div>
  </div>

</div>

</body>
</html>
