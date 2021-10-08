<?php 
session_start();
include("../connection.php");
if(isset($_POST['create_question']))
{

	$question=$_POST['question'];
	$point=$_POST['point'];	
    $tag=$_POST['tag'];
	$course=$_POST['course'];
	$passing=$_POST['passing'];
	$op1=$_POST['op1'];	
    $op2=$_POST['op2'];
	$op3=$_POST['op3'];
	$op4=$_POST['op4'];
	$n = $_POST['form-input'];
	$sql="insert into quiz_question (question_name,points,c_id,tag,op_one,op_two,op_three,op_four) values('$question','$point','$course','$tag','$op1','$op2','$op3','$op4')";
	$result=mysqli_query($con,$sql);
	if($result)
	{
		$last_id = mysqli_insert_id($con);
		$ans=$_POST['answer'];
		foreach($ans as $item)
       {
					$as="insert into quiz_answer (question_id,answer) values('$last_id','$item')";
				  $res=mysqli_query($con,$as);
        }


		for($i=0;$i<$n;$i++){
			if(!empty($_POST['question'.$i.''])){
				    $q=$_POST['question'.$i.''];
			        $p=$_POST['point'.$i.''];
			        $tag=$_POST['tag'.$i.''];

			        $opone=$_POST['opone'.$i.''];	
						  $optwo=$_POST['optwo'.$i.''];
							$opthree=$_POST['opthree'.$i.''];
							$opfour=$_POST['opfour'.$i.''];

			        $sql="insert into quiz_question (question_name,points,c_id,tag,op_one,op_two,op_three,op_four) values('$q','$p','$course','$tag','$opone','$optwo','$opthree','$opfour')";
				      $result=mysqli_query($con,$sql);
				    if($result){
						    $last_id = mysqli_insert_id($con);
								$ans=$_POST['answer'.$i.''];
								foreach($ans as $item)
						       {
								      $as="insert into quiz_answer (question_id,answer) values('$last_id','$item')";
							        $res=mysqli_query($con,$as);
						        }
			          }
			        }
			}
    
		$u="update course set quize_created='1',passing_mark='$passing' where course_id='$course'";
		$re=mysqli_query($con,$u);
		

		$content="";		
   $file = ($f. '.php');
   file_put_contents($file, $content);
   $upsql="update course set quiz_file='$file' where course_id='$cid'";
	$result=mysqli_query($con,$upsql);

	}
}




	









if(isset($_POST['update_question']))
{
	$name=$_POST['question'];
	$point=$_POST['point'];
	$id=$_POST['qid'];
	$sql="update quiz_question set question_name='$name',points='$point' where question_id='$id'";
	$result=mysqli_query($con,$sql);
	if($result)
	{
		
		header("location:viewquiz.php");
	}
}






if(isset($_GET['question_delid']))
{
	$id=$_GET['question_delid'];
	$sql="delete from quiz_question where question_id='$id'";
	$result=mysqli_query($con,$sql);
	if($result)
	{
		
		header("location:viewquiz.php");
	}
}
?>