<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Website</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
  </head>
  <body>
  <style>
  <?php include "style.css" ?>
  </style>
    <main>
        <div class = "container">
            <h1>Додавання запису</h1>  
            <script src="index.js"></script>
            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    require_once "functions.php";
                if (isset($_POST['submit'])) {
                    if($_POST['дата'] && $_POST['nameofsubject'] && $_POST['оцінка'] && $_POST['опис']) {
                    insertRow($_POST['дата'],$_POST['nameofsubject'],$_POST['оцінка'],$_POST['опис']);
                    }
                    else{
                        echo '<script>alert("Ви не ввели всі данні")</script>';
                    }
                }
                echo '<form action="addRow.php" method="post">';
                echo '<input type="text" name="дата" value = "" placeholder="рррр-мм-дд">';
                echo '<input type="text" name="nameofsubject" value = "" placeholder="назва предмету">';
                echo '<input type="text" name="оцінка" value = "" placeholder="оцінка">';
                echo '<input type="text" name="опис" value = "" placeholder="Опис">';
                echo '<input type="submit" name = "submit" value="ОК">';
                echo '</form>';
                }
            ?>
            <input type="button" value = "Назад" onclick="location='index.php'" />
        </div>
    </main>
  </body>
</html>