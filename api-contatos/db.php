<?php
// Configurações do banco de dados
$host = "localhost";
$usuario = "root";
$senha = "admin";
$banco = "meubanco";

// Conexão com o banco
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificação da conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Definir charset como UTF-8
$conn->set_charset("utf8");
?>
