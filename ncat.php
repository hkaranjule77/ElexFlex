<!DOCTYPE html>
<?php
session_start();
include 'filepath.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElexFlex | New Category</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $css_asset ?>ncat.css" >
    <style>
      h1{
        color: #ec3636;
        margin: 2% 1% 1% 4%;
      }
      td{
        padding: 2%;
      }
      input[type="text"]{
        width: 80%;
        padding: 1%;
        border: 1px solid #333333;
        border-radius: 5px;
      }
      input[type="text"]:focus{
        border: 1px solid black;
      }
      input[type="submit"]{
        background-color: #ec3636;
        border: 0px;
        padding: 1% 2%;
        opacity: 0.9;
        border-radius: 6px;
      }
      input[type="submit"]:hover{
        opacity: 1;
      }
      /* for head  */
      main{
        position:fixed;
        top: 15%;
        left: 0;
        right: 0;
        bottom: 10%;
        overflow-x: hidden; 
        overflow-y: auto;
        text-align: center;
      }
      @media screen and (max-width: 600px) {
        .col-25, .col-75, input[type=submit] {
          width: 100%;
          margin-top: 0;
        }
      }
      body{
        background-image: url('<?php echo $img_asset_url ?>bg1.jpg');
      }
      
      table{
        width: 50%;
        margin-left: auto;
        margin-right: auto;
        text-align: left;
      }
    </style>
</head>
<body>
<!--Connection-->
<?php
      include 'db_connection.php';
      $conn = Connect();
    ?>
    <!--Connection-->
    <header>
      <!--Header-->
      <?php
      include 'assets/html/header.html';
      ?>
      <!--Header-->
    </header>
    <main>
      <!-- Main Body -->
      <h1>ADD A NEW CATEGORY</h1>
      <br>
    <form id="cat-form" method="post" action="#" enctype="multipart/form-data">
      <table>
        <tr>
          <td>
            <label for="name">Category Name</label>
          </td>
          <td>
            <input type="text" name="name" class='catname'placeholder="Kitchen Appliance (max 30 characters)" maxlength="30" required>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <label for="image">
              <h3>Image</h3>
            </label><br>
          <td>
        </tr>
        <tr>
          <td>
            <label for="nc-cat-img">Select image for category</label>
          </td>
          <td>
            <input type="file" id="file" accept="image/*" name="file">
          </td>
        </tr>
        <tr>
          <td>
            <label for="img-name">Enter new name for without extension</label>
          </td>
          <td>
            <input type="text" id="cat-img-name" name="cat-img-name" class='catname' max-length="30" placeholder="Unique name Eg. kit12 (max 30 characters)">
          </td>
        </tr>
        <tr>
          <td><ul id="err-list"></ul></td>
        </tr>
        <tr>
          <td colspan="2">
            <center><input type="submit" value="Add Category" name='submit'></center>
          </td>
        </tr>
      </table>
    </form>
      <!-- Main Body -->
    </main>
    <footer>
    <!--Footer-->
    <?php
      include 'assets/html/footer.html';
    ?>
    <!--Footer-->
    </footer>
    <script src="<?php echo $js_asset ?>ncat.js"></script>
</body>
<?php
if(isset($_POST['submit'])){
echo 'submitted';
$mysqli = new mysqli("localhost","root","","elexflex");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
  $img_file = $_FILES["file"];
  $img_size = $img_file['size'];
  if($img_size < 200000){
    $sql = "INSERT INTO category (name, img) VALUES ('".$_POST["name"]."', '".$_POST["cat-img-name"].".jpg');";
    if ($mysqli->query($sql) === TRUE) {
        echo $img_file['name'];
        echo $cat_img_path.$_POST['cat-img-name'].'.jpg';
        if(move_uploaded_file($img_file["tmp_name"], $cat_img_path.$_POST['cat-img-name'].'.jpg')){
          echo 'Category added Succesfully';
          header("Location: ./myaccount.php");
        }
        else{
          echo 'ERROR! image upload unsuccessful.';
        }
      } 
      else {
        echo "<script>Error: " , $res , "<br>" , $mysqli->error, "<script>";
        // "Error: " , '$sql' . "<br>" , '$mysqli->error' ---to find error
      }
    }
  }
  else{
    echo 'Image file size exceed.';
  }
?>
</html>