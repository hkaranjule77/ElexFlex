<?php
    session_start();
    require 'connect.php';
    require 'filepath.php';

    if(isset($_POST['brand-submit'])){
        $brand_query = 'INSERT into brand(name) VALUES("'.$_POST['brand-name'].'");';
        if(mysqli_query($connection, $brand_query)){
            // fetching brand id from db
            $brand_fet_query = 'SELECT brand_id from brand where name="'.$_POST['brand-name'].'";';
            $brand_id_res = mysqli_query($connection, $brand_fet_query);
            $brand_id = mysqli_fetch_assoc($brand_id_res)['brand_id'];

            // inserting brand address
            $add_query = 'INSERT into brand_add(brand_id, plot_no, local_street, city, dist, state) VALUES('.$brand_id.',"'.$_POST['plot-no'].'","'.$_POST['local-street'].'","'.$_POST['city'].'","'.$_POST['dist'].'","'.$_POST['state'].'");';
            $add_res = mysqli_query($connection, $add_query);

            // inserting brand  customer care
            $cc_query = 'INSERT into brand_cc(brand_id, customer_care) VALUES('.$brand_id.',"'.$_POST['customer-care'].'");';
            $cc_query = mysqli_query($connection, $cc_query);

            echo '
                <script type="text/javascript">
                    alert("New Brand added.");
                    window.location.href = "./myaccount.php";
                </script>
            ';
        }
    }
?>
<html>
    <head>
        <title>Add Brand | ElexFlex</title>
        <link rel="stylesheet" type="text/css" href="<?php echo $css_asset ?>forms.css">
    </head>
    <body>
        <?php include $html_asset.'header.html' ?>
        <main>
        <h1>Add Brand</h1>
        <form action="#" method="post">
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="brand-name" maxlength="30" placeholder="Acer"></td>
                </tr>
                <tr>
                    <td>Customer Care</td>
                    <td><input type="text" name="customer-care" maxlength="14" placeholder="9876543210"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <h4>Address</h4>
                    </td>
                </tr>
                <tr>
                    <td>Plot No./Name</td>
                    <td><input type="text" name="plot-no" maxlength="50" placeholder="123, Acer Tower,"></td>
                </tr>
                <tr>
                    <td>Locality/Street Name</td>
                    <td><input type="text" name="local-street" maxlength="50" placeholder="Fort Area, Dr. Annie Besant Rd.,"></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><input type="text" name="city" maxlength="50" placeholder="South Mumbai"></td>
                </tr>
                <tr>
                    <td>District</td>
                    <td><input type="text" name="dist" maxlength="50" placeholder="Mumbai"></td>
                </tr>
                <tr>
                    <td>State</td>
                    <td><input type="text" name="state" maxlength="50" placeholder="Maharashtra"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <center><input type="submit" value="Add Brand" name="brand-submit"></center>
                    </td>
                </tr>
            </table>
        </form>
        </main>
        <?php include $html_asset.'footer.html' ?>
    </body>
</html>