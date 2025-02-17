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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $contato = $_POST["contato"];

    $sql = "INSERT INTO ideias (titulo, descricao, contato) VALUES ('$titulo', '$descricao', '$contato')";

    if ($conn->query($sql) === TRUE) {
        echo "Ideia adicionada com sucesso!";
        echo "<br><a href='index.php'>Voltar para a lista de ideias</a>";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Adicionar Ideia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Adicionar Nova Ideia</h1>
    <form method="post" action="adicionar.php">
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" required><br>
        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao" required></textarea><br>
        <label for="contato">Contato:</label><br>
        <input type="text" id="contato" name="contato" required><br>
        <button type="submit">Compartilhar Ideia</button>
    </form>
    <br>
    <a href="index.php">Voltar para a lista de ideias</a>
</body>
</html>
