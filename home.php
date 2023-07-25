<?php include("header.php");?>

<html>
    <title>
      Welcome to Attandance Management System 
    </title>
    <head>
	    <link rel"stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="style.css">
      <style>
        body {
            font-size: 30px;
        }
        .container {
            max-width: 1000px; 
            margin: 0 auto; 
        }
        .btn {
            font-size: 2.5rem; 
            background-image:linear-gradient(to right,rgba(135,135,135,1),rgba(135,135,135,0));
        }
      </style>

    </head>

<body>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <a href="add3.php" class="btn btn-primary btn-lg btn-block">Add Student</a>
    </div>
    <div class="col-md-6">
      <a href="index.php" class="btn btn-primary btn-lg btn-block">Update Attendance</a>
    </div>
  </div>
  
  <div class="row mt-5">

  <div class="col-md-6">
    <a href="view2.php" class="btn btn-primary btn-lg btn-block">View Records</a>
  </div>
  
  <div class="col-md-6">
      <a href="logout.php" class="btn btn-danger btn-lg btn-block">Logout</a>
  </div>
  </div>
</div>
</body>
</html>
