<?php

include("header.php");
include("db.php");

$flag = false;

if (isset($_POST['submit'])) {
  $class = mysqli_real_escape_string($con, $_POST['class']);
  $sem = mysqli_real_escape_string($con, $_POST['sem']);
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $roll = mysqli_real_escape_string($con, $_POST['roll']);

  $result = mysqli_query($con, "INSERT INTO attandance (class, sem, student_name, roll_number) VALUES ('$class','$sem','$name','$roll')");

  if ($result) {
    $flag = true;
  }
}

?>


<html>
  <head>
    <title>Attendance System - Add Record</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  
  <style>
    .panel {
       width: 100%;
       max-width: 500px;
       height: auto;
       margin: 0 auto;
       padding: 20px;
       border: 1px solid #ccc;
       border-radius: 5px;
       background-color: #f0f0f0;
     }
  </style>

  <style>
    .logout-btn {
      position: absolute;
      top: 10px;
      right: 10px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="panel panel-default">
    <div class="panel panel-heading">
      <h2>
        <a class="btn btn-info" href="home.php">BACK</a>
        <a class="btn btn-danger pull-right" href="logout.php">Logout</a>
      </h2>
      <?php if ($flag) { ?>
          <div class="alert alert-success">
            <strong>Success!</strong> Record added successfully!
          </div>
      <?php } ?>

      <form action="add3.php" method="post" class="login-form">
          <div class="form-group">
           <label for="class">CLASS</label>
            <select name="class" id="class" class="form-control" required>
               <option value="">Select Class</option>
              <option value="B.VOC(SD)">B.VOC(SD)</option>
             </select>
          </div>

          <div class="form-group">
             <label for="sem">SEMESTER</label>
               <select name="sem" id="sem" class="form-control" required>
                 <option value="">Select Semester</option>
                 <option value="1st SEM">1st SEM</option>
                 <option value="2nd SEM">2nd SEM</option>
                 <option value="3rd SEM">3rd SEM</option>
               </select>
           </div>

          <div class="form-group">
               <label for="name">STUDENT NAME</label>
               <input type="text" name="name" id="name" class="form-control" required>
           </div>

          <div class="form-group">
              <label for="roll">ROLL NUMBER</label>
               <input type="text" name="roll" id="roll" class="form-control" required>
          </div>

          <div class="form-group">
             <input type="submit" name="submit" value="submit" class="btn btn-primary">
           </div>
        </form>

    </div>
  </div>
</div>

</body>
</html>