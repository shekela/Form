<?php  
    session_start();

    $host = 'localhost';
    $databasename = 'base';
    $username = 'root';
    $password = '';

    $dsn = "mysql:host=$host;dbname=$databasename";
    
    $mysqli = new PDO($dsn, $username, $password);
    

    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

    header("location: index.php");

?>