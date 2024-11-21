<?php
include('db.php');

$sql = "SELECT * FROM eventos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ver Eventos</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .eventos-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            font-size: 12px; 
        }
        th {
            background-color: #00B0FF; 
            color: white; 
        }
        img {
            width: 100%; 
            height: auto;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="eventos-container">
        <h2>Eventos</h2>
        <table>
            <tr>
                <th>Nome</th>
                <th>Data</th>
                <th>Imagem</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["nome"]."</td>
                            <td>".$row["data"]."</td>
                            <td><img src='uploads/".$row["imagem"]."' alt='Imagem do Evento'></td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Nenhum evento encontrado</td></tr>";
            }
            ?>
        </table>
        <a href="dashboard.php" class="button">Voltar ao Dashboard</a>
    </div>
</body>
</html>
