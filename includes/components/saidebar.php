<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 barra">

    <!-- Sidebar -->
    <div class="sidebar ">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php if (defined('CONTEXT') && CONTEXT === 'main'): ?>
                    <img src="<?php echo (empty($_SESSION['user_foto'])) ? './pictures/outras/perfil.webp' : './db/photos/' . $_SESSION['user_foto']; ?>" class="img-circle elevation-2" alt="User Image" style="width: 50px; height: 50px; object-fit: cover;" />
                <?php else: ?>
                    <img src="<?php echo (empty($_SESSION['user_foto'])) ? '../pictures/outras/perfil.webp' : '../db/photos/' . $_SESSION['user_foto']; ?>" class="img-circle elevation-2" alt="User Image" style="width: 50px; height: 50px; object-fit: cover;" />
                <?php endif; ?>
            </div>
            <div class="info">
                <a href="./pages/perfil.php" class="d-block" id="perfil-name"><?php echo (empty($_SESSION['user_nome'])) ? 'Perfil' : htmlspecialchars($_SESSION['user_nome']); ?></a>
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