<?php
    session_start();
    require 'connect.php';

    if(isset($_POST['prod-spec'])){
        $prod_id = $_POST['prod-id'];

        //fetching spec id, spec names
        $spec_names = array(); 
        $spec_name_query = 'SELECT spec_id, spec_name from sub_cat_spec where sub_category="'.$prod_row['sub_category'].'" ORDER BY spec_id;';
        $spec_name_res = mysqli_query($connection, $spec_name_query);
        while($spec_name_row = mysqli_fetch_assoc($spec_name_res)){
            $spec_names[$spec_name_row['spec_id']] = $spec_name_row['spec_name'];
        }

        //inserting data in DB
        $all_value_inserted = TRUE;
        foreach($spec_names as $spec_id->$spec_name){
            $spec_value_query = 'INSERT into prod_spec(prod_id, spec_id, spec_value) VALUES('.$prod_id.', '.$spec_id.', '.$_POST['$spec_name'];
            if(mysqli_query($connection, $spec_value_query)){
                echo $spec_name.' = '.$_POST['$spec_id'].' data added.';
            }
            else{
                echo $spec_name.' = '.$_POST['$spec_id'].' failed to add.';
                $all_value_inserted = FALSE;
            }
        }
        if($all_value_inserted){
            echo '<br><br> ALL Specification Values inserted PROPERLY';
        }
        else{
            echo '<br><br> ERROR! ALL Specification Values NOT inserted.';
        }
    }
?>