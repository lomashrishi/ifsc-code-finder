<?php
// Database connection parameters
$db_host = "localhost";
$db_user = "u215349144_Rishi";
$db_pass = "Rishi#2024";
$db_name = "u215349144_ifsc";

// Create a database connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Pagination
$records_per_page = 51; // Adjusted to show 51 records per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;

// Search
$search_term = isset($_GET['search']) ? $_GET['search'] : '';
$search_condition = "WHERE bank LIKE '%$search_term%' OR city LIKE '%$search_term%' OR state LIKE '%$search_term%' OR branch LIKE '%$search_term%' OR ifsc LIKE '%$search_term%'";

// Fetch data from the database with pagination and search
$sql = "SELECT * FROM bank_details $search_condition LIMIT $offset, $records_per_page";
$result = $conn->query($sql);

// Calculate the total number of pages
$total_pages_sql = "SELECT COUNT(*) AS total FROM bank_details $search_condition";
$total_pages_result = $conn->query($total_pages_sql);
$total_pages = ceil($total_pages_result->fetch_assoc()['total'] / $records_per_page);

// Calculate the range of pagination numbers to display
$range = 9; // Number of pagination numbers to show
$start = max($page - floor($range / 2), 1);
$end = min($start + $range - 1, $total_pages);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>


        /* Center the table within the container */
        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column; /* Adjusted for vertical alignment */
            height: 100vh;
        }
    </style>
    <title>Bank Details</title>
</head>
<body>
<?php include("assets/header.php"); ?>


    <div class="container p-3 border border-3 color-dark">

        <!-- Search Form -->
        <form class="mb-3" action="" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="search" value="<?php echo htmlspecialchars($search_term); ?>">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>

        <!-- Display search results -->
       
                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-dark text-light p-0 text-center text-uppercase">
                            <th>SN</th>
                            <th>Bank</th>
                            <th>IFSC</th>
                            <th>Branch</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>City2</th>
                            <th>State</th>
                            <th>STD Code</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Check if there are rows in the result set
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$row['sn']}</td>
                                        <td>{$row['bank']}</td>
                                        <td>{$row['ifsc']}</td>
                                        <td>{$row['branch']}</td>
                                        <td>{$row['address']}</td>
                                        <td>{$row['city']}</td>
                                        <td>{$row['city2']}</td>
                                        <td>{$row['state']}</td>
                                        <td>{$row['std_code']}</td>
                                        <td>{$row['phone']}</td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='10'>No data found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <!-- Pagination -->
                <nav aria-label="Page navigation" class="mt-3">
                    <ul class="pagination justify-content-center">
                        <?php if ($page > 1): ?>
                            <li class="page-item"><a class="page-link" href="?page=<?php echo $page - 1; ?>&search=<?php echo $search_term; ?>">Previous</a></li>
                        <?php endif; ?>
                        
                        <?php for ($i = $start; $i <= $end; $i++) : ?>
                            <li class="page-item <?php echo $page == $i ? 'active' : ''; ?>"><a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo $search_term; ?>"><?php echo $i; ?></a></li>
                        <?php endfor; ?>
                        
                        <?php if ($page < $total_pages): ?>
                            <li class="page-item"><a class="page-link" href="?page=<?php echo $page + 1; ?>&search=<?php echo $search_term; ?>">Next</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
    </div>
    </div>
    <?php include('assets/footer.php'); ?>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
