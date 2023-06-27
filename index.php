<!DOCTYPE html>
<html>
<head>
        <title>MySQL Table Viewer</title>
</head>
<body>
        <h1>MySQL Table Viewer</h1>
        <?php
                // Define database connection variables
                $servername = "azure-project-2.mysql.database.azure.com";
                $username = "azure_project_2";
                $password = "Test123!";
                $dbname = "employee_sp";
		  $conn = mysqli_init();
                mysqli_ssl_set($conn,NULL,NULL, "/var/www/html/DigiCertGlobalRootCA.crt.pem", NULL, NULL);
                mysqli_real_connect($conn, $servername, $username, $password, $dbname, 3306, MYSQLI_CLIENT_SSL);

		// Check connection
		if (mysqli_connect_errno($conn)) {
                        die('Failed to connect to MySQL: '.mysqli_connect_error());
                }

                // Query database for all rows in the table
                $sql = "SELECT * FROM mytable";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                        // Display table headers
                        echo "<table><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
                        // Loop through results and display each row in the table
                        while($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td></tr>";
                        }
                        echo "</table>";
                } else {
                        echo "0 results";
                }

                // Close database connection
                $conn->close();
        ?>
</body>
</html>
