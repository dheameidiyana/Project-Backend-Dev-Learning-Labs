<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task = $_POST['task'];
    $time = $_POST['time'];
    $sql = "INSERT INTO todos (task, time) VALUES ('$task', '$time')";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
