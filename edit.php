<?php
require 'conn.php';

$id = htmlspecialchars($_GET['id']);

$query0072 = $conn->prepare('SELECT * FROM onderwerpen WHERE id=:id');
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
  <form action="editProc.php" method='POST'>
  <div class="row">
    <div class="col-25">
      <label for="fname">Taak</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="title" placeholder="Title.." value='<?php echo $taken['taak']; ?>' require>
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