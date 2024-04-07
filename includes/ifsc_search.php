<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="IFSC Code Finder - Your Trusted Source for Indian Bank Codes Find Indian Financial System Codes (IFSC) for banks across India with ease. Our IFSC Code Finder simplifies online transactions and banking operations">
    <meta name="keywords" content="IFSC CODE,BANK,IFSC,FINDER">
    <meta name="author" content="LOMASH- RISHI">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- css link -->
    <title>[IFSC-Code-Finder] Indian Financial System Code</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<?php
// Database connection parameters
$db_host = "localhost";
$db_user = "root";
$db_pass = "2024";
$db_name = "api";

// Create a database connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start HTML form
echo '<div class="container mt-5 text-lg-start fw-bold ">';
echo '<form method="post" action="">';

// Fetch unique bank names from the 'bank_details' table
$query_bank = "SELECT DISTINCT bank FROM bank_details";
$result_bank = $conn->query($query_bank);

// Check if there are rows in the result
if ($result_bank->num_rows > 0) {

    // Start HTML select element for bank
    echo '<div class="mb-3">';
    echo '<label for="bank" class="form-label ">Select Bank:</label>';
    echo '<select class="form-select" name="bank" id="bank">';
    echo '<option value="" selected><-Select-Bank-Name-></option>';

    // Fetch each row and create an option in the select element
    while ($row = $result_bank->fetch_assoc()) {
        $bankName = $row['bank'];
        echo '<option value="' . $bankName . '">' . $bankName . '</option>';
    }

    // Close the HTML select element for bank
    echo '</select>';
    echo '</div>';

    // Fetch unique state names from the 'bank_details' table
    $query_state = "SELECT DISTINCT state FROM bank_details";
    $result_state = $conn->query($query_state);

    // Check if there are rows in the result for state
    if ($result_state->num_rows > 0) {

        // Start HTML select element for state
        echo '<div class="mb-3">';
        echo '<label for="state" class="form-label">Select State:</label>';
        echo '<select class="form-select" name="state" id="state">';
        echo '<option value="" selected><-Select-State-Name-></option>';

        // Fetch each row and create an option in the select element for state
        while ($row_state = $result_state->fetch_assoc()) {
            $stateName = $row_state['state'];
            echo '<option value="' . $stateName . '">' . $stateName . '</option>';
        }

        // Close the HTML select element for state
        echo '</select>';
        echo '</div>';

        // Fetch unique city names from the 'bank_details' table
        $query_city = "SELECT DISTINCT city FROM bank_details";
        $result_city = $conn->query($query_city);

        // Check if there are rows in the result for city
        if ($result_city->num_rows > 0) {

            // Start HTML select element for city
            echo '<div class="mb-3">';
            echo '<label for="city" class="form-label">Select City:</label>';
            echo '<select class="form-select" name="city" id="city">';
            echo '<option value="" selected><-Select-City-Name-></option>';

            // Fetch each row and create an option in the select element for city
            while ($row_city = $result_city->fetch_assoc()) {
                $cityName = $row_city['city'];
                echo '<option value="' . $cityName . '">' . $cityName . '</option>';
            }

            // Close the HTML select element for city
            echo '</select>';
            echo '</div>';

            // Fetch unique branch names from the 'bank_details' table
            $query_branch = "SELECT DISTINCT branch FROM bank_details";
            $result_branch = $conn->query($query_branch);

            // Check if there are rows in the result for branch
            if ($result_branch->num_rows > 0) {

                // Start HTML select element for branch
                echo '<div class="mb-3">';
                echo '<label for="branch" class="form-label">Select Branch:</label>';
                echo '<select class="form-select" name="branch" id="branch">';
                echo '<option value="" selected><-Select-Branch-Name-></option>';

                // Fetch each row and create an option in the select element for branch
                while ($row_branch = $result_branch->fetch_assoc()) {
                    $branchName = $row_branch['branch'];
                    echo '<option value="' . $branchName . '">' . $branchName . '</option>';
                }

                // Close the HTML select element for branch
                echo '</select>';
                echo '</div>';

                // Submit button
                echo '<div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class=" fw-bold text-light btn btn-primary btn-outline-success">Search-Bank-Details</button>
              </div>';
            } else {
                echo '<p class="text-danger">No branches found for the specified city.</p>';
            }
        } else {
            echo '<p class="text-danger">No cities found for the specified state.</p>';
        }
    } else {
        echo '<p class="text-danger">No states found in the database.</p>';
    }
} else {
    echo '<p class="text-danger">No banks found in the database.</p>';
}

echo '</form>';
echo '</div>';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the selected bank, state, city, and branch
    $selectedBank = $_POST['bank'];
    $selectedState = $_POST['state'];
    $selectedCity = $_POST['city'];
    $selectedBranch = $_POST['branch'];

    // Fetch IFSC code and address based on selected options
    $query_ifsc_address = "SELECT ifsc, address FROM bank_details 
                           WHERE bank = '$selectedBank' 
                           AND state = '$selectedState' 
                           AND city = '$selectedCity' 
                           AND branch = '$selectedBranch'";

    $result_ifsc_address = $conn->query($query_ifsc_address);

    // Check if there are rows in the result
    if ($result_ifsc_address->num_rows > 0) {
        // Fetch the first row
        $row_ifsc_address = $result_ifsc_address->fetch_assoc();
// Display IFSC code and address
echo '<div class="container mt-3">';
echo '<div class="card border border-dark alert alert-primary text-center">';
echo '<div class="card-header bg-warning"><h6 class="card-title"><u><b>Details For ->"' . $selectedBank . '"</b></u></h6></div>';
echo '<div class="card-body ">';
echo '<p class="card-text"><strong>Bank State Name:</strong> '  . $selectedState.  '</p>';
echo '<p class="card-text"><strong>Bank City Name:</strong> '  . $selectedCity .  '</p>';
echo '<p class="card-text"><strong>Bank Branch Name:</strong> '  . $selectedBranch .  '</p>';
// ifsc code copy 
echo '<p class="card-text"><strong>Bank IFSC Code:</strong> ' . $row_ifsc_address['ifsc'] .' <i class="fa-solid fa-copy" onclick="copyToClipboard(\'' . $row_ifsc_address['ifsc'] . '\')"></i></p>';

// ifsc code copy 

echo '<p class="card-text"><strong>Address:</strong> ' . $row_ifsc_address['address'] . '</p>';
echo '</div>';
echo '</div>';
echo '</div>';

    } else {
        echo '<div class="border-dark alert alert-info text-center mt-3"><p class="text-danger">No data found for the selected options.</p></div>';
    }
}

// Close the database connection
$conn->close();
?>

<!-- copy button ifsc code script function -->
<script>
    function copyToClipboard(text) {
        var input = document.createElement('textarea');
        input.value = text;
        document.body.appendChild(input);
        input.select();
        document.execCommand('copy');
        document.body.removeChild(input);
        console.log('IFSC code copied to clipboard: ' + text);
    }
</script>

</body>
</html>
