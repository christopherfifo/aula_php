<?php
include('../backend/config.php');

// Inicializa as variáveis para o usuário a ser editado
$usuarioEdit = null;

// Verifica se um ID de usuário foi enviado via POST para edição
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Verifica se todos os campos estão preenchidos
    $fields = ['email', 'nome', 'numero_celular', 'cpf', 'rg', 'data_nascimento', 'sexo'];
    foreach ($fields as $field) {
        if (empty($_POST[$field])) {
            echo '<div class="alert alert-warning">Por favor, preencha todos os campos.</div>';
            exit();
        }
    }

    if (!empty($id)) {
        try {
            // Atualiza o usuário
            $stmt = $pdo->prepare('UPDATE usuarios SET email = :email, nome = :nome, numero_celular = :numero_celular, cpf = :cpf, rg = :rg, data_nascimento = :data_nascimento, sexo = :sexo WHERE id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
            $stmt->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR);
            $stmt->bindParam(':numero_celular', $_POST['numero_celular'], PDO::PARAM_STR);
            $stmt->bindParam(':cpf', $_POST['cpf'], PDO::PARAM_STR);
            $stmt->bindParam(':rg', $_POST['rg'], PDO::PARAM_STR);
            $stmt->bindParam(':data_nascimento', $_POST['data_nascimento'], PDO::PARAM_STR);
            $stmt->bindParam(':sexo', $_POST['sexo'], PDO::PARAM_STR);
            $stmt->execute();

            // Após a atualização, redireciona para a página de usuários
            header('Location: ../index.php');
            exit();
        } catch (PDOException $e) {
            echo '<div class="alert alert-danger">Erro ao atualizar usuário: ' . htmlspecialchars($e->getMessage()) . '</div>';
        }
    }
}

// Verifica se um ID foi passado na URL para edição
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (!empty($id)) {
        try {
            $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $usuarioEdit = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo '<div class="alert alert-danger">Erro ao buscar usuário: ' . htmlspecialchars($e->getMessage()) . '</div>';
        }
    }
}

// Se não houver usuário a ser editado, redireciona para a página de usuários
if (!$usuarioEdit) {
    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clínica Oftalmológica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../css/barraLateral.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/geral.css">
    <link rel="stylesheet" href="../css/usuarios.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include('../libraries/aula02.php') ?>
        <?php include('../includes/component/navbar.php') ?>
        <?php include('../includes/component/saidebar.php') ?>

        <div class="content-wrapper color">
            <main class="container my-5">
                <h2 class="text-center mb-4">Editar Usuário</h2>

                <?php if ($usuarioEdit): ?>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?= $usuarioEdit['id'] ?>">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($usuarioEdit['email']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($usuarioEdit['nome']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="numero_celular">Número de Celular:</label>
                            <input type="text" class="form-control" id="numero_celular" name="numero_celular" value="<?= htmlspecialchars($usuarioEdit['numero_celular']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" value="<?= htmlspecialchars($usuarioEdit['cpf']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="rg">RG:</label>
                            <input type="text" class="form-control" id="rg" name="rg" value="<?= htmlspecialchars($usuarioEdit['rg']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="data_nascimento">Data de Nascimento:</label>
                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?= htmlspecialchars($usuarioEdit['data_nascimento']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="sexo">Sexo:</label>
                            <select class="form-control" id="sexo" name="sexo" required>
                                <option value="M" <?= $usuarioEdit['sexo'] == 'M' ? 'selected' : '' ?>>Masculino</option>
                                <option value="F" <?= $usuarioEdit['sexo'] == 'F' ? 'selected' : '' ?>>Feminino</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </form>
                <?php else: ?>
                    <div class="alert alert-warning">Nenhum usuário encontrado para editar.</div>
                <?php endif; ?>

            </main>
        </div>

        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>

    <script src="../adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../adminlte/dist/js/adminlte.min.js"></script>
    <script src="../adminlte/dist/js/demo.js"></script>
</body>
</html>
