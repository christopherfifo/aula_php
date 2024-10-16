<?php

// register.php

require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $numero_celular = $_POST['telefone'];
    $senha = $_POST['password'];
    $senha_confirm = $_POST['password_confirm'];

    if ($senha !== $senha_confirm) {
        echo json_encode(['error' => 'As senhas não coincidem.']);
        exit;
    }

    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO usuarios (email, nome, numero_celular, senha) VALUES (:email, :nome, :numero_celular, :senha)");
        $stmt->execute([
            'email' => $email,
            'nome' => $nome,
            'numero_celular' => $numero_celular,
            'senha' => $senha_hash
        ]);
        
        echo json_encode(['success' => 'Usuário registrado com sucesso!']);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Erro ao registrar usuário: ' . $e->getMessage()]);
    }
}
?>
