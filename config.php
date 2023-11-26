<?php
// $conn= new mysqli('localhost','root','','cuvaslibrarymanagment');

// if($conn)
// {
    // echo "connected";
// }else
// echo"hy";
?> 




<?php
$servername = "localhost"; // Replace with your actual server name
$username = "root"; // Replace with your actual database username
$password = ""; // Replace with your actual database password
$database = "cuvaslibrarymanagment"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo " ";
    // You can perform database operations here
}

// Close connection (optional, as PHP will automatically close it at the end of the script)
// $conn->close();
?>
