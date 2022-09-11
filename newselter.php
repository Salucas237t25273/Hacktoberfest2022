<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$email=$_POST['email'];
}

// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "pk";


// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());//testing for connecting mysql
}

else{ 
    $sql = "INSERT INTO `newshelter`  ( `email`) VALUES ( '$email');";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("location:index.php");;
        }  
}
?>