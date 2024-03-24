<?php

require_once "db_connect.php";

if (isset($_POST["create"])) {
$title = $_POST['title'];
$image = $_POST['image'];
$isbn_code = $_POST['isbn_code'];
$description = $_POST['description'];
$type = $_POST['type'];
$author_first_name = $_POST['author_first_name'];
$author_last_name = $_POST['author_last_name'];
$publisher_name = $_POST['publisher_name'];
$publisher_address = $_POST['publisher_address'];
$publish_date = $_POST['publish_date'];

$sql = "INSERT INTO `media` (`title`, `image`, `isbn_code`, `description`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`) 
        VALUES ('$title', '$image', '$isbn_code', '$description', '$type', '$author_first_name', '$author_last_name', '$publisher_name', '$publisher_address', '$publish_date')";

if (mysqli_query($connection, $sql)) {
    echo "<div class='alert alert-success' role='alert'> New record added successfully
    </div>";
    header("refresh: 3; url= index.php");
} else {
    "<div class='alert alert-danger' role='alert'>
    Something went wrong, please try again later!
    </div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Media</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid d-flex justify-content-between">
    <a class="navbar-brand">Coders Library & Media</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
<div class="collapse navbar-collapse d-flex" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="create.php">Add Media</a>
        </li>
    </ul>
</div>  
      <div class="search d-flex">
      <form class="d-flex searchform">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      </div>
    </div>
  </div>
</nav>
<div class="hero d-flex align-items-center justify-content-center">
<h1>Coders Library</h1>
    </div>
    
    <div class="container create">
    <h2>Add some Media</h2><br>
        <form method="POST">
                <label for="title">Title:</label><br>
                <input type="text" id="title" name="title" placeholder="Media title" required><br>

                <label for="image">Image URL:</label><br>
                <input type="text" id="image" name="image" placeholder="Cover image" required><br>
        
                <label for="isbn_code">ISBN Code:</label><br>
                <input type="text" id="isbn_code" name="isbn_code" placeholder="ISBN Number" required><br>
        
                <label for="description">Short Description:</label><br>
                <textarea id="description" name="description" placeholder="short description" required></textarea><br>
        
                <label for="type">Type:</label><br>
            <select id="type" name="type" required>
                <option value="book">Book</option>
                <option value="CD">CD</option>
                <option value="DVD">DVD</option>
            </select>
            <br>
        
            <label for="author_first_name">Author First Name:</label><br>
            <input type="text" id="author_first_name" name="author_first_name" placeholder="Authors first name:" required><br>
            
            <label for="author_last_name">Author Last Name:</label><br>
            <input type="text" id="author_last_name" name="author_last_name" placeholder="Authors last name:" required><br>
            
            <label for="publisher_name">Publisher Name:</label><br>
            <input type="text" id="publisher_name" name="publisher_name" placeholder="Publisher name:" required><br>

            <label for="publisher_address">Publisher Address:</label><br>
            <input type="text" id="publisher_address" name="publisher_address" placeholder="Publisher address:" required><br>

            <label for="publish_date">Publish Date:</label><br>
            <input type="date" id="publish_date" name="publish_date" placeholder="Publish date:" required><br><br>
        
            <input type="submit" value="Create entry" name="create" required>
        </form>
    </div>
</body>
</html>
    <footer class="footer mt-auto py-3 bg-dark">
  <div class="container text-center">
    <span class="text-light">©Manuel Hirschbeck, Coders Library & Media</span>
  </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>