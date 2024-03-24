<?php
require_once("db_connect.php");

// Überprüfe, ob das Suchfeld ausgefüllt wurde
$search_query = isset($_GET['search']) ? $_GET['search'] : '';

// Standard-SQL-Abfrage
$sql = "SELECT * FROM `media`";
$layout = "";

// Wenn ein Suchbegriff angegeben ist
if (!empty($search_query)) {
  // SQL-Abfrage für die Suche
  $search_sql = "SELECT * FROM `media` WHERE `title` LIKE '%$search_query%' OR `author_first_name` LIKE '%$search_query%' OR `author_last_name` LIKE '%$search_query%'";

  // SQL-Abfrage ausführen
  $search_result = mysqli_query($connection, $search_sql);

  // Wenn keine Ergebnisse gefunden wurden
  if (!$search_result || mysqli_num_rows($search_result) == 0) {
    $layout = "<h1 class='text-center text-light'>No result</h1>";
  } else {
    // Ergebnisse der Suche durchlaufen und Karten erstellen
    while ($value = mysqli_fetch_assoc($search_result)) {
      $layout .=
        "<div class='d-flex m-2'>
      <div class='card my-3' style='width: 18rem; height: 32rem;'>
        <img src='{$value["image"]}' style='width: 100%; height: 350px;' class='card-img-top' alt='...'>
        <div class='card-body mb-2'>
        <h5 class='card-title'>{$value["title"]}</h5>
        <p class='card-text'>{$value["author_first_name"]} {$value["author_last_name"]}</p>
        <a href='details.php?id={$value["id"]}' class='btn btn-warning'>Details</a>
      </div>
      </div>
  </div>";
    }
  }
} else {
  // Standard-SQL-Abfrage ausführen, wenn kein Suchbegriff angegeben ist
  $result = mysqli_query($connection, $sql);

  // Wenn keine Ergebnisse gefunden wurden
  if (mysqli_num_rows($result) == 0) {
    $layout = "<h1 class='text-center text-light'>No result</h1>";
  } else {
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach ($rows as $value) {
      $layout .= "<div class='d-flex m-2'>
      <div class='card my-3' style='width: 18rem; height: 32rem;'>
        <img src='{$value["image"]}' style='width: 100%; height: 350px;' class='card-img-top' alt='...'>
        <div class='card-body mb-2'>
        <h5 class='card-title'>{$value["title"]}</h5>
        <p class='card-text'>{$value["author_first_name"]} {$value["author_last_name"]}</p>
        <a href='details.php?id={$value["id"]}' class='btn btn-warning'>Details</a>
      </div>
      </div>
  </div>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coders Library&Media</title>
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
  
  <div class="container my-2">
  
    <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-1 row-cols-1 d-flex justify-content-center">
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