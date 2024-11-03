<?php
include('../libraries/php/usuariosl.php');
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
    <script src="../libraries/javascript/usuariosl.js" defer></script>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include('../libraries/aula02.php') ?>
        <?php include('../includes/components/navbar.php') ?>
        <?php include('../includes/components/saidebar.php') ?>

        <div class="content-wrapper color">
            <?php include('../includes/components/wrapper.php') ?>
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

 
</body>
</html>
