<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); // permite acesso de qualquer origem
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

require 'db.php';

// Captura o método HTTP
$metodo = $_SERVER['REQUEST_METHOD'];

// Lê os dados enviados em JSON (caso sejam POST ou PUT)
$dadosJson = file_get_contents("php://input");
$dados = json_decode($dadosJson, true);

// ROTAS DA API
switch ($metodo) {
    case 'GET':
        if (isset($_GET['id'])) {
            // Buscar um contato específico
            $id = intval($_GET['id']);
            $resultado = $conn->query("SELECT * FROM contatos WHERE id = $id");
            echo json_encode($resultado->fetch_assoc());
        } else {
            // Listar todos os contatos
            $resultado = $conn->query("SELECT * FROM contatos ORDER BY nome");
            $contatos = [];
            while ($linha = $resultado->fetch_assoc()) {
                $contatos[] = $linha;
            }
            echo json_encode($contatos);
        }
        break;

    case 'POST':
        $stmt = $conn->prepare("INSERT INTO contatos (nome, telefone, email, aniversario, categoria, observacao) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $dados['nome'], $dados['telefone'], $dados['email'], $dados['aniversario'], $dados['categoria'], $dados['observacao']);
        $stmt->execute();
        echo json_encode(["mensagem" => "Contato criado com sucesso"]);
        break;

    case 'PUT':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $stmt = $conn->prepare("UPDATE contatos SET nome=?, telefone=?, email=?, aniversario=?, categoria=?, observacao=? WHERE id=?");
            $stmt->bind_param("ssssssi", $dados['nome'], $dados['telefone'], $dados['email'], $dados['aniversario'], $dados['categoria'], $dados['observacao'], $id);
            $stmt->execute();
            echo json_encode(["mensagem" => "Contato atualizado"]);
        } else {
            echo json_encode(["erro" => "ID não informado"]);
        }
        break;

    case 'DELETE':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $conn->query("DELETE FROM contatos WHERE id = $id");
            echo json_encode(["mensagem" => "Contato deletado"]);
        } else {
            echo json_encode(["erro" => "ID não informado"]);
        }
        break;

    default:
        echo json_encode(["erro" => "Método não suportado"]);
        break;
}
?>
