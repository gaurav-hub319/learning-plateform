<?php 
session_start();
include("../connection.php");
if(isset($_SESSION['login_admin'])){
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Admin</title>
    
    
  </head>
  <body>
   <div class=" main">
     <div class="sidebar">
      <h2 class="logo">LOGO</h2>
       <ul>
        <li><a href="index.php"  class="menu">Home</a></li>
         <li><a href="course.php" class="menu">Course</a></li>
           <li><a href="viewquiz.php"  class="menu">View quiz</a></li>
                </ul>
     </div>
     <div class="right">
       <div class="header d-flex">
         <h4 class="text-white">Dashboard</h4>
         <div class="user d-flex" >
              <div>
                <img src="user.jpg" width="30px" height="30px" ><br>
               <a href="logout.php" class="logout">Logout</a>
              </div>
         </div>
       </div>
       <div class="content p-4">
        <h6 class="text-center">Create Course Quiz </h6>
         <form class="formclass" id="quiz_form">

          
           <div class="form-group">
             <select class="form-control" name="course" required="">
              <option>Select Course</option>
               <?php
                  $sql="select * from  course";
                    $result=mysqli_query($con,$sql);
                    while($row=mysqli_fetch_assoc($result))
                    {
                      $c=$row['quize_created'];
                      if(!$c)
                      {

                     ?>
                    <option value="<?php echo $row['course_id'];?>" ><?php echo $row['course_name'] ;?></option>
             <?php
             } 
           }?>
             </select>
           </div>
           <div class="form-group">
             <label>Passing Point </label>
             <input type="text" name="passing" required="" class="form-control" placeholder="Passing point for this quiz">
           </div>
           <div class="question p-3">
             <div class="d-flex ">
                <div class="form-group">
                   <label>Question</label>
                    <input type="text" class="form-control" name="question" >
                </div>
                <div class="ml-4">
                  <label>Points</label><br>
                  <select  name="point" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                  </select>
                </div>
            </div>
             <ul>
               <li class="d-flex" style="justify-content: space-between;width: 700px;">
                 <div>
               
                  (A)<label for="question-3-answers-C"> <input type="text" name="op1" class="form-control"></label>
                 </div>
                 <div >
                
                  (B)<label for="question-3-answers-C"> <input type="text" name="op2" class="form-control"></label>
                 </div>         
               </li>
               <li class="d-flex" style="justify-content: space-between;width: 700px;">
                 <div>
                   
                  (C)<label for="question-3-answers-C"> <input type="text" name="op3" class="form-control"></label>
                 </div>
                  <div>
                    
                  (D)<label for="question-3-answers-C"> <input type="text" name="op4" class="form-control"></label>
                  </div>
               </li>
             </ul>
             <div class="form-group">
                 <label>Tag With</label>
                 <input type="text" name="tag" class="form-control">
              </div>
            <div>
              <label>Answer</label><br>
               <input type="checkbox" name="answer[]" value="a">&nbsp;&nbsp;A&nbsp;&nbsp;<input type="checkbox" value="b" name="answer[]">&nbsp;&nbsp;B
               &nbsp;&nbsp;<input type="checkbox"  value="c" name="answer[]">&nbsp;&nbsp;C&nbsp;&nbsp;<input type="checkbox" value="d" name="answer[]">&nbsp;&nbsp;D
            </div>
           </div>
           
             
             <div id="addmore" >
             
           </div>
           <input type="hidden" name="form-input" id="form-input">
           <div class="mt-3">
            <input type="submit" name="create_question" value="create" class="btn btn-success">
          </div>
         </form>
         <div class=" more">
           <button class="btn btn-secondary " id="addbtn">Add Question</button>
         </div>
         
       </div>
         
     </div>
   </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="
https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript">
     $(document).ready(function(){ 
     var i=0; 
      $("#addbtn").click(function(){  
        var n;
         for(n=i;n<i+1;n++){
          $("#addmore").append('<div class="question"> <div class="d-flex"> <div class="form-group"><label>Question</label><input type="text" class="form-control" name="question'+n+'" >  </div><div class="ml-4"><label>Points</label><br><select  name="point'+n+'" class="form-control"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select> </div> </div><div> <ul><li class="d-flex" style="justify-content: space-between;width: 700px;"><div>(A)<label for="question-3-answers-C"> <input type="text" class="form-control" name="opone'+n+'"></label></div><div >(B)<label for="question-3-answers-C"> <input type="text" class="form-control" name="optwo'+n+'"></label></div></li>                                                                                     <li class="d-flex" style="justify-content: space-between;width: 700px;"><div> (C) <label for="question-3-answers-C"> <input type="text" class="form-control" name="opthree'+n+'"></label></div><div>(D)<label for="question-3-answers-C"> <input type="text" class="form-control" name="opfour'+n+'"></label> </div> </li> </ul></div><div class="form-group">   <label>Tag</label><input type="text" name="tag'+n+'" class="form-control"></div> <div><label>Answer</label><br><input type="checkbox" name="answer'+n+'[]" value="a">&nbsp;&nbsp;A&nbsp;&nbsp;<input type="checkbox" name="answer'+n+'[]" value="b">&nbsp;&nbsp;B&nbsp;&nbsp;<input type="checkbox" name="answer'+n+'[]" value="c">&nbsp;&nbsp;C&nbsp;&nbsp;<input type="checkbox" name="answer'+n+'[]" value="d">&nbsp;&nbsp;D</div></div>');  
        }
         i = i+1;
         n=n+1;

          $('#form-input').val(n-1);
      });  
    });
         </script>



         <script type="text/javascript">

          $('#quiz_form').on('submit',function(e){
          e.preventDefault();
         var d= new FormData(this);
         d.append("create_question","create");
          $.ajax({
            url : 'quiz_action.php',
            type: "POST",
            data: d,
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){

                console.log(data);
               window.location.reload();
                    
            }
          })
        });
         </script>
  </body>
</html>
<?php }
else{
  header("location: ../teacher.php");
}?>
