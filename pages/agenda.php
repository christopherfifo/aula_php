<?php
require "../backend/config.php";
session_start();

if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit;
}

$user_email = $_SESSION['user_email'];
$user_id = null;

try {
    $stmtUsuario = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
    $stmtUsuario->bindParam(':email', $user_email);
    $stmtUsuario->execute();
    $user = $stmtUsuario->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $user_id = $user['id'];
    } else {
        echo '<div class="alert alert-danger">Usuário não encontrado.</div>';
        exit;
    }
} catch (PDOException $e) {
    echo '<div class="alert alert-danger">Erro ao buscar usuário ' . $e->getMessage() . '</div>';
    exit;
}

$profissionais = [];
$exames = [];

try {
    $queryProfissionais = $pdo->query("SELECT id, nome, especialidade FROM PROFISSIONAIS");
    $profissionais = $queryProfissionais->fetchAll(PDO::FETCH_ASSOC);

    $queryExames = $pdo->query("SELECT id, nome, valor FROM EXAMES");
    $exames = $queryExames->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo '<div class="alert alert-danger">Erro ao buscar dados ' . $e->getMessage() . '</div>';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_profissional = $_POST['id_profissional'];
    $especialidade_profissional = $_POST['especialidade_profissional'];
    $data_consulta = $_POST['data_consulta'];
    $hora_consulta = $_POST['hora_consulta'];
    $id_exame = $_POST['id_exame'];
    $valor_exame = $_POST['valor_exame'];
    $nome_exame = $_POST['nome_exame'];

    if (!empty($id_profissional) && !empty($user_id) && !empty($especialidade_profissional) && !empty($data_consulta) && !empty($hora_consulta)) {
        try {
            $stmtConsulta = $pdo->prepare("INSERT INTO CONSULTAS (id_usuario, id_profissional, especialidade_profissional, data_consulta, hora_consulta) VALUES (:id_usuario, :id_profissional, :especialidade_profissional, :data_consulta, :hora_consulta)");
            $stmtConsulta->bindParam(':id_usuario', $user_id);
            $stmtConsulta->bindParam(':id_profissional', $id_profissional);
            $stmtConsulta->bindParam(':especialidade_profissional', $especialidade_profissional);
            $stmtConsulta->bindParam(':data_consulta', $data_consulta);
            $stmtConsulta->bindParam(':hora_consulta', $hora_consulta);
            $stmtConsulta->execute();

            $id_consulta = $pdo->lastInsertId();

            if ($id_consulta && !empty($id_exame) && !empty($valor_exame) && !empty($nome_exame)) {
                $stmtDetalhes = $pdo->prepare("INSERT INTO DETALHES_CONSULTAS (id_consulta, id_exame, nome_exame, valor_exame) VALUES (:id_consulta, :id_exame, :nome_exame, :valor_exame)");
                $stmtDetalhes->bindParam(':id_consulta', $id_consulta);
                $stmtDetalhes->bindParam(':id_exame', $id_exame);
                $stmtDetalhes->bindParam(':nome_exame', $nome_exame);
                $stmtDetalhes->bindParam(':valor_exame', $valor_exame);
                $stmtDetalhes->execute();
            }

            echo json_encode(['status' => 'success', 'message' => 'Consulta marcada com sucesso!']);
            header('Location: ../index.php');
            exit;
        } catch (PDOException $e) {
            echo json_encode(['status' => 'error', 'message' => 'Erro no banco de dados: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Todos os campos são obrigatórios.']);
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
                <div class="card">
                    <div class="card-header">
                        <h3>Marcar Consulta</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="id_profissional">Médico</label>
                                <select class="form-control" id="id_profissional" name="id_profissional">
                                    <?php foreach ($profissionais as $profissional): ?>
                                        <option value="<?= $profissional['id'] ?>"><?= $profissional['nome'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="especialidade_profissional">Especialidade</label>
                                <select class="form-control" id="especialidade_profissional" name="especialidade_profissional">
                                    <?php foreach ($profissionais as $profissional): ?>
                                        <option value="<?= $profissional['especialidade'] ?>"><?= $profissional['especialidade'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_exame">Exame</label>
                                <select class="form-control" id="id_exame" name="id_exame" onchange="atualizarValorExame()">
                                    <?php foreach ($exames as $exame): ?>
                                        <option value="<?= $exame['id'] ?>" data-valor="<?= $exame['valor'] ?>" data-nome="<?= $exame['nome'] ?>">
                                            <?= $exame['nome'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Campo oculto para enviar o nome do exame -->
                            <input type="hidden" id="nome_exame" name="nome_exame">

                            <div class="form-group">
                                <label for="valor_exame">Valor do Exame</label>
                                <input type="text" class="form-control" id="valor_exame" name="valor_exame" readonly>
                            </div>

                            <div class="form-group">
                                <label for="hora_consulta">Horário</label>
                                <select class="form-control" id="hora_consulta" name="hora_consulta">
                                    <?php for ($hora = 9; $hora <= 22; $hora++): ?>
                                        <?php for ($minuto = 0; $minuto < 60; $minuto += 40): ?>
                                            <option value="<?= sprintf('%02d:%02d', $hora, $minuto) ?>"><?= sprintf('%02d:%02d', $hora, $minuto) ?></option>
                                        <?php endfor; ?>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="data_consulta">Data</label>
                                <input type="date" class="form-control" id="data_consulta" name="data_consulta">
                            </div>
                            <button type="submit" class="btn btn-primary">Marcar Consulta</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>

        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>

    <script>
    function atualizarValorExame() {
        var select = document.getElementById('id_exame');
        var valorExame = select.options[select.selectedIndex].getAttribute('data-valor');
        var nomeExame = select.options[select.selectedIndex].getAttribute('data-nome');
        document.getElementById('valor_exame').value = valorExame;
        document.getElementById('nome_exame').value = nomeExame;
    }

    document.addEventListener('DOMContentLoaded', function() {
        atualizarValorExame();
    });
    </script>

    <script src="../adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>
