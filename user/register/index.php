<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>
    
<?php include("assets/header.php"); ?>

  <div class=" container p-3 bg-light border border-light">

      <div class="container border border-1 p-3 border-dark rounded" style="background-image: url('assets/img/rgtr-img.jpg'); background-size: cover;">
        <h2 class="text-center fw-bold bg-warning border border-3 border-dark p-1 rounded-3 text-uppercase text-light">User Registration</h2>

        <!-- starting php logic -->
        <?php
       // Database connection parameters
$db_host = "localhost";
$db_user = "u215349144_Rishi";
$db_pass = "Rishi#2024";
$db_name = "u215349144_ifsc";

// Create a database connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);


        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fullname = $_POST['fullname'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $confirmPassword = $_POST['confirm_password'];

            // Check if the username or email already exists
            $checkQuery = "SELECT * FROM users WHERE mobile = '$mobile' OR email = '$email'";
            $checkResult = mysqli_query($conn, $checkQuery);

            if (mysqli_num_rows($checkResult) > 0) {
                echo '<div class="container alert alert-danger text-center" role="alert">';
                echo 'Mobile or Email already exists. Please choose a different one.';
                echo '</div>';
            } elseif ($_POST['password'] !== $confirmPassword) {
                echo '<div class="container alert alert-danger text-center" role="alert">';
                echo 'Password and Confirm Password do not match.';
                echo '</div>';
            } else {
                $insertQuery = "INSERT INTO users (fullname, mobile, email, password) VALUES ('$fullname', '$mobile', '$email', '$password')";
                $insertResult = mysqli_query($conn, $insertQuery);

                if ($insertResult) {
                    // Redirect to login.php after 3 seconds
                    header('Refresh: 3; http://localhost/ifsc/user/login/');
                    echo '<div class="container alert alert-success text-center" role="alert">';
                    echo 'Registration successful. <a href="http://localhost/ifsc/user/login/" class="alert-link text-success">Login Here...</a>';
                    echo '</div>';
                    exit;
                } else {
                    echo '<div class="container alert alert-danger text-center" role="alert">';
                    echo 'Registration failed. Please try again.';
                    echo '</div>';
                }
            }

            mysqli_close($conn);
        }
        ?>
        <!-- php logic code -->

        <form action="" method="post">
          <div class="mb-3">
            <label for="fullname" class="form-label fw-bold text-light"><i class="fa-solid fa-user"></i> Enter Your Full Name:</label>
            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Your Full Name:" required>
          </div>
          <div class="mb-3">
            <label for="mobile" class="form-label fw-bold text-light"><i class="fa-solid fa-phone"></i> Enter Your Mobile Number:</label>
            <input type="mobile" class="form-control" id="mobile" name="mobile" placeholder="99XX98XX66" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label fw-bold text-light"><i class="fa-solid fa-envelope"></i> Enter Your Email Address:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="LinuxRishiX@gmail.com" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label fw-bold text-light"><i class="fa-solid fa-key"></i> Create Your Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Exp. Mca@12345#" required>
          </div>
          <div class="mb-3">
            <label for="confirm_password" class="form-label fw-bold text-light"><i class="fa-solid fa-key"></i> Confirm Your Password:</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Exp. Mca@12345#" required>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary fw-bold">Register</button>
          </div>
        </form>
      </div>
      </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include('assets/footer.php'); ?>
</body>
</html>
