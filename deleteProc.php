<?php
require 'conn.php';

$id = $_GET['id'];

if(isset($id)){
    $schaatje2 = $conn->prepare('DELETE FROM onderwerpen WHERE id=:idtjes');
    $schaatje2->execute(array(':idtjes' => $id));

    header('Location:index.php');
}

?>