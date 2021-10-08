<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
  input[type="text"],
  input[type="password"] {
    background: #fff;
    border: 1px solid #dbdbdb;
    font-size: 1.4em;
    padding: .5em;
    border-radius: 2px;
  }
  input[type="text"]:focus,
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
  <h2>Student Sign Up</h2>
  <p>
      <label for="Name" class="floatLabel">Name</label>
      <input id="Name" name="name" type="text" required="">
    </p>
    <p>
      <label for="Email" class="floatLabel">Email</label>
      <input id="Email" name="email" type="text" required="">
    </p>
    <p>
      <label for="password" class="floatLabel">Password</label>
      <input id="password" name="password" type="password">
      <span>Enter a password longer than 8 characters</span>
    </p>
    <p>
      <label for="confirm_password" class="floatLabel">Confirm Password</label>
      <input id="confirm_password" name="confirm_password" type="password">
      <span>Your passwords do not match</span>
    </p>
    <p>
      <input type="submit" value="Sign Up" id="submit" name="signup">
    </p>
    <p >
     <a href="student.php" style="padding:5px;font-size:16px;">New Student ? Sign In</a>
    </p>
  </form>
  
     <script src="
https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script type="text/javascript">
    var $password = $("#password");
    var $confirmPassword = $("#confirm_password");

//Hide hints
$("form span").hide();

function isPasswordValid() {
  return $password.val().length > 8;
}

function arePasswordsMatching() {
  return $password.val() === $confirmPassword.val();
}

function canSubmit() {
  return isPasswordValid() && arePasswordsMatching();
}

function passwordEvent(){
    //Find out if password is valid  
    if(isPasswordValid()) {
      //Hide hint if valid
      $password.next().hide();
    } else {
      //else show hint
      $password.next().show();
    }
}

function confirmPasswordEvent() {
  //Find out if password and confirmation match
  if(arePasswordsMatching()) {
    //Hide hint if match
    $confirmPassword.next().hide();
  } else {
    //else show hint 
    $confirmPassword.next().show();
  }
}



//When event happens on password input
$password.focus(passwordEvent).keyup(passwordEvent).keyup(confirmPasswordEvent).keyup(enableSubmitEvent);

//When event happens on confirmation input
$confirmPassword.focus(confirmPasswordEvent).keyup(confirmPasswordEvent).keyup(enableSubmitEvent);

enableSubmitEvent();
  </script>
</body>
</html>
