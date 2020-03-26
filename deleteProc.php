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

if(isset($id)){
    $schaatje2 = $conn->prepare('DELETE FROM taken WHERE id=:idtjes');
    $schaatje2->execute(array(':idtjes' => $id));

    header('Location:index.php');
}

?>