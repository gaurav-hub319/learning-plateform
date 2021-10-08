<?php 
include("../connection.php");
if(isset($_POST['course_id']))
{
	$id=$_POST['course_id'];
	$sql="select * from course where course_id='$id'";
	$result=mysqli_query($con,$sql);
	while($row=mysqli_fetch_assoc($result)){
		$f=$row['course_id'];
		echo $f;
	}
	
}
?>
