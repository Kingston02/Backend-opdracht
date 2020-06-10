<?php
require 'conn.php';

$title = htmlspecialchars($_POST['title']);
$id = $_POST['id'];

if(isset($title) && $_POST['setje'] == 'not'){
    $sql = "UPDATE onderwerpen SET taak=:taak WHERE id=:id";
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute(array(':taak' => $title, ':id' => $id));
} else {
    $sql = "UPDATE taken SET title=:title WHERE id=:id";
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute(array(':title' => $title, ':id' => $id));
}

header('Location:index.php');

?>