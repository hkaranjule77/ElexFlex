<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElexFlex | New Admin</title>
    <style>
    input[type=text], input[type=password] {
  width: 90%;
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
    .cnclbtn {
  padding: 18px 20px;
  background-color: #f44336;
}
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}
/* Float cancel and signup buttons and add an equal width */
.cnclbtn, .signupbtn {
  float: left;
  width: 50%;
}
.signup {
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 50px;
}
.signup-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 10% from the bottom and centered */
  border: 1px solid #888;
  width: 90%; /* Could be more or less, depending on screen size */
}
    @media screen and (max-width: 300px) {
  .cnclbtn, .signupbtn {
     width: 100%;
  }
}
    </style>
</head>
<body>
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
</body>
</html>