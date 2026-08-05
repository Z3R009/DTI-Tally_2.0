<?php

$host="localhost";
$user="root";
$pass="";
$db="sportsfest";

$conn = new mysqli($host,$user,$pass,$db);

if($conn->connect_error){
    die("Connection Failed");
}
?>