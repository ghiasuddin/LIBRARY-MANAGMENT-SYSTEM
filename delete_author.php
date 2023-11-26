<!-- delete_author.php -->

<?php
include('config.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL to delete a record based on the provided ID
    $deleteQuery = "DELETE FROM authors WHERE author_id = $id";

    // Perform the deletion
    if(mysqli_query($conn, $deleteQuery)) {
        // Redirect to the View Authors page after successful deletion
        header("Location: view_author.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid request";
}
?>
