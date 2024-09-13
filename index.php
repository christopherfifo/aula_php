<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>clinica oftalmofologica</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="./css/barraLateral.css">
	<link rel="stylesheet" href="./css/principal.css">
	<script src="./libraries/javascript/principal.js" defer></script>
</head>

<body class="r">
<?php include('./includes/component/saidebar.php') ?>
	<div class="content">
		<?php include('./libraries/aula02.php') ?>
		<?php include('./includes/component/navbar.php') ?>

        <main class="principal">
		<?php include('./includes/component/wrapper.php') ?> 
		<?php include('./includes/component/maincontent.php') ?> 
		</main>
    </div>

	<script src="adminlte/plugins/jquery/jquery.min.js"></script>
	<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="adminlte/dist/js/adminlte.min.js"></script>
	<script src="adminlte/dist/js/demo.js"></script>
</body>

</html>
