<!DOCTYPE html>
<html>
<head>
    <title>Author</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
<header>

<?php
include('config.php');
include("navbar.php");
?>
</header>
<!-- Notification panel 
<div class="alert alert-danger mb-0" role="alert">
    Important notification goes here only
    </div>
Navigation bar 
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 bg-dark" style="height: 100vh;">
        <a href="dashboard.php" class="btn btn-dark btn-block text-left">Home </a>
        <a href="add_author.php" class="btn btn-light btn-block text-left">Author</a>
        <a href="dashboard.php" class="btn btn-dark btn-block text-left">Books</a>
        <a href="dashboard.php" class="btn btn-dark btn-block text-left">Categories</a>
        <a href="dashboard.php" class="btn btn-dark btn-block text-left">Checkouts</a>
        <a href="dashboard.php" class="btn btn-dark btn-block text-left">Fines</a>
        <a href="dashboard.php" class="btn btn-dark btn-block text-left">Members</a>
        <a href="dashboard.php" class="btn btn-dark btn-block text-left">Publishers</a>
        </div> -->
        <!-- Main content area for adding authors -->
    <div class="container" style="color : black  " >
    <br>
    <h1>Add Author</h1>
    <form method="post" action="" >
        <div class="form-group" >
            <label for="first_name" style="color : black">First Name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" style = "border : solid" required>
        </div>

        <div class="form-group">
            <label for="last_name" style="color : black"  >Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" style = "border : solid" required>
        </div>
        
        <div class="form-group" style="color : black">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" style = "border : solid" required>
        </div>
        
        <div class="form-group" style="color : black">
            <label for="phone_number">Phone Number:</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" style = "border : solid" required>
        </div>
        
        <div class="form-group" style="color : black">
            <label for="address">Address:</label>
            <textarea class="form-control" id="address" name="address" rows="3" style = "border : solid" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary" name =save>Add Author </button>
       <a button href="view_author.php" type="submit" class="btn btn-success" name =view>View</button> </a>
          
                </form>
            </div>
        </div>
    </div>

    <?php



if(isset($_POST['save'])){


// $pid = $_POST['author_id'];
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$email = $_POST['email'];
$phnum = $_POST['phone_number'];
$add = $_POST['address'];



$qry= "INSERT INTO authors (first_name,last_name,email,phone_number,address)VALUES('$fname', '$lname','$email', '$phnum','$add')";
$result= mysqli_query($conn,$qry);

if(!$result){
    echo "error:".$qry."<br>".$conn->error;
            }
else
            {
            echo "add";
            }       
    mysqli_close($conn);
    }
?>
</body>
</html>
