<?php
require 'conn.php';

$query0072 = $conn->prepare('SELECT * FROM taken');
$query0072->execute();
$taken = $query0072->fetchAll();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/create.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
<a href='index.php'>Terug</a>
    <div class="container">
  <form action="createProc.php">
  <div class="row">
    <div class="col-25">
      <label for="fname">Title lijst</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="title" placeholder="Title.." require>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Taken</label>
    </div>
    <div class="col-75" id='takenDiv'>
      <input type="text" id="fname" name="title" placeholder="Taak.." require>
    </div>
  </div>

  <div class="row">
    <input type="submit" value="Submit">
  </div>
  </form>
  <button onclick='aanmaken()'>+</button>
  <input value='1' type='hidden' id='amountBox'>
</div>

    <script>
      function aanmaken(){
        var amountBox = (document.getElementById('amountBox').value ++);
        var div1 = document.createElement('input');
        // Get template data
        div1.name = 'taken[]';
        div1.type = 'text';
        div1.placeholder = 'Taak'+amountBox+'..';
        // append to our form, so that template data
        //become part of form
        document.getElementById('takenDiv').appendChild(div1);
      }
    </script>

    <script type="text/javascript" src="js/index.js"></script>
    </body>
</html>