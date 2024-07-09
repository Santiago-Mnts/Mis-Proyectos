<?php
include 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $sql = "UPDATE users SET name='$name', email='$email', age='$age' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: index.php");
    exit();
} else {
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Actualizar Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label, input {
            margin: 5px 0;
        }
        input {
            padding: 10px;
            font-size: 16px;
        }
        button {
            padding: 10px;
            font-size: 16px;
            color: white;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            margin-top: 10px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Actualizar Usuario</h2>
        <form method="POST">
            <label>Nombre:</label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
            <label>Edad:</label>
            <input type="number" name="age" value="<?php echo $row['age']; ?>" required>
            <button type="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>
