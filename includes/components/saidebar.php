<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (file_exists('../backend/config.php')) {
    require '../backend/config.php';
} elseif (file_exists('./backend/config.php')) {
    require './backend/config.php';
} else {
    die("Erro: Configuração não encontrada.");
}

// Verifica se o usuário está logado
if (!isset($_SESSION['user_email'])) {
    $mensagem = "Você precisa estar logado.";
    exit;
}

$email_usuario = $_SESSION['user_email'];

// Consulta os dados do usuário
$sql = "SELECT nome, imagem FROM usuarios WHERE email = ?";
$foto = $pdo->prepare($sql);
$foto->execute([$email_usuario]);

if ($foto->rowCount() > 0) {
    $usuario = $foto->fetch(PDO::FETCH_ASSOC);
    $nome_usuario = $usuario['nome'];
    
    // Verifica se o usuário tem uma imagem de perfil
    if ($usuario['imagem']) {
        // Converte a imagem em base64 para exibir na tag <img>
        $imagem_src = 'data:image/jpeg;base64,' . base64_encode($usuario['imagem']);
    } else {
        // Usa uma imagem padrão caso não tenha imagem de perfil
        $imagem_src = "../../../aula_php/pictures/outras/perfil.webp";
    }
} else {
    $mensagem = "Usuário não encontrado.";
    exit;
}
?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 barra">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- Exibe a imagem de perfil do usuário ou a imagem padrão -->
                <img id="perfil-img" src="<?php echo $imagem_src; ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <!-- Exibe o nome do usuário ou "Perfil" caso não tenha nome -->
                <a href="../../../aula_php/pages/perfil.php" class="d-block" id="perfil-name">
                    <?php echo htmlspecialchars($nome_usuario); ?>
                </a>
            </div>
        </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2 ">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa-solid fa-address-card nav-icon"></i>
              <p>
                Contato
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa-brands fa-instagram nav-icon"></i>
                  <p>Instagram</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fa-brands fa-whatsapp nav-icon"></i>
                  <p>Whatsapp</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fa-solid fa-envelope nav-icon"></i>
                  <p>Email</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../../aula_php/pages/maps.php" class="nav-link">
                <i class="fa-solid fa-map-location-dot nav-icon"></i>
                  <p>Clinica</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="../../../aula_php/pages/avisos.php" class="nav-link">
            <i class="fa-solid fa-circle-exclamation nav-icon"></i>
              <p>
                Quadro de avisos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../../aula_php/pages/consultas.php" class="nav-link">
            <i class="nav-icon fa-solid fa-calendar-check"></i>
              <p>
                Consultas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../../aula_php/pages/usuarios.php" class="nav-link">
              <i class="nav-icon fa-solid fa-users-gear"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../../aula_php/pages/agenda.php" class="nav-link">
              <i class="nav-icon fa-solid fa-calendar-plus"></i>
              <p>
                Agendar consultas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../../aula_php/pages/historico.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Historico
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../../aula_php/pages/relatorio.php" class="nav-link">
            <i class="fa-solid fa-chart-line nav-icon"></i>
              <p>
                Relatorios de consultas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../../aula_php/pages/calendario.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendario
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="../../../aula_php/pages/login.php" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
              Login/register
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../../aula_php/pages/configuracoes.php" class="nav-link">
            <i class="fa-solid fa-gear nav-icon"></i>
              <p>
                Configurações
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../../aula_php/pages/saida.php" class="nav-link">
            <i class="fa-solid fa-door-open nav-icon"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul> 
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>