<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlinemusic";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error)
{
    die("Connection Failed:". $conn->error);
}
echo "Connection successful";

// $sql = "CREATE DATABASE onlinemusic";
// if($conn->query($sql)===True){
//     echo "Created database successfully";
// }
// else{
//     echo "Error in creating database ".$conn->error;
// }

// $sql = "CREATE TABLE Admin(
//     Fname varchar(20) not null,
//     Mname varchar(20),
//     Lname varchar(20) not null,
//     email varchar(30) not null, 
//     password varchar(20) not null,
//     primary key(email)
// )";
// if($conn->query($sql)===True){
//     echo "Created table successfully";
// }
// else{
//     echo "Error in creating table ".$conn->error;
// }




?>