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
  <link rel="stylesheet" href="../css/configuracoes.css">
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<?php include('../libraries/aula02.php') ?>
		<?php include('../includes/component/navbar.php') ?>
		<?php include('../includes/component/saidebar.php') ?>
		

		<div class="content-wrapper color">
			<?php include('../includes/component/wrapper.php') ?> 
            <main>
        <section class="config-section">
            <h1>Configurações</h1>

            <div class="config-group">
                <h2>Preferências de Conta</h2>
                <form id="account-preferences-form">
                    <label for="theme">Tema:</label>
                    <select id="theme" name="theme">
                        <option value="light">Claro</option>
                        <option value="dark">Escuro</option>
                    </select>

                    <label for="notifications">Notificações:</label>
                    <input type="checkbox" id="notifications" name="notifications" checked>
                    <label for="notifications">Receber Notificações</label>

                    <button type="submit">Salvar Alterações</button>
                </form>
            </div>

            <div class="config-group">
                <h2>Segurança</h2>
                <form id="security-form">
                    <label for="current-password">Senha Atual:</label>
                    <input type="password" id="current-password" name="current-password">

                    <label for="new-password">Nova Senha:</label>
                    <input type="password" id="new-password" name="new-password">

                    <label for="confirm-password">Confirmar Nova Senha:</label>
                    <input type="password" id="confirm-password" name="confirm-password">

                    <button type="submit">Alterar Senha</button>
                </form>
            </div>

            <div class="config-group">
                <h2>Excluir Conta</h2>
                <form id="delete-account-form">
                    <p>Se você deseja excluir sua conta, esta ação é irreversível e todos os seus dados serão perdidos.</p>
                    
                    <label for="confirm-delete">Digite sua senha para confirmar:</label>
                    <input type="password" id="confirm-delete" name="confirm-delete">

                    <button type="submit" class="delete-button">Excluir Conta</button>
                </form>
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
