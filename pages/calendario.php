<?php
require "../backend/config.php";
session_start();

if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit;
}

$user_email = $_SESSION['user_email'];

// Buscar o id do usuário
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

// Buscar todas as consultas (futuras e passadas)
$consultas = [];
try {
    $stmtConsultas = $pdo->prepare("
        SELECT c.id AS consulta_id, c.nome_profissional, c.especialidade_profissional, c.data_consulta, c.hora_consulta, 
               d.nome_exame, d.valor_exame, d.id AS detalhe_id
        FROM CONSULTAS c
        INNER JOIN DETALHES_CONSULTAS d ON c.id = d.id_consulta
        WHERE c.id_usuario = :user_id
        ORDER BY c.data_consulta, c.hora_consulta
    ");
    $stmtConsultas->bindParam(':user_id', $user_id);
    $stmtConsultas->execute();
    $consultas = $stmtConsultas->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo '<div class="alert alert-danger">Erro ao buscar consultas ' . $e->getMessage() . '</div>';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clínica Oftalmológica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/geral.css">
    <style>
        .futura {
            background-color: #d4edda; /* Verde claro */
        }
        .passada {
            background-color: #fff3cd; /* Amarelo */
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include('../libraries/aula02.php') ?>
        <?php include('../includes/components/navbar.php') ?>
        <?php include('../includes/components/saidebar.php') ?>

        <div class="content-wrapper color">
            <main class="container my-5">
                <h1>Consultas</h1>

                <?php if (count($consultas) > 0): ?>
                    <?php foreach ($consultas as $consulta): ?>
                        <?php 
                        // Verifica a data da consulta para definir a classe CSS
                        $dataConsulta = strtotime($consulta['data_consulta']);
                        $dataAtual = strtotime(date('Y-m-d'));
                        $classe = ($dataConsulta >= $dataAtual) ? 'futura' : 'passada';
                        ?>
                        <div class="card mb-3 <?= $classe ?>" id="consulta_<?= $consulta['consulta_id'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($consulta['nome_profissional']) ?></h5>
                                <p><strong>Especialidade:</strong> <?= htmlspecialchars($consulta['especialidade_profissional']) ?></p>
                                <p><strong>Exame:</strong> <?= htmlspecialchars($consulta['nome_exame']) ?></p>
                                <p><strong>Valor do Exame:</strong> R$ <?= number_format($consulta['valor_exame'], 2, ',', '.') ?></p>
                                <p><strong>Data:</strong> <?= date('d/m/Y', strtotime($consulta['data_consulta'])) ?></p>
                                <p><strong>Hora:</strong> <?= date('H:i', strtotime($consulta['hora_consulta'])) ?></p>
                                <button type="button" class="btn btn-primary btn-sm" onclick="abrirModalReagendar(<?= $consulta['consulta_id'] ?>, '<?= $consulta['data_consulta'] ?>', '<?= $consulta['hora_consulta'] ?>')">Reagendar</button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="deletarConsulta(<?= $consulta['consulta_id'] ?>, <?= $consulta['detalhe_id'] ?>)">Cancelar</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Não há consultas agendadas.</p>
                <?php endif; ?>
            </main>
        </div>
    </div>

    <!-- Modal para Reagendar -->
    <div class="modal fade" id="modalReagendar" tabindex="-1" role="dialog" aria-labelledby="modalReagendarLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalReagendarLabel">Reagendar Consulta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formReagendar">
                        <input type="hidden" id="consulta_id" name="consulta_id">
                        <div class="form-group">
                            <label for="nova_data">Data:</label>
                            <input type="date" class="form-control" id="nova_data" name="nova_data" required>
                        </div>
                        <div class="form-group">
                            <label for="nova_hora">Hora:</label>
                            <input type="time" class="form-control" id="nova_hora" name="nova_hora" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="salvarReagendamento()">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../adminlte/dist/js/adminlte.min.js"></script>

    <script>
    function abrirModalReagendar(consultaId, dataAtual, horaAtual) {
        $('#consulta_id').val(consultaId);
        $('#nova_data').val(dataAtual);
        $('#nova_hora').val(horaAtual);
        $('#modalReagendar').modal('show');
    }

    function salvarReagendamento() {
        const novaData = $('#nova_data').val();
        const novoHorario = $('#nova_hora').val();
        const consultaId = $('#consulta_id').val();

        $.ajax({
            url: '../libraries/php/remarcarConsulta.php',
            type: 'POST',
            data: {
                consulta_id: consultaId,
                data_consulta: novaData,
                hora_consulta: novoHorario
            },
            success: function(response) {
                try {
                    const data = JSON.parse(response);
                    if (data.status === 'success') {
                        alert("Consulta reagendada com sucesso!");
                        $('#modalReagendar').modal('hide');
                        location.reload(); // Atualiza a página após o sucesso
                    } else {
                        alert("Erro: " + data.message);
                    }
                } catch (e) {
                    alert('Erro ao processar a resposta do servidor.');
                }
            },
            error: function() {
                alert('Erro ao reagendar consulta.');
            }
        });
    }
    function deletarConsulta(consultaId, detalheId) {
        if (confirm("Tem certeza que deseja cancelar esta consulta?")) {
            $.ajax({
                url: '../libraries/php/deletarConsulta.php',
                type: 'POST',
                data: {
                    consulta_id: consultaId,
                    detalhe_id: detalheId
                },
                success: function(response) {
                    try {
                        const data = JSON.parse(response);
                        if (data.status === 'success') {
                            alert("Consulta cancelada com sucesso!");
                            $('#consulta_' + consultaId).remove(); // Remove a consulta da lista
                        } else {
                            alert("Erro: " + data.message);
                        }
                    } catch (e) {
                        alert('Erro ao processar a resposta do servidor.');
                    }
                },
                error: function() {
                    alert('Erro ao cancelar consulta.');
                }
            });
        }
    }
    </script>

</body>
</html>

   
