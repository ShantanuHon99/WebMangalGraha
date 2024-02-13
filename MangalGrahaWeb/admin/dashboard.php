<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin Panel</title>
</head>
<body>
    <div class="side-menu">
        <div class="brand-name">
            <img src="img\logo.png" alt="">
            
        </div>
        <br><br><br><br><br>
        <ul>
            <a href="dashboard.php"><li><span>Dashboard</span></li></a><br>
            <a href="subAdmin.html"><li><span>Sub-Admin</span></li></a><br>
            <a href="CheckRegi.php"><li><span>Check Registrations</span></li></a>
            
        </ul>
    </div>
    <div class="container">
        
        <div class="content">
            <div class="cards">
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

                // Get the current month and year
                $currentMonth = date("m");
                $currentYear = date("Y");

                // Query to count monthly registrations
                $query = "SELECT COUNT(*) as registrationCount FROM userdata WHERE MONTH(timestamp) = $currentMonth AND YEAR(timestamp) = $currentYear";

                $result = $conn->query($query);

                if ($result) {
                    $row = $result->fetch_assoc();
                    $registrationCount = $row['registrationCount'];

                    // Display the number of monthly registrations
                    echo '<div class="card">
                            <div class="box">
                                <h1>' . $registrationCount . '</h1>
                                <h3>Monthly <br>Registrations</h3>
                            </div>
                            <div class="icon-container">
                                <i class="bx bxs-user-detail"></i>
                            </div>
                        </div>';
                } else {
                    echo "Error: " . $conn->error;
                }

                // Close connection
                $conn->close();
                ?>

<div class="card">
                    <div class="box">
                        <h1>57,000</h1>
                        <h3>Monthly <br>Donations</h3>
                    </div>
                    <div class="icon-container">
                        <i class='bx bx-rupee' ></i>
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

                                        // Query to count total registrations
                                        $query = "SELECT COUNT(*) as totalRegistrations FROM userdata";

                                        $result = $conn->query($query);

                                        if ($result) {
                                            $row = $result->fetch_assoc();
                                            $totalRegistrations = $row['totalRegistrations'];

                                            // Display the total number of registrations
                                            echo '<div class="card">
                                                    <div class="box">
                                                        <h1>' . number_format($totalRegistrations) . '</h1>
                                                        <h3>Total <br>Registrations</h3>
                                                    </div>
                                                    <div class="icon-case">
                                                        <img src="schools.png" alt="">
                                                    </div>
                                                </div>';
                                        } else {
                                            echo "Error: " . $conn->error;
                                        }

                                        // Close connection
                                        $conn->close();
                                        ?>

                
            </div>
            <div class="content-2">
    <div class="recent-payments">
        <div class="title">
            <h1 style="font-weight: 600;">Recent Registrations</h1>
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

        // Query to get recent registrations from the database
        $sql = "SELECT * FROM userdata ORDER BY timestamp DESC LIMIT 10"; // Assuming 'timestamp' is the registration date field
        $result = $conn->query($sql);

        // Display the table header
        echo '<table>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Abhishek Type</th>
                    <th>Abhishek Date</th>
                </tr>';

        // Display the table rows based on database results
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td>' . $row["name"] . '</td>
                    <td>' . $row["mobile"] . '</td>
                    <td>' . $row["abhishekType"] . '</td>
                    <td>' . $row["abhishekDate"] . '</td>
                </tr>';
        }

        // Close the database connection
        $conn->close();

        // Close the table
        echo '</table>';
        ?>
    </div>
</div>

        </div>
    </div>
</body>
</html>