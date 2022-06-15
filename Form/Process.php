<?php  
    session_start();

    $host = 'localhost';
    $databasename = 'base';
    $username = 'root';
    $password = '';

    $dsn = "mysql:host=$host;dbname=$databasename";
    
    $mysqli = new PDO($dsn, $username, $password);
    
if (isset($_POST['save'])){
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];
    $mysqli->query("INSERT INTO data (name, surname, email) VALUES('$name', '$surname', '$email')") or die($mysqli->error);
    
    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "Success";
    header("location: index.php");
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "Danger";
    header("location: index.php");
}
?>