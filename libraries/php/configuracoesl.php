<?php
require "../backend/config.php";
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: ../entrar.php"); // Redireciona para a página de login se não autenticado
    exit;
}

$user_email = $_SESSION['user_email'];

// Processa a solicitação de alteração de senha ou exclusão de conta
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'alterar_senha') {
            $currentPassword = $_POST['current-password'];
            $newPassword = $_POST['new-password'];
            $confirmPassword = $_POST['confirm-password'];

            if ($newPassword !== $confirmPassword) {
                echo "<script>alert('As senhas não coincidem.');</script>";
            } else {
                try {
                    $stmt = $pdo->prepare("SELECT senha FROM usuarios WHERE email = :email");
                    $stmt->bindParam(':email', $user_email);
                    $stmt->execute();
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);

                    if (password_verify($currentPassword, $user['senha'])) {
                        $newPasswordHash = password_hash($newPassword, PASSWORD_BCRYPT);

                        $stmtUpdate = $pdo->prepare("UPDATE usuarios SET senha = :senha WHERE email = :email");
                        $stmtUpdate->bindParam(':senha', $newPasswordHash);
                        $stmtUpdate->bindParam(':email', $user_email);
                        $stmtUpdate->execute();

                        echo "<script>alert('Senha alterada com sucesso!');</script>";
                    } else {
                        echo "<script>alert('Senha atual incorreta.');</script>";
                    }
                } catch (PDOException $e) {
                    echo "<script>alert('Erro ao alterar senha: " . $e->getMessage() . "');</script>";
                }
            }
        } elseif ($_POST['action'] === 'excluir_conta') {
            $password = $_POST['confirm-delete'];

            try {
                $stmt = $pdo->prepare("SELECT senha FROM usuarios WHERE email = :email");
                $stmt->bindParam(':email', $user_email);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if (password_verify($password, $user['senha'])) {
                    $stmtDelete = $pdo->prepare("DELETE FROM usuarios WHERE email = :email");
                    $stmtDelete->bindParam(':email', $user_email);
                    $stmtDelete->execute();

                    session_destroy(); // Destrói a sessão
                    echo "<script>alert('Conta excluída com sucesso!'); window.location.href = '../entrar.php';</script>";
                } else {
                    echo "<script>alert('Senha incorreta.');</script>";
                }
            } catch (PDOException $e) {
                echo "<script>alert('Erro ao excluir conta: " . $e->getMessage() . "');</script>";
            }
        }
    }
}
?>