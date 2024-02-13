<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <!-- Include Bootstrap for styling and datepicker -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
            font-size: 12px; /* Adjust the font size as needed */
        }

        .container1 {
            margin-top: 70px; /* Adjust margin to accommodate the fixed navbar */
            padding: 20px; /* Add padding to separate content from navbar */
        }

        /* Rest of your existing styles */

    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">
            <img src="img\logo.png" alt="" style="height: 7vw; width:20vw">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="subAdmin.html">Sub-Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="checkRegistration.html">Check Registrations</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container1 mt-5">
        <h2 class="text-center" style="font-weight: 600;">Search</h2>
        <div class="row">
            <!-- Card 1: By Date and Batch -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-danger">By Date and Batch</h5>
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="datepicker">Select Date:</label>
                                <input type="text" id="datepicker" name="selectedDate" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="batch">Select Batch:</label>
                                <select name="selectedBatch" id="batch" class="form-control">
                                    <option value="8 AM to 10 AM">8 AM to 10 AM</option>
                                    <option value="10 AM to 12 PM">10 AM to 12 PM</option>
                                    <option value="12 PM to 3 PM">12 PM to 3 PM</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" name="searchDateBatch">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Card 2: By Name and Phone -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-danger">By Name and Phone</h5>
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="name">Enter Name:</label>
                                <input type="text" id="name" name="searchName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phone">Enter Phone:</label>
                                <input type="text" id="phone" name="searchPhone" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary" name="searchNamePhone">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mangal";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Function to fetch and display results in a table
        function displayResults($result) {
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>DOB</th>
                        <th>Abhishek Date</th>
                        <th>Abhishek Type</th>
                        <th>Batch Time</th>
                    </tr>";
        
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['dob']}</td>
                        <td>{$row['abhishekDate']}</td>
                        <td>{$row['abhishekType']}</td>
                        <td>{$row['batchTime']}</td>
                    </tr>";
            }
        
            echo "</table>";
        }

        // Handle Date and Batch form submission
       // Handle Date and Batch form submission
// Handle Date and Batch form submission
if (isset($_POST['searchDateBatch'])) {
    $selectedDate = $_POST['selectedDate'];
    $selectedBatch = $_POST['selectedBatch'];

    // No need to reformat if the date is already in the correct format
    // $formattedDate = date('Y-m-d', strtotime($selectedDate));

    // Using prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM userdata WHERE abhishekDate = ? AND batchTime = ?");
    $stmt->bind_param("ss", $selectedDate, $selectedBatch);

    if (!$stmt->execute()) {
        echo "Error: " . $stmt->error;
    } else {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            displayResults($result);
        } else {
            echo "No results found.";
        }
    }
    $stmt->close();
}

           
    
        // Close the connection
       

        
        ?>

    </div>

    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include Bootstrap Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <!-- Initialize Datepicker -->
    <script>
        $(document).ready(function(){
            $('#datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
</body>
</html>
