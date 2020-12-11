<!--- File: Brand Listing page --->
<!--- Author: Harshad Karanjule --->
<?php 
    session_start();

    require 'connect.php';
    require 'filepath.php';

    //fetching brand details
    $comp_query = 'SELECT * from complaint;';
    $comp_res = mysqli_query($connection, $comp_query);
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
                    <th>Complaint ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Mob No</th>
                    <th>Complain</th>
                </tr>
        <?php
                while($comp_row = mysqli_fetch_assoc($comp_res)){
        ?>
                    <tr>                    
                    <!--- complaint ID --->
                        <td><?php echo $comp_row['comp_id'] ?></td>
                    <!--- complainer's first name --->
                        <td><?php echo $comp_row['fname'] ?></td>
                    <!--- complainer's last name --->
                        <td><?php echo $comp_row['lname'] ?></td>
                    <!--- complainer's mobile number --->
                        <td><?php echo $comp_row['mob_no'] ?></td>
                    <!--- complaint --->
                        <td><?php echo $comp_row['complaint'] ?></td>
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