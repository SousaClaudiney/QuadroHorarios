<?php
include 'db.php';

function carregar_dados($conn) {
    $sql = "SELECT curso, professor, materia, sala, periodo FROM horarios";
    $result = $conn->query($sql);
    return $result;
}

$result = carregar_dados($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Horários</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="horarios-container">
        <h2>Lista de Horários</h2>
        <table>
            <tr>
                <th>Curso</th>
                <th>Professor</th>
                <th>Matéria</th>
                <th>Sala</th>
                <th>Período</th>
            </tr>
            <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row["curso"]; ?></td>
                <td><?php echo $row["professor"]; ?></td>
                <td><?php echo $row["materia"]; ?></td>
                <td><?php echo $row["sala"]; ?></td>
                <td><?php echo $row["periodo"]; ?></td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <a href="dashboard.php" class="button">Voltar ao Menu</a>
    </div>
</body>
</html>
