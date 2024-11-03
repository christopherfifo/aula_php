<?php
require '../backend/config.php';

session_start();

// Verificando se o usuário está logado
if (!isset($_SESSION['user_email'])) {
    echo "Você precisa estar logado.";
    exit; 
}

$email_usuario = $_SESSION['user_email'];

// Buscar o id do usuário
$user_id = null;
try {
    $stmtUsuario = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
    $stmtUsuario->bindParam(':email', $email_usuario);
    $stmtUsuario->execute();
    $user = $stmtUsuario->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $user_id = $user['id'];
    } else {
        echo '<div class="alert alert-danger">Usuário não encontrado.</div>';
        exit;
    }
} catch (PDOException $e) {
    echo '<div class="alert alert-danger">Erro ao buscar usuário: ' . $e->getMessage() . '</div>';
    exit;
}

// Buscar consultas passadas
$consultas_passadas = [];
try {
    $stmtConsultas = $pdo->prepare("
        SELECT c.nome_profissional, c.especialidade_profissional, c.data_consulta, c.hora_consulta, 
               d.nome_exame, d.valor_exame
        FROM CONSULTAS c
        INNER JOIN DETALHES_CONSULTAS d ON c.id = d.id_consulta
        WHERE c.id_usuario = :user_id AND c.data_consulta < CURDATE()
        ORDER BY c.data_consulta DESC, c.hora_consulta DESC
    ");
    $stmtConsultas->bindParam(':user_id', $user_id);
    $stmtConsultas->execute();
    $consultas_passadas = $stmtConsultas->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo '<div class="alert alert-danger">Erro ao buscar consultas passadas: ' . $e->getMessage() . '</div>';
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clínica Oftalmológica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../css/barraLateral.css">
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="stylesheet" href="../css/nav.css">
    <script src="../libraries/javascript/perfil.js" defer></script>
    <link rel="stylesheet" href="../css/geral.css">
    <link rel="stylesheet" href="../css/consultas.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include('../libraries/aula02.php') ?>
        <?php include('../includes/component/navbar.php') ?>
        <?php include('../includes/component/saidebar.php') ?>

        <div class="content-wrapper color">
            <?php include('../includes/component/wrapper.php') ?>
            <main>
                <section class="history">
                    <h1>Histórico de Consultas</h1>
                    <p class="info-text">As seguintes consultas foram realizadas anteriormente:</p>

                    <?php if (count($consultas_passadas) > 0): ?>
                        <?php foreach ($consultas_passadas as $consulta): ?>
                            <div class="appointment past-appointment">
                                <h2><?= htmlspecialchars($consulta['nome_profissional']) ?></h2>
                                <p><strong>Especialidade:</strong> <?= htmlspecialchars($consulta['especialidade_profissional']) ?></p>
                                <p><strong>Exame:</strong> <?= htmlspecialchars($consulta['nome_exame']) ?></p>
                                <p><strong>Valor do Exame:</strong> R$ <?= number_format($consulta['valor_exame'], 2, ',', '.') ?></p>
                                <p><strong>Data:</strong> <?= date('d/m/Y', strtotime($consulta['data_consulta'])) ?></p>
                                <p><strong>Hora:</strong> <?= date('H:i', strtotime($consulta['hora_consulta'])) ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Você ainda não realizou consultas.</p>
                    <?php endif; ?>
                </section>
            </main>
        </div>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <script src="../adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../adminlte/dist/js/adminlte.min.js"></script>
    <script src="../adminlte/dist/js/demo.js"></script>
</body>

</html>
