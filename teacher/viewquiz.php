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
    <style type="text/css">
 
    </style>
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
                <img src="user.jpg" width="50px" height="30px" ><br>
               <a href="logout.php" class="logout">Logout</a>
              </div>
         </div>
       </div>
       <div class="content p-4">
      
        
         <button class="btn btn-secondary d-none" id="addbtn">Add More Question</button>
         

         <h4 class="text-center mb-3">View Question</h4>
          <div class="container">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">course</th>
                    <th scope="col">Question</th>
                    <th scope="col">points</th>
                    <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>    

              <?php
                  $sql="select * from  quiz_question";
                    $result=mysqli_query($con,$sql);
                    while($row=mysqli_fetch_assoc($result))
                    {
                     ?>             
                  <tr>
                    <td><?php echo $row['c_id'];?></td>
                    <td><?php echo $row['question_name'];?></td>
                    <td><?php echo $row['points'];?></td>
                    <td>
                      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#questionid<?php echo $row['question_id'];?>">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                      </a> 
                       <div class="modal fade" id="questionid<?php echo $row['question_id'];?>" tabindex="-1" role="dialog" aria-labelledby="        exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">update question</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="quiz_action.php" method="post" enctype="multipart/form-data">
                                  <input type="hidden" name="qid" value="<?php echo $row['question_id'];?>">
                                  <div class="form-group">
                                    <label>Question</label>
                                    <input type="text" name="question" value="<?php echo $row['question_name'];?>" class="form-control">
                                  </div>
                                     <div class="form-group">
                                        <label>Points</label>
                                        <select class="form-control" name="point">
                                           <!-- <option value="<?php echo $row['points'];?>"><?php echo $row['points'];?></option> -->
                                          <option <?php $v=$row['points']; if($v==1){echo "selected  ";} ?>value="1">1</option>
                                          <option <?php $v=$row['points']; if($v==2){echo "selected  ";} ?> value="2">2</option>
                                          <option <?php $v=$row['points']; if($v==3){echo "selected  ";} ?> value="3">3</option>
                                          <option <?php $v=$row['points']; if($v==4){echo "selected  ";} ?> value="4">4</option>
                                          <option <?php $v=$row['points']; if($v==5){echo "selected   ";} ?>value="5">5</option>
                                          <option<?php $v=$row['points']; if($v==6){echo "selected  ";} ?> value="6">6</option>
                                          <option <?php $v=$row['points']; if($v==7){echo "selected  ";} ?> value="7">7</option>
                                          <option <?php $v=$row['points']; if($v==8){echo "selected  ";} ?> value="8">8</option>
                                          <option <?php $v=$row['points']; if($v==9){echo "selected  ";} ?> value="9">9</option>
                                          <option <?php $v=$row['points']; if($v==10){echo "selected  ";} ?> value="10">10</option>
                                        </select>
                                     </div>                 
                                  <div class="mt-3">
                                    <input type="submit" name="update_question" value="update" class="btn btn-success">
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>   
                      <a href="quiz_action.php?question_delid=<?php echo $row['question_id'];?>" class="btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                      </a>
                      
                  </td>
                  </tr>  

                  <?php }?>             
              </tbody>
            </table>
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
          $("#addmore").append('<div class="form-group"><label>Question</label><input type="text" name="question'+n+'" class="form-control"></div> <div class="form-group"><label>Points</label><select class="form-control" name="point'+n+'"><option value="1">1</option> <option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option> <option value="10">10</option> </select> </div>');  
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
                alert("Quiz Created Successfully");
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