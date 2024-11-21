<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM eventos WHERE id=$id";
    $result = $conn->query($sql);
    $evento = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $imagem = $_FILES['imagem']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($imagem);

    if ($imagem) {
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $target_file)) {
            $sql = "UPDATE eventos SET nome='$nome', data='$data', imagem='$imagem' WHERE id=$id";
        } else {
            echo "Erro ao fazer upload da imagem.";
        }
    } else {
        $sql = "UPDATE eventos SET nome='$nome', data='$data' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: eventos.php");
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Evento</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="eventos-container">
        <h2>Editar Evento</h2>
        <form method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $evento['id']; ?>">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $evento['nome']; ?>" required><br>
            <label for="data">Data:</label>
            <input type="date" id="data" name="data" value="<?php echo $evento['data']; ?>" required><br>
            <label for="imagem">Imagem:</label>
            <input type="file" id="imagem" name="imagem"><br>
            <input type="submit" value="Salvar">
        </form>
        <br>
        <a href="eventos.php" class="button">Voltar ao Gerenciamento de Eventos</a>
    </div>
</body>
</html>
