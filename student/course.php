<?php 
session_start();
include("../connection.php");
if(isset($_SESSION['login_user'])){
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


    <title>student</title>
    
      
  </head>
  <body>
   <div class=" main">
     <div class="sidebar">
      <h2 class="logo">LOGO</h2>
       <ul>
        <li><a href="index.php"  class="menu">Home</a></li>
         <li><a href="course.php" class="menu">Course</a></li>
       
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
        <h6 class="text-center">Choose Course Quiz </h6>
         
         <form id="formsubmit">
           <div>
             <select class="form-control" name="course" id="course_id">
              <option selected="">Selct Course</option>
              <?php
                  $sql="select * from  course";
                    $result=mysqli_query($con,$sql);
                    while($row=mysqli_fetch_assoc($result))
                    {?>
               <option value="<?php echo $row['course_id']; ?>"><?php echo $row['course_name']; ?></option>
             <?php } ?>
             </select>
           </div>
          
         </form>
         <div class="" id="coursequiz">
           
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
          
            $('#course_id').on('change', function()
              {

                   $.ajax({
                      type:'POST',
                      url:'action.php',
                      data:'course_id='+this.value,
                      success:function(data){
                      
                        window.open("quiz.php?course_id="+data);
                        
                      }
                  });
             });
         
         
         </script>
  </body>
</html>
<?php }
else{
  header("location: ../student.php");
}?>
