<?php
require 'conn.php';

/**
 * de vars van de taken form
 */
$title = htmlspecialchars($_POST['title']);
$taken = $_POST['taken'];

/**
 * kijkt of het allemaal wel gezet is
 */
if(isset($title) && isset($taken)){
    $query = $conn->prepare('INSERT INTO taken(title) VALUES(:title)');
    $query->execute(array(':title' => $title));

    $last_id = $conn->lastInsertId();
    echo $last_id;
    
    foreach($taken as $taak){
        $query = $conn->prepare('INSERT INTO onderwerpen(taak_id, taak) VALUES(:id, :taak)');
        $query->execute(array(':id' => $last_id, ':taak' => $taak));
    }

    header('Location:index.php');
} else {
    header('Location:index.php');
}

?>