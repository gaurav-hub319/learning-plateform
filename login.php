<?php 
session_start(); // Starting Session
$error='';
include("connection.php");
if(isset($_POST['student']))
{
	$username=$_POST['username'];
    $password=$_POST['password'];
 	$hash = password_hash($password, PASSWORD_DEFAULT);
    	$query ="select * from student where email='$username'";
	    $result=mysqli_query($con,$query);
		while($row=mysqli_fetch_assoc($result)){
			 if(password_verify($password, $row["password"])){
				$_SESSION['login_user']=$username; // Initializing Session
				header("location: student/index.php"); // Redirecting To Other Page
			} 
			else {
				$error = "Username or Password is invalid";
				header("location: student.php?msg=$error");
			}
        }	
}

if(isset($_POST['teacher']))
{
	$username=$_POST['username'];
    $password=$_POST['password'];
 	$hash = password_hash($password, PASSWORD_DEFAULT);
    	$query ="select * from teacher where email='$username'";
	    $result=mysqli_query($con,$query);
		while($row=mysqli_fetch_assoc($result)){
			 if(password_verify($password, $row["password"])){
				$_SESSION['login_admin']=$username; // Initializing Session
				header("location: teacher/index.php"); // Redirecting To Other Page
			} 
			else {
				$error = "Username or Password is invalid";
				header("location: teacher.php?msg=$error");
			}
        }
   

}



if(isset($_POST['signup'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
    $password=$_POST['password'];
    $hash = password_hash($password,PASSWORD_DEFAULT);
    $sql="insert into student (name,email,password) values ('$name','$email','$hash')";
    $result=mysqli_query($con,$sql);
    if($result)
    {
    	header("location:student.php");
    }

}


if(isset($_POST['tsignup'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
    $password=$_POST['password'];
    $hash = password_hash($password,PASSWORD_DEFAULT);
    $sql="insert into teacher (name,email,password) values ('$name','$email','$hash')";
    $result=mysqli_query($con,$sql);
    if($result)
    {
    	header("location:teacher.php");
    }

}
?>