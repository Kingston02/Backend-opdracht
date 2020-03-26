<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "backend";

// Create connection
try{
  $conn = new PDO("mysql:host=$server;dbname=$dbname","$username","$password");
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  die('Unable to connect with the database');
}

$query0072 = $conn->prepare('SELECT * FROM taken');
$query0072->execute();
$taken = $query0072->fetchAll();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/create.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
<a href='index.php'>Terug</a>
    <div class="container">
  <form action="createProc.php">
  <div class="row">
    <div class="col-25">
      <label for="fname">Title</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="title" placeholder="Title.." require>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Beschrijving</label>
    </div>
    <div class="col-75">
      <textarea id="subject" name="beschrijving" placeholder="Omschrijf jouw taken..." style="height:200px" require></textarea>
    </div>
  </div>
  <div class="row">
    <input type="submit" value="Submit">
  </div>
  </form>
</div>

    <script type="text/javascript" src="js/index.js"></script>
    </body>
</html>