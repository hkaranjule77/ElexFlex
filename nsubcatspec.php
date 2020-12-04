<!---file: add specification name for sub-category--->
<!---author: harshad--->
<?php
    session_start();
    include 'connect.php';
    include 'filepath.php';

    if(isset($_POST['sub-category'])){
        $sub_category = $_POST['sub-category'];
    }
?>
<html>
    <head>
        <title></tile>
        <link rel="stylesheet" type="text/css" href="<?php echo $css_asset ?>forms.css">
    </head>
    <body>
        <h1><?php echo $sub_category ?>: Add Specification Name</h1>

    </body>
</html>