<?php  

    $host = 'localhost';
    $databasename = 'base';
    $username = 'root';
    $password = '';

    $dsn = "mysql:host=$host;dbname=$databasename";
    
    $mysqli = new PDO($dsn, $username, $password);
    
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    
    if($name != '' &&  $surname != '' && $email != ''){
      echo "success";
      $mysqli->query("INSERT INTO data (name, surname, email) VALUES('$name', '$surname', '$email')") or die($mysqli->error);
      
    }
    

    else{

     
        echo "Please fill all fields";

    }

    
?>