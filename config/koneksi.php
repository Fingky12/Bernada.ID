<?php

$host = "localhost";
$user= "root";
$pass = "";
$db = "bernada-id";

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error){
  die("Koneksi gagal...");
}

?>