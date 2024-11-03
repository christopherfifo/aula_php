<?php
include('../libraries/php/calendariol.php');
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
    <script src="../libraries/javascript/calendariol.js" defer></script>
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

</body>
</html>

   
