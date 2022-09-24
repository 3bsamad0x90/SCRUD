<?php
    require_once("connect.php");
    $id = $_GET['id']; 
    echo $id;
    $query = "DELETE FROM users WHERE id = $id";
    $deleteQuery = $conn -> query($query);
    if($deleteQuery){
        header("Location: ../index.php");
        exit(); 
    }else{
        header("Location: ../index.php?$conn -> connect_error");
    }
?>