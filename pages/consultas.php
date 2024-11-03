<?php
require "../backend/config.php";
session_start();

if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit;
}

$user_email = $_SESSION['user_email'];


try {
    $stmtUsuario = $pdo->prepare("SELECT * FROM CONSULTAS");
    $stmtUsuario->execute();


} catch (PDOException $e) {
    echo '<div class="alert alert-danger">Erro ao buscar usuário ' . $e->getMessage() . '</div>';
    exit;
}


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>clinica oftalmofologica</title>
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
        <section class="appointments">
            <h1>Consultas</h1>

            <div class="appointment">
                <h2>Dr. João Silva</h2>
                <p><strong>Procedimento:</strong> Consulta Geral</p>
                <p><strong>Data:</strong> 20/09/2024</p>
                <p><strong>Hora:</strong> 14:00</p>
                <button type="button">Reagendar</button>
                <button type="button">Reagendar</button>
            </div>
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
