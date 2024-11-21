<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM eventos WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: eventos.php");
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>
