<?php 
    function connectDB(){
        global $mysqli;
        $mysqli = new mysqli("localhost","root","","sys"); 
        mysqli_set_charset($mysqli, 'utf8');
    }
    function closeDB(){
        global $mysqli;
        $mysqli->close();
    }
    function getData ($date){
        global $mysqli;
        connectDB();
        $result = $mysqli->query("SELECT * FROM sys.data WHERE date = '$date' LIMIT 99999999");
        return resultToArray($result);
    }
    function getRow ($id){
        global $mysqli;
        connectDB();
        $result = $mysqli->query("SELECT * FROM sys.data WHERE id = '$id' LIMIT 1");
        return resultToArray($result);
    }
    
    function resultToArray($result){
        $array = array();
        while($row = $result->fetch_assoc()){
            $array[] = $row;
        }
        return $array;
    }

    function editRow($id, $date, $nameofsubject, $mark, $description){
        global $mysqli;
        connectDB();
        $mysqli->query("UPDATE `sys`.`data` SET `date` = '$date', `nameofsubject` = '$nameofsubject', `mark` = '$mark', `description` = '$description' WHERE (`id` = '$id')");
    }

    function deleteRow($id){
        global $mysqli;
        connectDB();
        $mysqli->query("DELETE FROM `sys`.`data` WHERE `id` = '$id'");
    }
    
    function insertRow($date, $subject, $mark, $description){
        global $mysqli;
        connectDB();
        $mysqli->query("INSERT INTO `sys`.`data` (`date`, `nameofsubject`, `mark`, `description`) VALUES ('$date', '$subject', '$mark', '$description')");
    }

    function getMaxDate(){
        global $mysqli;
        connectDB();
        $result = $mysqli->query("SELECT MAX(date) FROM sys.data");
        return resultToArray($result);
    }
    function getMinDate(){
        global $mysqli;
        connectDB();
        $result = $mysqli->query("SELECT MIN(date) FROM sys.data");
        return resultToArray($result);
    }
?>