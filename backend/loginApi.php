<?php

// login.php

require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($senha, $user['senha'])) {
        $token = bin2hex(random_bytes(16));
        echo json_encode(['success' => 'Login bem-sucedido!', 'token' => $token]);
    } else {
        echo json_encode(['error' => 'Credenciais inválidas']);
    }
}
?>
