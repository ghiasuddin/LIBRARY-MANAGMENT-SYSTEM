<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $id = $_POST['author_id'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $phnum = $_POST['phone_number'];
    $add = $_POST['address'];
    // Add other fields as needed

    // Update data in the database
    $updateQuery = "UPDATE authors SET first_name='$fname', last_name='$lname' , email='$email' , phone_number='$phnum' , address='$add'  WHERE author_id = $id";
    $result = mysqli_query($conn, $updateQuery);

    if ($result) {
        header("Location: view_author.php");
    } else {
        echo "Error updating author: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid request";
}
?>
