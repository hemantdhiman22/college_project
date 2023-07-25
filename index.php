<?php

include("db.php");
include("header.php");

$flag = 0;

if (isset($_POST['submit'])) {
    foreach ($_POST['attendance_status'] as $id => $attendance_status) {
        $class = $_POST['class'][$id];
        $class = $_POST['sem'][$id];
        $student_name = $_POST['student_name'][$id];
        $roll_number = $_POST['roll_number'][$id];
        $date = date("Y-m-d H:i:s");

        // Check if the data already exists in the database
        $check_query = mysqli_query($con, "SELECT * FROM attandance_record WHERE student_name='$student_name' AND roll_number='$roll_number' AND date='$date'");
        if (mysqli_num_rows($check_query) > 0) {
            // Data already exists, print message and skip inserting
            echo "<div class='alert alert-warning'>Attendance data for $student_name with roll number $roll_number is already submitted.</div>";
            continue;
        }
        
        $result = mysqli_query($con, "INSERT INTO attandance_record (class, sem, student_name, roll_number, attendance_status, date) VALUES ('$class', '$sem', '$student_name', '$roll_number', '$attendance_status', '$date')");
        if ($result) {
            $flag = 1;
        }
    }
}

$result = mysqli_query($con, "SELECT * FROM attandance");
$serialnumber = 0;
$counter = 0;
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
                    <a class="btn btn-primary" href="home.php">HOME</a>
                    <a class="btn btn-success" href="add3.php">ADD STUDENT</a>
                    <a class="btn btn-info" href="view2.php">CHECK RECORD</a>
                    <a class="btn btn-danger pull-right" href="logout.php">Logout</a>
                </h2>
                <?php if ($flag) { ?>
                    <div class="alert alert-success">
                        Attendance Data Inserted Successfully
                    </div>
                <?php } ?>
                <h3><div class="well test-center">Date: <?php echo date("Y-m-d"); ?></div></h3>
            </div>

            <div class="panel panel-body">
                <form action="index.php" method="post">
                    <table class="table table-striped">
                        <tr>
                            <th>Serial Number</th>
                            <th>Class</th>
                            <th>Semester</th>
                            <th>Student Name</th>
                            <th>Roll Number</th>
                            <th>Attendance Status</th>
                        </tr>

                        <?php while ($row = mysqli_fetch_array($result)) { ?>
                            <tr>
                                <td><?php echo ++$serialnumber; ?></td>
                                <td><?php echo $row['class']; ?><input type="hidden" name="class[]" value="<?php echo $row['class']; ?>"></td>
                                <td><?php echo $row['sem']; ?><input type="hidden" name="sem[]" value="<?php echo $row['sem']; ?>"></td>
                                <td><?php echo $row['student_name']; ?><input type="hidden" name="student_name[]" value="<?php echo $row['student_name']; ?>"></td>
                                <td><?php echo $row['roll_number']; ?><input type="hidden" name="roll_number[]" value="<?php echo $row['roll_number']; ?>"></td>
                                <td>
                                    <input type="radio" name="attendance_status[<?php echo $counter; ?>]" value="Present">Present
				                    <input type="radio" name="attendance_status[<?php echo $counter; ?>]" value="Absent">Absent
			                    </td>
                            </tr>
                            <?php $counter++; ?>
                        <?php } ?>
                    </table>
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php mysqli_close($con); ?>


