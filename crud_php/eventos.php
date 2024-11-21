<?php
include('db.php');

$sql = "SELECT * FROM eventos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gerenciar Eventos</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="eventos-container">
        <h2>Gerenciar Eventos</h2>
        <a href="adicionar_evento.php">Adicionar Evento</a>
        <table>
            <tr>
                <th>Nome</th>
                <th>Data</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["nome"]."</td>
                            <td>".$row["data"]."</td>
                            <td><img src='uploads/".$row["imagem"]."' width='100'></td>
                            <td>
                                <a href='editar_evento.php?id=".$row["id"]."'>Editar</a>
                                <a href='deletar_evento.php?id=".$row["id"]."'>Deletar</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Nenhum evento encontrado</td></tr>";
            }
            ?>
        </table>
        <br>
        <a href="dashboard.php" class="button">Voltar ao Dashboard</a>
    </div>
</body>
</html>
