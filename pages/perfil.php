<?php 
include('../libraries/php/perfill.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Clinica Oftalmológica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css" />
    <link rel="stylesheet" href="../css/barraLateral.css" />
    <link rel="stylesheet" href="../css/perfil.css" />
    <link rel="stylesheet" href="../css/nav.css" />
    <link rel="stylesheet" href="../css/geral.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src="../libraries/javascript/perfill.js" defer></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include('../libraries/aula02.php') ?>
        <?php include('../includes/components/navbar.php') ?>
        <?php include('../includes/components/saidebar.php') ?>

        <div class="content-wrapper color">
            <?php include('../includes/components/wrapper.php') ?>
            <section class="appointments">
                <div class="container mt-4">
                    <h2>Meu Perfil</h2>
                    <div class="profile-info">
                        <form action="" method="POST" class="needs-validation" novalidate>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nome">Nome:</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required readonly />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="numero_celular">Número de Celular:</label>
                                    <input type="tel" class="form-control" id="numero_celular" name="numero_celular" placeholder="Digite seu número de celular" value="<?php echo htmlspecialchars($usuario['numero_celular']); ?>" required readonly />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="rg">RG:</label>
                                    <input type="text" class="form-control" id="rg" name="rg" placeholder="Digite seu RG" value="<?php echo htmlspecialchars($usuario['rg']); ?>" required readonly />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cpf">CPF:</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF" value="<?php echo htmlspecialchars($usuario['cpf']); ?>" required readonly />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="data_nascimento">Data de Nascimento:</label>
                                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?php echo htmlspecialchars($usuario['data_nascimento']); ?>" required readonly />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sexo">Sexo:</label>
                                    <select id="sexo" name="sexo" class="form-control" required disabled>
                                        <option value="m" <?php echo ($sexo_usuario == 'm') ? 'selected' : ''; ?>>Masculino</option>
                                        <option value="f" <?php echo ($sexo_usuario == 'f') ? 'selected' : ''; ?>>Feminino</option>
                                    </select>
                                </div>
                            </div>

                            <button type="button" id="edit-btn" class="btn btn-primary" onclick="enableEditing()">Editar</button>
                            <button id="save-btn" type="submit" class="btn btn-success" style="display: none;">Salvar</button>
                        </form>
                    </div>
                </div>
            </section>
            <aside class="control-sidebar control-sidebar-dark"></aside>
        </div>

        <script src="../adminlte/plugins/jquery/jquery.min.js"></script>
        <script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../adminlte/dist/js/adminlte.min.js"></script>
        <script src="../adminlte/dist/js/demo.js"></script>

    </div>
</body>
</html>
