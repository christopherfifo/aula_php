<?php 
require '../backend/config.php';

session_start();

// Verificando se o usuário está logado
if (!isset($_SESSION['user_email'])) {
    echo "Você precisa estar logado.";
    exit; 
}

$email_usuario = $_SESSION['user_email'];

$sql = "SELECT nome, numero_celular, rg, cpf, data_nascimento, sexo FROM usuarios WHERE email = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email_usuario]);

if ($stmt->rowCount() > 0) {
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    echo "Usuário não encontrado.";
    exit;
}

$sexo_usuario = isset($usuario['sexo']) ? $usuario['sexo'] : 'm';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $numero_celular = $_POST['numero_celular'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $sexo = $_POST['sexo'];

    $sql = "UPDATE usuarios SET nome = ?, numero_celular = ?, rg = ?, cpf = ?, data_nascimento = ?, sexo = ? WHERE email = ?";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$nome, $numero_celular, $rg, $cpf, $data_nascimento, $sexo, $email_usuario])) {
        echo "Dados atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar os dados.";
    }
}
?>