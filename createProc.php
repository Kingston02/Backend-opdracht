<?php
require 'conn.php';

$title = $_GET['title'];
$beschrijving = $_GET['beschrijving'];

if(isset($title)){
    $query = $conn->prepare('INSERT INTO taken(title, beschrijving) VALUES(:title, :beschrijving)');
    $query->execute(array(':title' => $title, ':beschrijving' => $beschrijving));

    header('Location:index.php');
}

?>