
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message || IFSC-Code-Finder</title>
</head>
<body>
    



<?php
include("header.php");
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

$db_host = "localhost";
$db_user = "u215349144_Rishi";
$db_pass = "Rishi#2024";
$db_name = "u215349144_ifsc";
    // Database connection with database "ifsc"
  $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    // Check the connection
    if ($con->connect_error) {
        die("Connection Failed: " . $con->connect_error);
    }

    // To insert data into the database
    $sql = "INSERT INTO contact_form (name, email, message) VALUES (?, ?, ?)";
    $stmt = $con->prepare($sql);

    if (!$stmt) {
        die("Preparation of statement failed: " . $con->error);
    }

    // Bind parameters
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        include("sms.php");       
    } else {
        echo "There was an error sending your message. Please try again later.";
    }

    // Close the statement and the database connection
    $stmt->close();
    $con->close();
}
?>
<?php
include("footer.php");
?> 


</body>
</html>