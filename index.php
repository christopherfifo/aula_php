<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>clinica oftalmofologica</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<?php include('./libraries/aula02.php') ?><!-- importei o codigo que muda o nome da navbar -->
		<?php include('./includes/component/navbar.php') ?> <!-- fazemos para aparcer -->
		<?php include('./includes/component/saidebar.php') ?> <!-- fazemos para aparcer -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">

			<?php include('./includes/component/wrapper.php') ?> <!-- fazemos para aparcer -->

			<?php include('./includes/component/maincontent.php') ?> <!-- fazemos para aparcer -->

		</div>
		<!-- /.content-wrapper -->

		<?php include('./includes/component/footer.php') ?> <!-- fazemos para aparcer -->

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="adminlte/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="adminlte/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="adminlte/dist/js/demo.js"></script>
</body>

</html>