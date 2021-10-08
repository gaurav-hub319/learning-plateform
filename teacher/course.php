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
    <title>Teacher</title>
    
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
       <div class="content">
         <div style="text-align: right;">
            <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">
             Create Course
            </button>
          </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="        exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="action.php" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Course Name:</label>
                        <input type="text" name="name" class="form-control">
                      </div>
                                          
                      <div class="mt-3">
                        <input type="submit" name="create_course" value="create" class="btn btn-success">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <h4 class="text-center mb-3">View Course</h4>
          <div class="container">
          <table class="table table-bordered">
              <thead>
                <tr>
                    <th scope="col">Cousre</th>
                    <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                    <?php
                  $sql="select * from  course";
                    $result=mysqli_query($con,$sql);
                    while($row=mysqli_fetch_assoc($result))
                    {
                     ?>
                  <tr>
                    <td><?php echo $row['course_name'];?></td>
                    <td>
                      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#courseid<?php echo $row['course_id'];?>">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                      </a>
                       <div class="modal fade" id="courseid<?php  echo $row['course_id'];?>" tabindex="-1" role="dialog" aria-labelledby="        exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Course</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="action.php" method="post" enctype="multipart/form-data">
                                  <input type="hidden" name="id" value="<?php  echo $row['course_id'];?>">
                                  <div class="form-group">
                                    <label>Course Name:</label>
                                    <input type="text" name="name" value="<?php echo $row['course_name']; ?>" class="form-control">
                                  </div>
                                                      
                                  <div class="mt-3">
                                    <input type="submit" name="update_course" value="update" class="btn btn-success">
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      <a href="action.php?course_delid=<?php echo $row['course_id'];?>" class="btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                      </a>
                       <a href=" <?php $c=$row['quize_created'];if($c){echo $row['quiz_file']; } else{echo 'quiz.php';} ?>" class="btn btn-secondary">

                        <?php $c=$row['quize_created']; 
                        if($c){echo "view Quiz ";}

                        else{ echo "create quiz ";} ?>
                          
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<?php }
else{
  header("location: ../teacher.php");
}?>
