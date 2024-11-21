<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $curso = $_POST['curso'];
    $professor = $_POST['professor'];
    $materia = $_POST['materia'];
    $sala = $_POST['sala'];
    $periodo = $_POST['periodo'];

    if ($curso && $professor && $materia && $sala && $periodo) {
        $sql = "INSERT INTO horarios (curso, professor, materia, sala, periodo) VALUES ('$curso', '$professor', '$materia', '$sala', '$periodo')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: disciplinas.php");
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Disciplina</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="disciplinas-container">
        <h2>Adicionar Disciplina</h2>
        <form method="post" action="">
            <label for="curso">Curso:</label>
            <input type="text" id="curso" name="curso" required><br>
            <label for="professor">Professor:</label>
            <input type="text" id="professor" name="professor" required><br>
            <label for="materia">Matéria:</label>
            <input type="text" id="materia" name="materia" required><br>
            <label for="sala">Sala:</label>
            <input type="text" id="sala" name="sala" required><br>
            <label for="periodo">Período:</label>
            <input type="text" id="periodo" name="periodo" required><br>
            <input type="submit" value="Adicionar">
        </form>
        <br>
        <a href="disciplinas.php" class="button">Voltar ao Dashboard</a>
    </div>
</body>
</html>
