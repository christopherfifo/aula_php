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
  <script src="../libraries/javascript/usuarios.js" defer></script>
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
            <main>
        <section class="users">
            <h1>Lista de Usuários</h1>

            <div class="user-container" id="user-1">
                <div class="user-info">
                    <div class="user-photo" id="photo-1"></div>
                    <div class="user-details">
                        <h2>João Silva</h2>
                        <button class="btn-delete" onclick="deleteUser('user-1')">Deletar Usuário</button>
                        <button class="btn-edit" onclick="openEdit('user-1')">Alterar Informações</button>
                    </div>
                </div>
            </div>

            <!-- Repetir o bloco acima para os outros usuários -->
            <!-- Aqui estão os 10 usuários de exemplo -->
            <div class="user-container" id="user-2">
                <div class="user-info">
                    <div class="user-photo" id="photo-2"></div>
                    <div class="user-details">
                        <h2>Maria Oliveira</h2>
                        <button class="btn-delete" onclick="deleteUser('user-2')">Deletar Usuário</button>
                        <button class="btn-edit" onclick="openEdit('user-2')">Alterar Informações</button>
                    </div>
                </div>
            </div>

            <!-- Adicionar mais usuários conforme necessário -->
            <!-- Totalizando 10 usuários -->
            
            <div class="user-container" id="user-3">
                <div class="user-info">
                    <div class="user-photo" id="photo-3"></div>
                    <div class="user-details">
                        <h2>Pedro Santos</h2>
                        <button class="btn-delete" onclick="deleteUser('user-3')">Deletar Usuário</button>
                        <button class="btn-edit" onclick="openEdit('user-3')">Alterar Informações</button>
                    </div>
                </div>
            </div>

            <div class="user-container" id="user-4">
                <div class="user-info">
                    <div class="user-photo" id="photo-4"></div>
                    <div class="user-details">
                        <h2>Laura Costa</h2>
                        <button class="btn-delete" onclick="deleteUser('user-4')">Deletar Usuário</button>
                        <button class="btn-edit" onclick="openEdit('user-4')">Alterar Informações</button>
                    </div>
                </div>
            </div>

            <div class="user-container" id="user-5">
                <div class="user-info">
                    <div class="user-photo" id="photo-5"></div>
                    <div class="user-details">
                        <h2>Ricardo Lima</h2>
                        <button class="btn-delete" onclick="deleteUser('user-5')">Deletar Usuário</button>
                        <button class="btn-edit" onclick="openEdit('user-5')">Alterar Informações</button>
                    </div>
                </div>
            </div>

            <div class="user-container" id="user-6">
                <div class="user-info">
                    <div class="user-photo" id="photo-6"></div>
                    <div class="user-details">
                        <h2>Ana Paula</h2>
                        <button class="btn-delete" onclick="deleteUser('user-6')">Deletar Usuário</button>
                        <button class="btn-edit" onclick="openEdit('user-6')">Alterar Informações</button>
                    </div>
                </div>
            </div>

            <div class="user-container" id="user-7">
                <div class="user-info">
                    <div class="user-photo" id="photo-7"></div>
                    <div class="user-details">
                        <h2>Lucas Almeida</h2>
                        <button class="btn-delete" onclick="deleteUser('user-7')">Deletar Usuário</button>
                        <button class="btn-edit" onclick="openEdit('user-7')">Alterar Informações</button>
                    </div>
                </div>
            </div>

            <div class="user-container" id="user-8">
                <div class="user-info">
                    <div class="user-photo" id="photo-8"></div>
                    <div class="user-details">
                        <h2>Juliana Martins</h2>
                        <button class="btn-delete" onclick="deleteUser('user-8')">Deletar Usuário</button>
                        <button class="btn-edit" onclick="openEdit('user-8')">Alterar Informações</button>
                    </div>
                </div>
            </div>

            <div class="user-container" id="user-9">
                <div class="user-info">
                    <div class="user-photo" id="photo-9"></div>
                    <div class="user-details">
                        <h2>Bruno Oliveira</h2>
                        <button class="btn-delete" onclick="deleteUser('user-9')">Deletar Usuário</button>
                        <button class="btn-edit" onclick="openEdit('user-9')">Alterar Informações</button>
                    </div>
                </div>
            </div>

            <div class="user-container" id="user-10">
                <div class="user-info">
                    <div class="user-photo" id="photo-10"></div>
                    <div class="user-details">
                        <h2>Camila Pereira</h2>
                        <button class="btn-delete" onclick="deleteUser('user-10')">Deletar Usuário</button>
                        <button class="btn-edit" onclick="openEdit('user-10')">Alterar Informações</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal para alterar informações -->
        <div id="edit-modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeEdit()">&times;</span>
                <h2>Alterar Informações</h2>
                <form id="edit-form">
                    <label for="edit-name">Nome:</label>
                    <input type="text" id="edit-name" name="edit-name" required>
                    <label for="edit-photo">Foto (URL):</label>
                    <input type="text" id="edit-photo" name="edit-photo">
                    <button type="submit">Salvar</button>
                </form>
            </div>
        </div>
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
