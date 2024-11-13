<?php
$servername = "127.0.0.1"; 
$username = "root"; 
$password = ""; 
$dbname = "todo_list"; 
$port = 3308;

//Mmebuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname, $port); // Menambahkan port MariaDB 3308

//Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

