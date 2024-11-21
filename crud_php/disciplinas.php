<?php
include('db.php');

$sql = "SELECT * FROM horarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gerenciar Disciplinas</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="disciplinas-container">
        <h2>Gerenciar Disciplinas</h2>
        <a href="adicionar_disciplina.php">Adicionar Disciplina</a>
        <table>
            <tr>
                <th>Curso</th>
                <th>Professor</th>
                <th>Matéria</th>
                <th>Sala</th>
                <th>Período</th>
                <th>Ações</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["curso"]."</td>
                            <td>".$row["professor"]."</td>
                            <td>".$row["materia"]."</td>
                            <td>".$row["sala"]."</td>
                            <td>".$row["periodo"]."</td>
                            <td>
                                <a href='editar_disciplina.php?id=".$row["id"]."' class='btn-editar'>Editar</a>
                                <a href='deletar_disciplina.php?id=".$row["id"]."' class='btn-excluir'>Deletar</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhuma disciplina encontrada</td></tr>";
            }
            ?>
        </table>
        <br>
        <a href="dashboard.php" class="button">Voltar ao Menu</a>    
    </div>
</body>
</html>
