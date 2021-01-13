 <!-- Start Sidebar -->
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class=" navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
              class="fas fa-bars"></i></a>
            </li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" style="margin-bottom:4px !important;"
            src="./assets/stisla-assets/img/avatar/avatar-2.png"
            class="rounded-circle mr-1 my-auto border-white">
            <div class="d-sm-none d-lg-inline-block" style="font-size:15px;">
              Hello, <?php
              $data['siswa'] = $this->db->get_where('siswa', ['email' =>
                $this->session->userdata('email')])->row_array();
              echo $data['siswa']['nama'];
              ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Siswa - SPPP</div>
              <a href="<?= base_url('welcome/logout') ?>" class="dropdown-item has-icon text-primary">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand text-primary">
            <div>
              <a href="<?= base_url('siswa') ?>"
                style="font-size: 20px;font-weight:900;font-family: 'Poppins', sans-serif;"
                class="text-primary text-center"><i style="font-size: 20px;"
                class="fas fa-graduation-cap"></i> |
              SPP Pondok</a>
            </div>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url('siswa') ?>">SPPP</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header ">Dashboard</li>
            <li class="nav-item dropdown active">
              <a href="<?= base_url('siswa') ?>" class="nav-link"><i
                class="fas fa-desktop"></i><span>Dashboard</span></a>
              </li>
              <li class="menu-header">Management Siswa</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i>
                  <span>Siswa</span></a>
                  <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= base_url('siswa/Pembayaran') ?>">Pembayaran</a></li>
                  </ul>
                </li>
              </aside>
            </div>