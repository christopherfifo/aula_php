<?php

include('../backend/config.php');


$usuarios = [];

try {

    $query = $pdo->query("SELECT id, nome FROM usuarios");
    

    while ($usuario = $query->fetch(PDO::FETCH_ASSOC)) {
        $usuarios[] = $usuario;
    }
} catch (PDOException $e) {
    echo '<div class="alert alert-danger">Erro ao buscar usuários: ' . $e->getMessage() . '</div>';
}

// Verifica se foi feita uma requisição para deletar um usuário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    if (!empty($id)) {
        try {
            $stmt = $pdo->prepare('DELETE FROM usuarios WHERE id = :id'); // Corrigido o nome da tabela
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo json_encode(['status' => 'success', 'message' => 'Usuário deletado com sucesso']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Usuário não encontrado ou já deletado']);
            }
        } catch (PDOException $e) {
            echo json_encode(['status' => 'error', 'message' => 'Erro no banco de dados: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'ID de usuário inválido']);
    }
    exit; 
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
            <?php include('../includes/component/wrapper.php') ?>
            <main class="container my-5">
                <h2 class="text-center mb-4">Lista de Usuários</h2>

                <div class="row">
                    <?php foreach ($usuarios as $usuario): ?>
                        <div class="col-md-4" id="usuario-<?= $usuario['id'] ?>">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($usuario['nome']) ?></h5>
                                    <button class="btn btn-danger" onclick="deletarUsuario(<?= $usuario['id'] ?>)">Deletar</button>
                                    <a href="./editar.php?id=<?= $usuario['id'] ?>" class="btn btn-primary ml-2">Editar</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </main>
        </div>

        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>

    <script src="../adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../adminlte/dist/js/adminlte.min.js"></script>
    <script src="../adminlte/dist/js/demo.js"></script>

    <script>
        function deletarUsuario(userId) {
            if (confirm('Tem certeza que deseja deletar este usuário?')) {
                $.ajax({
                    url: '', // A mesma página, já que estamos tratando a requisição no mesmo arquivo
                    type: 'POST',
                    data: { id: userId },
                    success: function(response) {
                        const result = JSON.parse(response);
                        if (result.status === 'success') {
                            $('#usuario-' + userId).remove(); // Remove o usuário da interface
                            alert(result.message);
                        } else {
                            alert(result.message);
                        }
                    },
                    error: function() {
                        alert('Erro ao tentar deletar o usuário. Tente novamente mais tarde.');
                    }
                });
            }
        }
    </script>
</body>
</html>
