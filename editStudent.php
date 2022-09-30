<!DOCTYPE html>
<html>
    <?php 
        require_once('includes/links.php')
    ?>
<body>
    <!-- All our code. write here   -->
   <?php 
    require_once('includes/header.php');
    require_once('includes/sidebar.php');
//Fetch students records using WHERE CLAUSE
    require_once('dbconnection.php');
    $fetchStudentRecords = mysqli_query($conn, "SELECT * FROM enrollments WHERE id='".$_GET['id']."'  ");

    while ($row = mysqli_fetch_array($fetchStudentRecords) ) {
        $studentId = $row['id'];
        $studentName = $row['name'];
        $studentPhone = $row['phone'];
        $studentEmail = $row['email'];
        $studentRegNumber= $row['reg_number'];
        $studentCourse= $row['course'];
     }
   ?>

   <?php 
        //isset function
        if( isset($_POST['updateEnrollment']) ){
            //1. fetch form data
            $name = $_POST['name'];
            $regNumber = $_POST['reg_number'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $course = $_POST['course'];

            //sql to update
            $updateStudent = mysqli_query($conn, 
            "UPDATE enrollments SET name='$name', reg_number='$regNumber',
             phone='$phone',email='$email',course='$course' WHERE id='".$_GET['id']."'  ");

             if($updateStudent)
             {
                echo 'data updated succes';
             }
             else{
                echo 'error occured';
             }
        }
   ?>
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-dark text-white text-center">
                            <span>Update Students</span>
                        </div>
                        <div class="card-body">
                            <form action="editStudent.php?id=<?php echo $studentId ?>" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name" id="" value="<?php echo $studentName ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="reg_number">Reg Number</label>
                                            <input type="text" class="form-control" name="reg_number" id="" value="<?php echo $studentRegNumber ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Phone</label>
                                            <input type="tel" class="form-control" name="phone" id="" value="<?php echo $studentPhone ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="reg_number">Email</label>
                                            <input type="email" class="form-control" name="email" id="" value="<?php echo $studentEmail ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                   <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="course">Course</label>
                                            <select class="form-control" name="course" id="">
                                                <option><?php echo $studentCourse ?></option>
                                                <option value="Web Design & Development">Web Design & Development</option>
                                                <option value="Android Application Development">Android Application Development</option>
                                                <option value="Data Analysis">Data Analysis</option>
                                            </select>
                                        </div>
                                   </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <button type="submit" name="updateEnrollment" class="btn btn-success">Update records</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        

<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>