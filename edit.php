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

$id = $_GET['id'];

$query0072 = $conn->prepare('SELECT * FROM taken WHERE id=:id');
$query0072->bindparam(':id', $id);
$query0072->execute();
$taken = $query0072->fetch();

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
      <input type="text" id="fname" name="title" placeholder="Title.." value='<?php echo $taken['title']; ?>' require>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Beschrijving</label>
    </div>
    <div class="col-75">
      <input type='text' id="subject" name="beschrijving" placeholder="Omschrijf jouw taak..." value='<?php echo $taken['beschrijving']; ?>' require>
    </div>
  </div>
  <input type='hidden' name='id' value='<?php echo $id; ?>'>
  <div class="row">
    <input type="submit" value="Opslaan">
  </div>
  </form>
</div>

    <script type="text/javascript" src="js/index.js"></script>
    </body>
</html>