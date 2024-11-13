<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $task = $_POST['task'];
    $time = $_POST['time'];
    $sql = "UPDATE todos SET task='$task', time='$time' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM todos WHERE id=$id");
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>
    <form method="POST" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="text" name="task" value="<?php echo $row['task']; ?>" required>
        <input type="time" name="time" value="<?php echo $row['time']; ?>" required>
        <button type="submit">Save</button>
    </form>
</body>
</html>
<?php
}
?>
