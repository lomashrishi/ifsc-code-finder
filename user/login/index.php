<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" >

</head>
<body>
    
<?php include("assets/header.php"); ?>

<!-- Form Start -->

<div class=" container p-3 bg-light border border-light">

    <!-- PHP Code For Login  -->
<?php 
session_start();
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
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE mobile = '$username' OR email = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variables and redirect to home page
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['fullname'];
            header("Location:/user/dashbord"); // Replace with your actual home page URL
            exit();
        } else {
            // Incorrect password
            echo '<div class="container alert alert-danger text-center" role="alert">';
            echo 'Incorrect password. Please try again.';
            echo '</div>';
        }
    } else {
        // User not found
        echo '<div class="container alert alert-danger text-center" role="alert">';
        echo 'User not found. Please check your username and try again.';
        echo '</div>';
    }
}

mysqli_close($conn);
 ?>
   <!-- PHP Code For Login  -->


<div class="container border border-1 p-3 border-dark rounded" style="background-image: url('assets/img/rgtr-img.jpg'); background-size: cover; filter: blur(0.1px);">
   
<h2 class="text-center fw-bold bg-primary border border-3 border-dark  p-1 rounded-3 text-uppercase text-light"> User Login</h2>
<hr class="bg-light">
    <form action="" method="post">
        <div class="form-group">
            <label for="username" class="fw-bold text-light"><i class="fa-solid fa-user"></i> Enter Your User Name:</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Mobile Or Email..." required>
        </div>
<hr class="bg-light">
        <div class="form-group">
            <label for="password" class="fw-bold text-light"><i class="fa-solid fa-key"></i> Enter Your User Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Yor Password" required>
        </div>
<hr class="bg-light">        
        <div class="text-center">
          <button type="submit" class="btn btn-primary p-2 fw-bold">[Login<i class="fa-solid fa-right-to-bracket"></i></button>
        </div>
        <hr class="bg-light">
        <div class="container text-center mt-3">
           <i class="text-light">If Don't Have Account Please </i> <a href="/user/register/" class="alert-link text-success fw-bold">Register Hare...</a>;
            </div>
    </form>
</div>
</div>
</div>
<?php include("assets/footer.php"); ?>
</body>
</html>
