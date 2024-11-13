<?php include('db.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }
        .container {
            width: 400px;
            background: #fff;
            padding: 20px 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            box-sizing: border-box;
            text-align: center;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }
        input[type="text"],
        input[type="time"] {
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 1rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        button {
            padding: 15px;
            background: #28a745;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        button:hover {
            background: #218838;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background: #f4f4f4;
            margin-bottom: 10px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        li:hover {
            transform: translateY(-5px);
        }
        .task {
            font-size: 1.1rem;
            color: #555;
        }
        .time {
            font-size: 1rem;
            color: #777;
        }
        a {
            text-decoration: none;
            color: #007bff;
            margin-left: 10px;
            font-size: 0.9rem;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>To-Do List</h1>
        <form method="POST" action="add.php">
            <input type="text" name="task" required placeholder="Enter new task...">
            <input type="time" name="time" required>
            <button type="submit">Add</button>
        </form>

        <h2>Tasks</h2>
        <ul>
            <?php
            $sql = "SELECT * FROM todos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<li><span class='task'>" . $row['task'] . "</span> <span class='time'>at " . $row['time'] . "</span>" .
                         " <span><a href='edit.php?id=" . $row['id'] . "'>Edit</a> " .
                         " <a href='delete.php?id=" . $row['id'] . "'>Delete</a></span></li>";
                }
            } else {
                echo "<li>No tasks found</li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>
