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
$nome = $_POST['nome'];
$data_nasc = $_POST['data_nasc'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$dependentes = $_POST['dependentes'];
$renda_mensal = $_POST['renda_mensal'];
$necessidades = $_POST['necessidades'];

// aqui inserimos os dados na tabela
$sql = "INSERT INTO cadastro_comunitario (nome, data_nasc, cpf, telefone, endereco, dependentes, renda_mensal, necessidades)
        VALUES ('$nome', '$data_nasc', '$cpf', '$telefone', '$endereco', '$dependentes', '$renda_mensal', '$necessidades')";

if ($conn->query($sql) === TRUE) {
    echo "<h2>Cadastro realizado com sucesso!</h2>";
    echo "<a href='index.html'>Voltar para o início</a>";
} else {
    echo "Erro ao cadastrar: " . $conn->error;
}

$conn->close();
?>
