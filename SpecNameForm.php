<?php 
    session_start();

    require 'connect.php';
    require 'filepath.php';

    // processes form for inserting spec name in 'sub_cat_spec' table
    if(isset($_POST['addSpecName'])){
        $ins_spec_query = 'INSERT into sub_cat_spec(name, spec_name) VALUES("'.$_POST['sub-category'].'","'.$_POST['spec-name'].'")';
        echo $ins_spec_query;
        if( mysqli_query($connection, $ins_spec_query) ){
            echo '
            <script type="text/javascript">
                alert("Success!\nNew Specification '.$_POST['spec-name'].' is added for Sub-category '.$_POST['sub-category'].' );
            </script>';
        }
        else{
            echo '
            <script type="text/javascript">
                alert("ERROR!\nFail to add New Specification '.$_POST['spec-name'].' for Sub-category '.$_POST['sub-category'].' ");
            </script>';
        }
    }

    // processes form for updating spec_name in 'sub_cat_spec' table
    if(isset($_POST['editSpecName'])){
        echo $_POST['spec-id'];
        $up_spec_query = 'UPDATE sub_cat_spec set spec_name="'.$_POST['spec-name'].'" where spec_id='.$_POST['spec-id'];
        echo $up_spec_query;
        if( mysqli_query( $connection, $up_spec_query) ){
            echo '
            <script type="text/javascript">
                alert("Specification name is updated as '.$_POST['spec-name'].' for Sub-category '.$_POST['sub-category'].' ");
            </script>';
        }
        else{
            echo '
            <script type="text/javascript">
                alert("Updation failed for Specification name '.$_POST['spec-name'].' in Sub-category '.$_POST['sub-category'].' ");
            </script>';
        }
    }
?>

<html>
    <head>
        <title>Add Spec Name | ElexFlex</title>
        <link rel="stylesheet" type="text/css" href="<?php echo $css_asset ?>forms.css">
    </head>
    <body>
        <!--Header-->
        <header><?php include 'assets/html/header.html' ?></header>
        <!--- content --->
        <main>

        <?php
            // checks if user has admin rights
            if(isset($_SESSION['user'])){
                // checks if sub-category name is recieved by get method.
                if(isset($_GET['sub-category'])){
                    // fetching data of given sub_category from database
                    $sub_cat_query = 'SELECT * from sub_category where name="'.$_GET['sub-category'].'";';
                    $sub_cat_res = mysqli_query($connection, $sub_cat_query);
                    // checking if result contains only one row of data
                    if( mysqli_num_rows($sub_cat_res) == 1){
                        $sub_cat_row = mysqli_fetch_assoc($sub_cat_res);
        ?>
            <!--heading--->
            <h1>
                <?php echo $sub_cat_row['name']; if(isset($_POST['edit'])) echo ': Edit Specfication Name'; else echo ': Add Spec Name' ?>
            </h1>

            <!---form in tabular structure--->
            <form method="post" action="#">
                <input type="hidden" name="sub-category" value="<?php echo $sub_cat_row['name'] ?>" >
                <?php
                    if(isset($_POST['edit']))
                        echo '<input type="hidden" name="spec-id" value="'.$_POST['spec-id'].'">';
                ?>
                <table class="form-table">
                    <tr>
                        <td>Sub-Category Name:</td>
                        <td><?php echo $sub_cat_row['name'] ?></td>
                    </tr>
                    <tr>
                        <td>Category Name:</td>
                        <td><?php echo $sub_cat_row['category'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><h4>Specification</h4></td>
                    </tr>
                    <tr>
                        <td>Name: </td>
                        <td>
                            <input type="text" name="spec-name" maxlength="30" placeholder="Power Rating" <?php if( isset($_POST['edit'])) echo 'value="'.$_POST['spec-name'].'"' ?> required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php  
                                if(isset($_POST['edit'])) // button for editing spec name
                                    echo '<center><input type="submit" name="editSpecName" value="Update Specification Name"></center>';
                                else    // button for adding spec name
                                    echo '<center><input type="submit" name="addSpecName" value="Add Specification Name"></center>';
                            ?>
                        </td>
                    </tr>
                </table>
            </form>

            <!--- Specification list in table --->
            <table>
                <tr>
                    <th>Sr No.</th>
                    <th>Specification Name</th>
                    <th>Action</th>
                </tr>
                <?php
                        // fetching spec names of sub_category
                        $sr_no = 1;
                        $sub_spec_query = 'SELECT spec_id, spec_name from sub_cat_spec where name="'.$sub_cat_row['name'].'"';
                        $sub_spec_res = mysqli_query($connection, $sub_spec_query);
                        while($sub_spec_row = mysqli_fetch_assoc($sub_spec_res)){
                            echo '<tr><td>'.$sr_no.'</td><td>'.$sub_spec_row['spec_name'].'</td>';
                            echo '<td>
                            <form method="post" action="#"> 
                                <input type="hidden" name="sub-category" value="'.$sub_cat_row['name'].'" >
                                <input type="hidden" name="spec-id" value="'.$sub_spec_row['spec_id'].'">
                                <input type="hidden" name="spec-name" value="'.$sub_spec_row['spec_name'].'">
                                <input type="submit" name="edit" value="Edit">
                            </form>';
                            $sr_no++;
                        }
                ?>
            </table>
        <?php
                    }
                    else{
                        echo 'ERROR! Data not loaded properly. Please choose valid sub-category name.';
                    }
                }
                else{
                    echo 'ERROR! Page not loaded properly. Please try again!';
                }
            }
            else{ 
        ?>
            Access denied!
        <?php
            }
        ?>    
        </main>
        <!--Footer-->
        <footer> <?php include 'assets/html/footer.html' ?> </footer>
    </body>
</html>