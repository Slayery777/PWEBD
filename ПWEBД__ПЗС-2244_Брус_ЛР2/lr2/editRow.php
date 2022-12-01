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
          <h1>Редагування</h1>  
          <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              require_once "functions.php";
              if (isset($_POST['submit'])) {
                if($_POST['дата'] && $_POST['nameofsubject'] && $_POST['оцінка'] && $_POST['опис']) {
                  editRow($_POST['id'],$_POST['дата'],$_POST['nameofsubject'],$_POST['оцінка'],$_POST['опис']);
                }
                else{
                  echo '<script>alert("Ви не ввели всі данні")</script>';
                }
              }
            $rows = getRow($_POST['id']);
            echo '<form action="editRow.php" method="post">';
            echo '<input type="text" name="дата" value = "'.$rows[0]["date"].'">';
            echo '<input type="text" name="nameofsubject" value = "'.$rows[0]["nameofsubject"].'">';
            echo '<input type="text" name="оцінка" value = "'.$rows[0]["mark"].'">';
            echo '<input type="text" name="опис" value = "'.$rows[0]["description"].'">';
            echo '<input type="hidden" name="id" value="'.$rows[0]["id"].'">';
            echo '<input type="submit" name = "submit" value="ОК">';
            echo '</form>';
            }
          ?>
          <input type="button" value = "Назад" onclick="location='index.php'" />
      </div>
    </main>
  </body>
</html>