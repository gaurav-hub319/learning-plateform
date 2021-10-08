<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <div>
    <form action="result.php" method="post">
    <ul>
     
        <?php
        include("../connection.php");
        if(isset($_GET['course_id'])){
          $id=$_GET['course_id'];

         $u="select * from quiz_question where c_id='$id'";
         $re=mysqli_query($con,$u);
         while($row=mysqli_fetch_assoc($re))
         {
          ?>
           <li>
                
                    <h3><?php echo $row['question_name'] ;?></h3>
                    <input type="hidden" name="qid" value="<?php echo $row['question_id'] ;?>">
                    <div>
                        <input type="radio" name="question-answers[]" id="question-1-answers-A" value="A" />
                        <label for="question-1-answers-A">A) <?php echo $row['op_one'] ;?> </label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-answers[]" id="question-1-answers-B" value="B" />
                        <label for="question-1-answers-B">B) <?php echo $row['op_two'] ;?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-answers[]" id="question-1-answers-C" value="C" />
                        <label for="question-1-answers-C">C) <?php echo $row['op_three'] ;?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-answers[]" id="question-1-answers-D" value="D" />
                        <label for="question-1-answers-D">D) <?php echo $row['op_four'] ;?></label>
                    </div>
                
                </li>
          <?php 
         }
       }
         ?>
      
    </ul>
    <input type="submit" name="submit" value="submit">
  </form>
  </div>
</body>
</html>