<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $imagem = $_FILES['imagem']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($imagem);

    // Verificar se o diretório existe, se não, criar
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO eventos (nome, data, imagem) VALUES ('$nome', '$data', '$imagem')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: eventos.php");
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Erro ao fazer upload da imagem.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Evento</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="eventos-container">
        <h2>Adicionar Evento</h2>
        <form method="post" action="" enctype="multipart/form-data">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br>
            <label for="data">Data:</label>
            <input type="date" id="data" name="data" required><br>
            <label for="imagem">Imagem:</label>
            <input type="file" id="imagem" name="imagem" required><br>
            <input type="submit" value="Adicionar">
        </form>
        <br>
        <a href="eventos.php" class="button">Voltar ao Gerenciamento de Eventos</a>
    </div>
</body>
</html>
