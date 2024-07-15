<?php

/**
 * This function establishes a connection to a MySQL database using the provided credentials.
 *
 * @param string $servername The hostname of the MySQL server.
 * @param string $username The username for the MySQL server.
 * @param string $password The password for the MySQL server.
 * @param string $dbname The name of the database to connect to.
 *
 * @return mysqli|false Returns a MySQLi object representing the connection on success, or false on failure.
 */
function connectToDatabase($servername, $username, $password, $dbname)
{
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

// Usage example:
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "oyly";

$conn = connectToDatabase($servername, $username, $password, $dbname);

if ($conn) {
    echo "Connected successfully";
}