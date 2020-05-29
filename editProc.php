<?php
require 'conn.php';

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

header('Location:index.php');

?>