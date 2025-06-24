<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "projeto_comunitario";


// cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $database, $porta);

// aqui verificamos a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// recebe dados do formulário
$nome = $_POST['nome'] ?? '';
$tipo = $_POST['tipo'] ?? '';
$descricao = $_POST['descricao'] ?? '';
$contato = $_POST['contato'] ?? '';

$sql = "INSERT INTO doacoes (nome, tipo, descricao, contato) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $nome, $tipo, $descricao, $contato);

// executa e verifica
if ($stmt->execute()) {
    echo "<h2>Doação registrada com sucesso!</h2>";
    echo "<a href='../index.html'>Voltar para o início</a>";
} else {
    echo "Erro ao registrar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
