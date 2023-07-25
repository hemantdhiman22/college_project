<?php
include("header.php");

// Initialize variables
$username = "";
$password = "";
$role = "";
$error = "";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    // Perform validation
    if (empty($username) || empty($password) || empty($role)) {
        $error = "All fields are required.";
    } else {
        // Connect to the database
        $host = "localhost";
        $user = "phpmyadmin";
        $pass = "root";
        $db = "attd_system";
        $conn = new mysqli($host, $user, $pass, $db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Perform the query to retrieve the user from the database
        $sql = "SELECT * FROM login WHERE username='$username' AND password='$password' AND role='$role'";
        $result = $conn->query($sql);

        // Check if a user was found
        if ($result->num_rows > 0) {
        // Check the user's role
        $user = $result->fetch_assoc();
            if ($user['role'] == 'admin') {
        // Redirect to the home page
            header("Location: home.php");
            exit;
        } else {
            header("Location: userhome.php");
            exit;
        //echo "User logged in successfully!";
        }
        } else {
        $error = "Invalid username or password.";
        }

        // Close the database connection
        $conn->close();
    }
}
?>


<html>
    <head>
        <link rel="stylesheet" tyle="text/css" href="style.css">

        <style>
        .login-form {
      margin: 0 auto;
      max-width: 400px;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-image:linear-gradient(to right, rgba(135,135,135,1),rgba(135,135,135,0.1));
        }
        </style>
    </head>
    <body>
        <div class="container">

            <div class="container">
              <form action="login5.php" method="post" class="login-form">
                <?php if ($error != "") { ?>
                  <div class="alert alert-danger">
                    <?php echo $error; ?>
                  </div>
                <?php } ?>
          
                <div class="form-group">
                  <label for="username">USERNAME</label>
                  <input name="username" id="username" class="form-control" required>
                </div>
              
                <div class="form-group">
                  <label for="password">PASSWORD</label>
                  <input type="password" name="password" id="password" class="form-control" required>
                </div>
          
                <div class="form-group">
                  <label for="role">ROLE</label>
                  <select name="role" id="role" class="form-control" required>
                    <option value="">Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                  </select>
                </div>
          
                <div class="form-group">
                  <input type="submit" name="submit" value="Submit" class="btn btn-primary" required>
                </div>
              </form>
            </div>
          
          </div>
    </body>
</html>