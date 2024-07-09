<?php
include 'db.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD con PHP y MySQL</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Lista de Usuarios</h2>
        <a href="create.php" class="button">Crear Nuevo Usuario</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Edad</th>
                <th>Acciones</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["age"] . "</td>";
                    echo "<td><a href='update.php?id=" . $row["id"] . "' class='button'>Editar</a> | <a href='delete.php?id=" . $row["id"] . "' class='button' style='background-color: #f44336;'>Eliminar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay registros</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
