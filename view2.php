<?php

include("db.php");
include("header.php");

if(isset($_POST['date']) && !empty($_POST['date'])) {
  $date = $_POST['date'];
  $result = mysqli_query($con, "SELECT * FROM attandance_record WHERE date LIKE '%$date%'");
}

?>

<html>
<head>
    <title>Attendance Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <style>
    .login-form {
      margin: 0 auto;
      max-width: 400px;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f0f0f0; /* set the background color to light gray */
    }
    </style>




</head>

<body>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel panel-heading">
                <h2>
                    <a class="btn btn-success" href="home.php">BACK</a>
                    <a class="btn btn-danger pull-right" href="logout.php">Logout</a>
                </h2>
            </div>

            <div class="panel panel-body">
                <form action="view2.php" method="post">
                    <div class="form-group">
                        <label for="date">Select Date:</label>
                        <input type="date" class="form-control" name="date" required>
                    </div>
                    <input type="submit" name="submit" value="Show Record" class="btn btn-primary">
                </form>
                <hr>
                <table class="table table-striped">
                    <tr>
                        <th>Serial Number</th>
                        <th>Student Name</th>
                        <th>Roll Number</th>
                        <th>Attendance Status</th>
                        <th>Date</th>
                    </tr>

                    <?php 
                        $serialnumber = 0;
                        while ($row = mysqli_fetch_array($result)) { 
                    ?>
                        <tr>
                            <td><?php echo ++$serialnumber; ?></td>
                            <td><?php echo $row['student_name']; ?></td>
                            <td><?php echo $row['roll_number']; ?></td>
                            <td><?php echo $row['attendance_status']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<?php mysqli_close($con); ?>

