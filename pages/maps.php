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
	<link rel="stylesheet" href="../css/nav.css">
  <script src="../libraries/javascript/maps.js" defer></script>
  <link rel="stylesheet" href="../css/geral.css">
  <link rel="stylesheet" href="../css/maps.css">
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<?php include('../libraries/aula02.php') ?>
		<?php include('../includes/component/navbar.php') ?>
		<?php include('../includes/component/saidebar.php') ?>
		

		<div class="content-wrapper color">
			<?php include('../includes/component/wrapper.php') ?> 
            <main>
        <section class="clinic-info">
            <h1>Informações da Clínica</h1>
            <div class="clinic-details">
                <p><strong>Nome:</strong> Clínica Exemplo</p>
                <p><strong>Horários:</strong> Segunda a Sexta, 8h às 18h</p>
                <p><strong>Endereço:</strong> Rua Exemplo, 123 - Bairro, Cidade - Estado</p>
                <p><strong>Telefone:</strong> (00) 1234-5678</p>
                <p><strong>Técnicos:</strong> Dr. João Silva, Dra. Maria Oliveira</p>
            </div>

            <div class="gallery">
                <div class="gallery-images">
                    <img src="photo1.jpg" alt="Foto 1">
                    <img src="photo2.jpg" alt="Foto 2">
                    <img src="photo3.jpg" alt="Foto 3">
                    <img src="photo4.jpg" alt="Foto 4">
                    <img src="photo5.jpg" alt="Foto 5">
                </div>
                <button class="gallery-button prev" onclick="prevSlide()">&#10094;</button>
                <button class="gallery-button next" onclick="nextSlide()">&#10095;</button>
            </div>

            <div id="map"></div>
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
