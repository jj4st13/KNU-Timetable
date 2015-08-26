<?php
//use pdo
//about pdo and mysqli

$servername = "localhost";
$username = "loginuser";         //mysql 관리자 ID
$password = "loginpw";     //mysql 관리자 Password

try {
    //conect Database
    $conn = new PDO("mysql:host=$servername;dbname=knu_timetable", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
	echo $e;
}
?>
