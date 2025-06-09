<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "projeto_comunitario";
$porta = 3316;

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $database, $porta);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Receber dados do formulário
$nome = $_POST['nome'];
$especie = $_POST['especie'];
$idade = $_POST['idade'];
$porte = $_POST['porte'];
$descricao = $_POST['descricao'];
$responsavel = $_POST['responsavel'];

// Prepara a query com segurança (evita SQL Injection)
$sql = "INSERT INTO animais_adocao (nome, especie, idade, porte, descricao, responsavel)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $nome, $especie, $idade, $porte, $descricao, $responsavel);

// Executa e verifica
if ($stmt->execute()) {
    echo "<h2>Cadastro realizado com sucesso!</h2>";
    echo "<a href='../index.html'>Voltar para o início</a>";
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
