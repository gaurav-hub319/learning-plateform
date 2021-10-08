<?php 
session_start();
include("../connection.php");
if(isset($_POST['create_course']))
{
	$name=$_POST['name'];
	$sql="insert into course (course_name) values('$name')";
	$result=mysqli_query($con,$sql);
	if($result)
	{
		
		header("location:course.php");
	}
}


if(isset($_POST['update_course']))
{
	$name=$_POST['name'];

	$id=$_POST['id'];
	$sql="update course set course_name='$name' where course_id='$id'";
	$result=mysqli_query($con,$sql);
	if($result)
	{
		
		header("location:course.php");
	}
}


if(isset($_GET['course_delid']))
{
	$id=$_GET['course_delid'];
	$sql="delete from course where course_id='$id'";
	$result=mysqli_query($con,$sql);
	if($result)
	{
		
		header("location:course.php");
	}
}


?>