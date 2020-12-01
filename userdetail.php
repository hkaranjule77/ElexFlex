<?php
include("connconf.php");


?>


<html>
<head>
    <link rel="stylesheet" type="text/css" href="assets/css/userdata.css">
</head>

<body>
    <form action="userdetail.php" method="POST">
        <div class="maincont">
            <div class="container" id="usernamediv"><br>ENTER a USERNAME<br><br>
                <input type="username" class="form-control" id="username" placeholder="UserName" name="username">
            </div><br>
            <div class="container" id="namediv"><br>ENTER YOUR NAME<br><br>
                <input type="name" class="form-control" id="inputfname" placeholder="First Name" name="inputfname" >

                <input type="name" class="form-control" id="inputmname" placeholder="Middle Name" name="inputmname">

                <input type="name" class="form-control" id="inputlname" placeholder="Last Name" name="inputlname">
            </div><br>

            <div id="contactdiv" class="container"><br>CONTACT DETAILS AND DATE OF BIRTH<br><br>
                <input type="date" class="form-control" id="inputdob" placeholder="Date of Birth" name="inputdob">

                <input type="text" class="form-control" id="inputnumber" placeholder="mobile number" name="inputnumber">

                <input type="email" class="form-control" id="inputemail" placeholder="email" name="inputemail">
            </div>
            <br>

            <div id="addressdiv" class="container"><br>ENTER YOUR ADDRESS DETAILS<br><br>

                <input type="text" class="form-control" id="inputstreet" placeholder="Street" name="inputstreet">
                
                <input type="text" class="form-control" id="landmark" placeholder="Landmark" name="landmark">

                <input type="text" class="form-control" id="inputCity" placeholder="City" name="inputCity">

                <input type="text" class="form-control" id="inputdistrict" placeholder="District" name="inputdistrict">

                <input type="text" class="form-control" id="inputdistate" placeholder="State" name="inputstate">


                <input type="text" class="form-control" id="inputpincode" placeholder="Zip" name="inputpincode">

                <input type="text" class="form-control" id="inputcountry" placeholder="Country" name="inputcountry">

            </div><br>
            <div id="qualifdiv" class="container"> <br>ENTER QUALIFICATIONS<br><br>

                <input type="text" class="form-control" id="inputqualification" placeholder="Qualification" name="inputqualification">
            </div>
            <br>
            <div class="submitdetails" >
                <input type="submit" class="form-submit" id="submitdetails" name="submitdetails" value="CONFIRM">
            </div>
        </div>
    </form>
</body>

<?php
if(isset($_POST['submitdetails']))
{
$username=$_POST['username'];    
$inputstreet=$_POST["inputstreet"];
$inputlandmark=$_POST['landmark'];
$inputcity=$_POST['inputCity'];
$inputdistrict=$_POST['inputdistrict'];
$inputstate=$_POST['inputstate'];
$inputpincode=$_POST['inputpincode'];

$fname=$_POST['inputfname']; 
$mname=$_POST['inputmname']; 
$lname=$_POST['inputlname']; 
$qualif=$_POST['inputqualification']; 
$dob=$_POST['inputdob']; 
$mobno=$_POST['inputnumber']; 
$email=$_POST['inputemail']; 

$res="INSERT INTO user_add  
VALUES ('$username','na','$inputstreet','$inputlandmark','$inputcity','$inputdistrict','$inputstate','$inputpincode')";

$res="INSERT INTO user_data 
VALUES ('$username','$fname','$mname','$lname','$qualif','$dob','$mobno','$email')";

if ($connection->multi_query($res) === TRUE) {
    do {
        /* store first result set */
        if ($result = mysqli_store_result($connection)) {
            //do nothing since there's nothing to handle
            mysqli_free_result($result);
        }
        /* print divider */
        if (mysqli_more_results($connection)) {
            //I just kept this since it seems useful
            //try removing and see for yourself
        }
    } while (mysqli_next_result($connection));
    echo "New records created successfully";
  } else {
    echo "Error: " . $res . "<br>" . $connection->error;
  }

}
?>

</html>