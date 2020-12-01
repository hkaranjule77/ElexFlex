<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

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
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 50px;
}

/* signup Content/Box */
.signup-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 10% from the bottom and centered */
  border: 1px solid #888;
  width: 90%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

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
background: #E74C3C;
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
<body>

<button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Sign Up</button>

<div id="id02" class="signup">
  <span onclick="document.getElementById('id02').style.display='none'; document.getElementById('id01').style.display='none'" class="close" title="Close signup">&times;</span>
  <form class="signup-content" action="./assets/forms/fsignup.php" method = POST>
    <div class="container">
<img src="./assets/img/e.png" alt="icon" class="icon">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
     
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

<script>
// Get the signup
var signup = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == signup) {
    signup.style.display = "none";
  }
  if (event.target == form) {
        form.style.display = "none";
    }
}
</script>

</body>
</html>

