<?php
require 'conn.php';

if(isset($_GET['filter']) && $_GET['filter'] == 'status'){
    $query0072 = $conn->prepare('SELECT * FROM taken ORDER BY statuss DESC');
} elseif(isset($_GET['filter']) && $_GET['filter'] == 'datum'){
    $query0072 = $conn->prepare('SELECT * FROM taken ORDER BY datum DESC');
} else {
    $query0072 = $conn->prepare('SELECT * FROM taken');
}

$query0072->execute();
$taken = $query0072->fetchAll();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>

    <div id="myDIV" class="header">
        <h2 style="margin:5px">Taken lijst</h2>
        <a href='create.php'><span class="addBtn">Toevoegen</span></a>
        <a href='index.php?filter=datum'><span  style='margin-left:1em;margin-right:1em;' class="addBtn">Datum</span></a>
        <a href='index.php?filter=status'><span class="addBtn">status</span></a>
    </div>

    <ul id="myUL">
        <?php foreach($taken as $task){ 

            $query0072 = $conn->prepare('SELECT * FROM taken INNER JOIN onderwerpen WHERE onderwerpen.taak_id = :taak');
            $query0072->execute(array(':taak'=>$task['id']));
            $onderwerpen = $query0072->fetchAll();

            ?>
            <li <?php if($task['statuss'] == 'check'){ echo 'class="checked"'; } ?>>
            <a style='position:absolute; right:100px;' href='stat.php?id=<?php echo $task['id']; ?>'>
            <span>Totale lijst klaar</span>
            </a>
            <a href='edit.php?id=<?php echo $task['id']; ?>' style='position:absolute; right:40px;' class='edit'>Edit</a>
            <?php echo '<h3>'.$task['title'].'</h3>' . '</a>' . 'Taken:'; foreach($onderwerpen as $ond){ echo '<div>' . $ond['taak'] .'<br>'.$ond['statuss']. '</div>'; } ?>
            <a href='deleteProc.php?id=<?php echo $task['id']; ?>'>
            <span class='close'>x</span></li>
            </a>
        <?php } ?>
    </ul>
    
    <script type="text/javascript" src="js/scrip.js"></script>
    </body>
</html>
