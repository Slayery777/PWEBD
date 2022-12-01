<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LR2</title>
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
  </head>
  <body>
  <style>
  <?php include "style.css" ?>
  </style>
    <main>
      <div class = "header">
        <div class = "enter_date">
          <span>Введіть дату:</span>
          <form action="index.php" method="post">
          <input name="date" type="date">
          <input type='submit' value='ок'>
          </form>
        </div>
      </div>
      <div class = "content">
      <div class = "available_dates">
          <span></span>
          <?php
            require_once "functions.php";
              $mindate = getMinDate();
              $maxdate = getMaxDate();
                        echo ' <span class = "min">('.$mindate[0]["MIN(date)"].')></span>';
                        echo '<span class = "max">('.$maxdate[0]["MAX(date)"].')</span>';
          ?>
        </div>
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
            require_once "functions.php";
            if (isset($_POST['id'])) {
              deleteRow($_POST['id']);
            }
            if (isset($_POST['date'])) {
              $rows = getData($_POST['date']);
                for($i = 0; $i < count($rows); $i++){
                        echo "<table class = 'table' border='solid'>
                              <tr>";
                        echo '<td>'.$rows[$i]["date"].'</td>';
                        echo '<td>'.$rows[$i]["nameofsubject"].'</td>';
                        echo '<td>'.$rows[$i]["mark"].'</td>';
                        echo '<td>'.$rows[$i]["description"].'</td>';
                        echo '<td><form action="index.php" method="POST"> <input type = "image" width = "25" name = "deleteRow" src = "ico/x.png" id = '.$rows[$i]["id"].'></td>';
                        echo '<input type="hidden" name="id" value="'.$rows[$i]["id"].'"></form>';
                        echo '<td><form action="editRow.php" method="POST"> <input type = "image" width = "25" name = "row" src = "ico/edit.png"></td>';
                        echo '<input type="hidden" name="id" value="'.$rows[$i]["id"].'"></form></tr>
                              </table>';
                }
           }
          }
        ?>
      </div>
      <div class = "footer">
        <form action="addRow.php" method="post">
        <input name="plusico" type="image" width="25" src = "ico/plus.png">
        </form>
      </div>
    </main> 
  </body>
</html>