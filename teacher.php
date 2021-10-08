<?php
session_start();
if(isset($_SESSION['login_admin'])){
header("location: teacher/index.php");
}
else{
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
    body {
  background: #4a93b5;
  font-family: sans-serif;
  font-size: 10px
}
form {
  background: #fff;
  padding: 4em 4em 2em;
  max-width: 500px;
  margin: 50px auto 0;
  box-shadow: 0 0 1em #222;
  border-radius: 2px;}
  h2 {
    margin:0 0 30px 0;
    padding:10px;
    text-align:center;
    font-size:26px;
    color:black;
    border-bottom:solid 1px #e5e5e5;
  }
  
  input {
    display: block;
    box-sizing: border-box;
    width: 100%;
    outline: none;
    margin:0;
  }
  input[type="email"],
  input[type="password"] {
    background: #fff;
    border: 1px solid #dbdbdb;
    font-size: 1.4em;
    padding: .5em;
    border-radius: 2px;
  }
  input[type="email"]:focus,
  input[type="password"]:focus {
    background: #fff
  }
  span {
    display:block;
    background: #F9A5A5;
    padding: 2px 5px;
    color: #666;
  }
  input[type="submit"] {
    background: #4a93b5;
    box-shadow: 0 3px 0 0 #4a93b5;
    border-radius: 2px;
    border: none;
    color: #fff;
    cursor: pointer;
    display: block;
    font-size: 1.5em;
    outline: none;
    padding: .8em 0;
    text-shadow: 0 1px #4a93b5;
  }
  input[type="submit"]:hover {
    background: #4a93b5;
    text-shadow:0 1px 3px #4a93b5;
  }
  
  label{
   
    color: black;
    font-size: 16px;
    display: inline-block;
    padding: 4px 10px;
    font-weight: 400;
    background-color: rgba(255,255,255,0);

  }
    
  
    </style>

</head>
<body>
    <form action="login.php" method="post" enctype="multipart/form-data">
  <h2>Teacher</h2>
  
    <p>
      <label for="Email" class="floatLabel">Email</label>
      <input id="Email" name="username" type="email">
    </p>
    <p>
      <label for="password" class="floatLabel">Password</label>
      <input id="password" name="password" type="password">
    </p> 
    <p>
      <input type="submit" value="Sign In" id="submit" name="teacher">
    </p>
    <p>
     <a href="teachersignup.php" style="padding:5px;font-size:16px;">New Teacher ? Sign Up</a>
    </p>
  </form>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
    


<?php }?>
