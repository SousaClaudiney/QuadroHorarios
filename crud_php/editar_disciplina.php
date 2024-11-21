<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM horarios WHERE id=$id";
    $result = $conn->query($sql);
    $disciplina = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $curso = $_POST['curso'];
    $professor = $_POST['professor'];
    $materia = $_POST['materia'];
    $sala = $_POST['sala'];
    $periodo = $_POST['periodo'];

    $sql = "UPDATE horarios SET curso='$curso', professor='$professor', materia='$materia', sala='$sala', periodo='$periodo' WHERE id=$id";
    
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
    <title>Editar Disciplina</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="disciplinas-container">
        <h2>Editar Disciplina</h2>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $disciplina['id']; ?>">
            <label for="curso">Curso:</label>
            <input type="text" id="curso" name="curso" value="<?php echo $disciplina['curso']; ?>" required><br>
            <label for="professor">Professor:</label>
            <input type="text" id="professor" name="professor" value="<?php echo $disciplina['professor']; ?>" required><br>
            <label for="materia">Matéria:</label>
            <input type="text" id="materia" name="materia" value="<?php echo $disciplina['materia']; ?>" required><br>
            <label for="sala">Sala:</label>
            <input type="text" id="sala" name="sala" value="<?php echo $disciplina['sala']; ?>" required><br>
            <label for="periodo">Período:</label>
            <input type="text" id="periodo" name="periodo" value="<?php echo $disciplina['periodo']; ?>" required><br>
            <input type="submit" value="Salvar">
        </form>
        <br>
        <a href="disciplinas.php" class="button">Voltar ao Dashboard</a>
    </div>
</body>
</html>
