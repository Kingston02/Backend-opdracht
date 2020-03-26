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

$title = $_GET['title'];
$beschrijving = $_GET['beschrijving'];

if(isset($title)){
    $query = $conn->prepare('INSERT INTO taken(title, beschrijving) VALUES(:title, :beschrijving)');
    $query->execute(array(':title' => $title, ':beschrijving' => $beschrijving));

    header('Location:index.php');
}

?>