<?php
require "db_connect.php";

$id = $_GET["id"];

$sql = "SELECT * FROM `media` WHERE id = {$id}";

$result = mysqli_query($connection, $sql);

$row = mysqli_fetch_assoc($result);
$availability = (strpos($row["availability"], "available") !== false) ? "<p class='m-1 btn btn-success'>Available</p>" : "<p class='m-1 btn btn-danger'>Reserved</p>";

$layout = "<div class='card text-center my-5' style='width: 30rem'>
<img src='{$row["image"]}' class='card-img-top' alt='...'>
<div class='card-body'>
  <h5 class='card-title'>{$row["title"]}</h5>
  <p class='card-text'>{$row["description"]}.</p>
</div>
<ul class='list-group list-group-flush'>
  <li class='list-group-item'>ISBN: {$row["isbn_code"]}</li>
  <li class='list-group-item'>Type: {$row["type"]}</li>
  <li class='list-group-item'>Author: {$row["author_first_name"]} {$row["author_last_name"]}</li>
  <li class='list-group-item'><a class='btn btn-secondary' href='publisher.php?publisher_name={$row["publisher_name"]}'>Publisher: {$row["publisher_name"]}</a></li>
  <li class='list-group-item'>Publish date: {$row["publish_date"]}</li>
  <li class='list-group-item'>Address: {$row["publisher_address"]}</li>
  
</ul>
<div class='d-flex justify-content-between'>
  <div class=''><a class='btn btn-dark m-1' href='index.php'>Back</a></div>
  {$availability}
  </div>
  

</div>
</div>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <div class="container d-flex justify-content-center">
    
    <?= $layout ?>

    </div>
    <footer class="footer mt-auto py-3 bg-dark">
  <div class="container text-center">
    <span class="text-light">©Manuel Hirschbeck, Coders Library & Media</span>
  </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>