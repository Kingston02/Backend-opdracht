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
$id = $_GET['id'];

if(isset($title)){
    $sql = "UPDATE taken SET title=:title, beschrijving=:beschrijving WHERE id=:id";
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute(array(':title' => $title, ':beschrijving' => $beschrijving, ':id' => $id));
}

?>