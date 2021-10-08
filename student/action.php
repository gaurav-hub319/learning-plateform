<?php 
include("../connection.php");
if(isset($_POST['course_id']))
{
	$id=$_POST['course_id'];
	$sql="select * from course where course_id='$id'";
	$result=mysqli_query($con,$sql);
	while($row=mysqli_fetch_assoc($result)){
		$f=$row['quiz_file'];
	}
	 $filename = "../teacher/".$f;  

		$fp = fopen($filename, "r");//open file in read mode    
		  
		$contents = fread($fp, filesize($filename));//read file    
		  
		echo $filename;//printing data of file  
		   
	fclose($fp);
}
?>