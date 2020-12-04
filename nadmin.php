<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/head.css">
    <link rel="stylesheet" href="assets/css/foot.css">
    <title>ElexFlex | New Admin</title>
    <style>
      main{
        position:fixed;
        top: 15%;
        left: 0;
        right: 0;
        bottom: 10%;
        overflow-x: hidden; 
        overflow-y: auto;
      }
    body {font-family: Arial, Helvetica, sans-serif;
      background-image: url('./assets/img/nwadmbg.jpg');
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    }
/* * {box-sizing: border-box;} */

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 16px;
  margin: 6px 0 20px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 18px 25px;
  margin: 18px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cnclbtn {
  padding: 18px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cnclbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 80px;
}

/* The signup (background) */
.signup {
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 50px;
}

/* signup Content/Box */
.signup-content {
  margin: 5% auto 15% auto; /* 5% from the top, 10% from the bottom and centered */
  width: 90%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Close Button (x) */

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 20px 0 10px 0;
  position: relative;}
  
img.e.jpg{
  width: 40%;
  border-radius: 50%;
}

.container {
background: #99a3a400;
border-radius: 13px;
box-shadow: 0px 0px 70px 10px #555555;
  padding: 20 px;
}

span.psw {
  float: right;
  padding-top: 10x;
}
 
.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cnclbtn, .signupbtn {
     width: 100%;
  }
}
    </style>
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
      <!-- Main Body -->
      <div id="id02" class="signup">
  <span onclick="document.getElementById('id02').style.display='none'; document.getElementById('id01').style.display='none'" class="close" title="Close signup">&times;</span>
  <form class="signup-content" action="./assets/forms/fadm.php" method = POST>
    <div class="container">
    <img src="./assets/img/e.png" alt="icon" class="icon">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="email"><b>Email</b></label><br>
      <input type="text" placeholder="Enter Email" name="email" required>
      <br>
      <label for="psw"><b>Password</b></label><br>
      <input type="password" placeholder="Enter Password" name="psw" required>
      <br>
      <label for="psw-repeat"><b>Repeat Password</b></label><br>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
      <br>
      <label>
        <input type="checkbox" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cnclbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
</div>
      <!-- Main Body -->
    </main>
    <footer>
    <!--Footer-->
    <?php
    include 'assets/html/footer.html';
     ?>
     <!--Footer-->
    </footer>

</body>
</html>