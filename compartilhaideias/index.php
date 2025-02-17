<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "compartilhaideias";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consultar as ideias
$sql = "SELECT * FROM ideias ORDER BY data_criacao DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Compartilhe Ideias</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Compartilhe Ideias</h1>
    <a href="adicionar.php">Adicionar Nova Ideia</a>
    <ul>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<li><h2>" . $row["titulo"] . "</h2><p>" . $row["descricao"] . "</p><p>Contato: " . $row["contato"] . "</p><small>Postado em: " . $row["data_criacao"] . "</small></li>";
            }
        } else {
            echo "<li>Nenhuma ideia encontrada.</li>";
        }
        ?>
    </ul>
</body>
</html>

<?php
$conn->close();
?>