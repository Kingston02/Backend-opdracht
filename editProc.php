<?php
require 'conn.php';

$title = htmlspecialchars($_POST['title']);
$id = $_POST['id'];

if(isset($title)){
    $sql = "UPDATE onderwerpen SET taak=:taak WHERE id=:id";
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute(array(':taak' => $title, ':id' => $id));
}

header('Location:index.php');

?>