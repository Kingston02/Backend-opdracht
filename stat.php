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
$statuss = 'check';
$statuss2 = '';

$query0072 = $conn->prepare('SELECT * FROM taken WHERE id = :id');
$query0072->bindparam(':id', $id);
$query0072->execute();
$taken = $query0072->fetch();

if($taken['statuss'] == 'check'){
    $sql = "UPDATE taken SET statuss=:statuss WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(':statuss' => $statuss2, ':id' => $id));
} else {
    $sql = "UPDATE taken SET statuss=:statuss WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(':statuss' => $statuss, ':id' => $id));
}

header('Location:index.php');

?>