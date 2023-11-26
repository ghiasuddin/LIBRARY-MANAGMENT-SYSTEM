<?php
include('config.php');

// Check if an author ID is provided
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the existing data for the specified author ID
    $query = "SELECT * FROM authors WHERE author_id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Fetch the data
        $author = mysqli_fetch_assoc($result);

        // Display the form with the existing data
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Author</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        </head>
        <body>

        <div class="container mt-5">
            <h2>Edit Author</h2>
            <form method="post" action="update_author.php">
                <input type="hidden" name="author_id" value="<?php echo $author['author_id']; ?>">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name:</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $author['first_name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name:</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $author['last_name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $author['email']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="last_name" class="form-label">Phone Number:</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $author['phone_number']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="last_name" class="form-label">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $author['address']; ?>" required>
                </div>


                <!-- Add other fields as needed -->

                <button type="submit" class="btn btn-primary">Update Author</button>
            </form>
        </div>

        </body>
        </html>
        <?php
    } else {
        echo "Error fetching author data: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid request";
}
?>
