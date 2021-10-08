<?php  include("../connection.php");
        if(isset($_GET['course_id'])){
          $id=$_GET['course_id'];

          $cname="select * from course where course_id='$id'";
         $cre=mysqli_query($con,$cname);
         while($rowc=mysqli_fetch_assoc($cre))
         {
             $coursename= $rowc['course_name'] ;
          }
          ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style type="text/css">
    ul li{
        list-style: none;
    }
    .formblock{
        
    }
    .formblock ol{
        width: 600px;
        border: 2px solid blue;
        margin: auto;
    }
</style>
</head>
<body>
    <h2 class="text-center p-3" style="text-transform:uppercase; "><?php echo $coursename;?>&nbsp;&nbsp;QUIZ</h2>
  <div class="formblock">
    
    <ol>
     
        <?php
       

         $u="select * from quiz_question where c_id='$id'";
         $re=mysqli_query($con,$u);
         while($row=mysqli_fetch_assoc($re))
         {
          ?>
           <li>
                
                    <h6><?php echo $row['question_name'] ;?></h6>
                    <input type="hidden" name="qid" value="<?php echo $row['question_id'] ;?>">
                    <div>
                        <input type="checkbox" name="question-answers[]" id="question-1-answers-A" value="A" />
                        <label for="question-1-answers-A">A) <?php echo $row['op_one'] ;?> </label>
                    </div>
                    
                    <div>
                        <input type="checkbox" name="question-answers[]" id="question-1-answers-B" value="B" />
                        <label for="question-1-answers-B">B) <?php echo $row['op_two'] ;?></label>
                    </div>
                    
                    <div>
                        <input type="checkbox" name="question-answers[]" id="question-1-answers-C" value="C" />
                        <label for="question-1-answers-C">C) <?php echo $row['op_three'] ;?></label>
                    </div>
                    
                    <div>
                        <input type="checkbox" name="question-answers[]" id="question-1-answers-D" value="D" />
                        <label for="question-1-answers-D">D) <?php echo $row['op_four'] ;?></label>
                    </div>
                
                </li>
          <?php 
         }
       
         ?>  
    </ol>
  </div>


        <div>


        </div>

      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="
https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<?php } ?>
