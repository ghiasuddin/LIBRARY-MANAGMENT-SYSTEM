<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Database Tables</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>

<?php
include("navbar.php");
// include("config.php");
?>

<div class="container">
    <h2 class="mb-4">View Authors</h2>

    <?php
    // Include your database connection file (config.php or similar)
    include('config.php');
    // Assuming you have a table named 'authors', change it if needed
    $table_name = 'authors';

    // Query to select all rows from the table
    $query = "SELECT * FROM $table_name";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "Error: " . mysqli_error($conn);
    } else {
        // Check if there are rows in the result
        if (mysqli_num_rows($result) > 0) {
            // Display the table
            echo '<table class="table table-striped table-light table-bordered">';
            echo '<thead class="thead-dark"><tr>';
            while ($field_info = mysqli_fetch_field($result)) {
                echo '<th>' . $field_info->name . '</th>';
            }
            // Add an extra column for Actions
            echo '<th>Actions</th>';
            echo '</tr></thead><tbody>';

            // Display the table rows
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                foreach ($row as $key => $value) {
                    echo '<td>' . $value . '</td>';
                }
                // Add buttons for actions (replace # with actual URLs or actions)
                echo '<td>
                <a href="edit_author.php?id=' . $row['author_id'] . '" class="btn btn-primary btn-sm">Edit</a>
                <a href="delete_author.php?id=' . $row['author_id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this author?\')">Delete</a>
              </td>';
                echo '</tr>';
            }

            echo '</tbody></table>';
        } else {
            echo '<div class="alert alert-secondary">No records found in the ' . $table_name . ' table.</div>';
        }
    }

    // Close the database connection
    mysqli_close($conn);
    ?>

</div>

</body>
</html>
