<?php
require_once "db_connect.php";

$publisher_name = $_GET["publisher_name"];

$sql = "SELECT * FROM `media` WHERE publisher_name = '{$publisher_name}'";
$result = mysqli_query($connection, $sql);

$layout = "";

if (mysqli_num_rows($result) == 0) {
  $layout = "No result";
} else {
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  foreach ($rows as $value) {
    $layout .= "<div class='d-flex m-5'><div class='card my-3' style='width: 20rem;'>
        <img src='{$value["image"]}'height: 300px;' class='card-img-top' alt='...'>
        <div class='card-body'>
          <h5 class='card-title'>{$value['title']}</h5>
          <p class='card-text'>{$value['description']}.</p>
        </div>
        <ul class='list-group list-group-flush'>
          <li class='list-group-item'>ISBN: {$value['isbn_code']}</li>
          <li class='list-group-item'>Type: {$value['type']}</li>
          <li class='list-group-item'><a class='btn btn-secondary' href='publisher.php?publisher_name={$value["publisher_name"]}'>Publisher: {$value["publisher_name"]}</a></li>
            <li class='list-group-item'>Publish date:{$value["publish_date"]}</li>
            <li class='list-group-item'>Address: {$value["publisher_address"]}</li>
        </ul>
          <p><a class='btn btn-danger' href='index.php'>Back</a></p>
            </div>
        </div>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>media</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid d-flex justify-content-between">
      <a class="navbar-brand">Coders Library & Media</a>

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
        <form class="d-flex searchform" action="index.php" method="GET">
          <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="hero d-flex align-items-center justify-content-center">
    <h1>Coders Library</h1>
  </div>
  <div class="container my-3">

    <div class='row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 gap-3 d-flex justify-content-center'>
      <?= $layout ?>
    </div>

  </div>
  <footer class="footer mt-auto py-3 bg-dark">
    <div class="container text-center">
      <span class="text-light">©Manuel Hirschbeck, Coders Library & Media</span>
    </div>
  </footer>
</body>