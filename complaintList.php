<!--- File: Brand Listing page --->
<!--- Author: Harshad Karanjule --->
<?php 
    session_start();

    require 'connect.php';
    require 'filepath.php';

    //fetching brand details
    $brand_query = 'SELECT * from brand';
    $brand_res = mysqli_query($connection, $brand_query);
?>

<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="<?php echo $css_asset.'style.css' ?>" >
    </head>
    <body>
        <header>
        <!--Header-->
        <?php
            include 'assets/html/header.html';
        ?>
        <!--Header-->
        </header>
    <main>
        <?php
            // checks if user is authenticated 
            if(isset($_SESSION['user'])){
        ?>
            <table>
                <tr>
                    <th>Brand</th>
                    <th>Customer Care</th>
                    <th>Regtd. Office</th>
                </tr>
        <?php
                while($brand_row = mysqli_fetch_assoc($brand_res)){
        ?>
                    <tr>
                    <!--- brand name --->
                        <td><?php echo $brand_row['name'] ?></td>
                    <!--- brand customer care --->
                        <?php 
                            $brand_cc_query = 'SELECT customer_care from brand_cc where brand_id='.$brand_row['brand_id'].';'; 
                            $brand_cc_res = mysqli_query($connection, $brand_cc_query);
                            $brand_cc_row = mysqli_fetch_assoc($brand_cc_res);
                        ?>
                        <td><?php echo $brand_cc_row['customer_care'] ?></td>
                    <!--- brand  --->
                        <?php 
                            $brand_ad_query = 'SELECT * from brand_add where brand_id='.$brand_row['brand_id'].';'; 
                            $brand_ad_res = mysqli_query($connection, $brand_ad_query);
                            $brand_ad_row = mysqli_fetch_assoc($brand_ad_res);
                        ?>
                        <td><?php echo $brand_ad_row['plot_no'].' '.$brand_ad_row['local_street'].' '.$brand_ad_row['city'].', '.$brand_ad_row['dist'].', '.$brand_ad_row['state'] ?></td>
                    </tr>
        <?php
                }
        ?>
            </table>
        <?php }
            else{ //if user is not authenticated
                echo 'ACCESS DENIED!'; 
            }
        ?>    
        </main>
        <footer>
        <!--Footer-->
        <?php
        include 'assets/html/footer.html';
         ?>
         <!--Footer-->
    </body>
</html>