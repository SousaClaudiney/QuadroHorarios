<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM horarios WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: disciplinas.php");
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Deletar Disciplina</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="disciplinas-container">
        <h2>Disciplina Deletada</h2>
        <a href="disciplinas.php" class="button">Voltar ao Dashboard</a>
    </div>
</body>
</html>
