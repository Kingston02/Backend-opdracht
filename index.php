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
        <link rel="stylesheet" type="text/css" href="css/index.css">
    </head>
    <body>

    <div id="myDIV" class="header">
        <h2 style="margin:5px">My To Do List</h2>
        <input type="text" id="myInput" placeholder="Title...">
        <span onclick="newElement()" class="addBtn">Add</span>
    </div>

    <ul id="myUL">
        <?php foreach($taken as $task){ ?>
            <li><?php echo $task['title']; ?></li>
        <?php } ?>
    </ul>
    
    <script type="text/javascript" src="js/index.js"></script>
    </body>
</html>
