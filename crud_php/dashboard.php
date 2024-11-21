<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .logout-button {
            background-color: blue; 
            color: white; 
            border: none; 
            padding: 10px 20px; 
            text-align: center; 
            text-decoration: none; 
            display: inline-block; 
            font-size: 16px; 
            margin: 4px 2px; 
            cursor: pointer; 
            border-radius: 5px; 
        }
        .logout-button:hover {
            background-color: darkblue; 
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>Bem-vindo ao Sistema de Horários</h2>
        <a href="disciplinas.php">Gerenciar Disciplinas</a><br>
        <a href="horarios.php">Ver Horários</a><br>
        <a href="eventos.php">Gerenciar Eventos</a><br>
        <a href="ver_eventos.php">Ver Eventos</a> <!-- Ainda preciso alterar modo tela cheia -->
        <br><br>
        <button class="logout-button" onclick="logout()">Logout</button>
    </div>

    <script>
        function logout() {
            
            window.location.href = 'index.php';
        }
    </script>
</body>
</html>
