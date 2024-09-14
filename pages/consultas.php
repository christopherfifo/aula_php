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
            </div>

            <div class="appointment">
                <h2>Dr. Ana Oliveira</h2>
                <p><strong>Procedimento:</strong> Exame de Sangue</p>
                <p><strong>Data:</strong> 22/09/2024</p>
                <p><strong>Hora:</strong> 09:30</p>
                <button type="button">Reagendar</button>
            </div>

            <div class="appointment">
                <h2>Dr. Carlos Lima</h2>
                <p><strong>Procedimento:</strong> Consulta Dermatológica</p>
                <p><strong>Data:</strong> 25/09/2024</p>
                <p><strong>Hora:</strong> 11:00</p>
                <button type="button">Reagendar</button>
            </div>

            <div class="appointment">
                <h2>Dr. Maria Santos</h2>
                <p><strong>Procedimento:</strong> Avaliação Cardíaca</p>
                <p><strong>Data:</strong> 28/09/2024</p>
                <p><strong>Hora:</strong> 15:00</p>
                <button type="button">Reagendar</button>
            </div>

            <div class="appointment">
                <h2>Dr. Pedro Almeida</h2>
                <p><strong>Procedimento:</strong> Consulta Oftalmológica</p>
                <p><strong>Data:</strong> 30/09/2024</p>
                <p><strong>Hora:</strong> 13:30</p>
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
