<!DOCTYPE html>
<html lang="en">

<head>
  <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key='SB-Mid-client-jHxslxRXswoIsdzd'></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Data Siswa - SPP Pondok</title>
  <!-- General CSS Files -->
  <link rel="icon" href="<?= base_url('assets/') ?>img/favicon.png" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:500,600,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
  integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>stisla-assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>stisla-assets/css/components.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.0/dist/sweetalert2.all.min.js"></script>
  

</head>

<body>

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
                    <li><a class="nav-link" href="<?= base_url('siswa/Pembayaran') ?>">Data Siswa</a></li>
                  </ul>
                </li>
              </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
              <section class="section">
                <div class="card">
                  <div class="card-body">
                    <h2 class="card-title" style="color: black;">Bayar SPP</h2>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="bg-white p-4"
                    style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px;">
                    <div class="table-responsive">
                      <form id="payment-form" method="post" action="<?= site_url()?>siswa/finish">
                        <input type="hidden" name="result_type" id="result-type" value=""></div>
                        <input type="hidden" name="result_data" id="result-data" value=""></div>

                        <?php
                            foreach ($nama as $a) {
                              foreach ($spp as $u) {?>
                        <input type="text" class="form-control" name="id_siswa" id="id_siswa" value="<?= $a['id'] ?>" hidden>
                        <input type="text" class="form-control" name="id_spp" id="id_spp" value="<?= $u['id'] ?>" hidden>
                        <input type="text" class="form-control" name="nama1" id="nama1" value="<?= $a['nama'] ?>" hidden>
                        <input type="text" class="form-control" name="bulan1" id="bulan1" value="<?= $u['bulan'] ?>" hidden>
                        <input type="text" class="form-control" name="jumlah" id="jumlah" value="<?= $u['jumlah'] ?>" hidden>

                        <?php
                          }
                        }
                        ?>
                        <table id="example" class="table align-items-center table-flush">
                          <thead class="thead-light">
                            <tr class="text-center">
                              <th scope="col">Nama</th>
                              <th scope="col">Bulan</th>
                              <th scope="col">Tahun</th>
                              <th scope="col">Tanggal Pembayaran</th>
                              <th scope="col">Jumlah Pembayaran</th>
                              <th scope="col">Aksi</th>
                            </tr>
                          </thead>

                          <tbody>
                            <?php
                            foreach ($nama as $a) {
                              foreach ($spp as $u) {?>
                                <tr class="text-center">
                                 <td>
                                  <input type="text" class="form-control" name="nama" id="nama" value="<?= $a['nama'] ?>" hidden>
                                  <?= $a['nama'] ?>
                                </td>
                                <th scope="row">
                                  <input type="text" name="bulan" id="bulan" value="<?= $u['bulan'] ?>" hidden>
                                  <?= $u['bulan'] ?>
                                </th>

                                <td>
                                  <?= $u['tahun'] ?>
                                </td>

                                <td>
                                  -
                                </td>

                                <td>
                                  <?= $u['jumlah'] ?>
                                  <!-- <input type="text" class="form-control" name="jumlah" id="jumlah" value="<?= $u['jumlah'] ?>" disabled> -->
                                </td>

                                <td>
                                  <!-- <button id="pay-button" class="btn btn-primary" ><input type="submit" value="bayar"></button> -->
                                  <input type="submit" id="pay-button" name="">
                                
                              </td>

                            </tr>
                            <?php
                          }
                        }
                        ?>
                      </tbody>
                      
                    </table>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    <!-- End Main Content -->

    <!-- Start Sweetalert -->
    <?php if ($this->session->flashdata('gagal')) : ?>
      <script>
        Swal.fire({
          icon: 'success',
          title: 'Gagal Bayar!',
          text: 'Gagal Mendapatkan Kode!',
          showConfirmButton: false,
          timer: 2500
        })

      </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('success')) : ?>
      <script>
        Swal.fire({
          icon: 'success',
          title: 'Berhasil Bayar!',
          text: 'Silakan bayar dengan kode yg diberikan!',
          showConfirmButton: false,
          timer: 2500
        })

      </script>
    <?php endif; ?>
    <!-- End Sweetalert -->

    <!-- Start Footer -->
    <footer class="main-footer">
      <div class="text-center">
        Copyright &copy; 2020 <div class="bullet"></div>
      </div>
    </footer>
    <!-- End Footer -->

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= base_url('assets/') ?>stisla-assets/js/stisla.js"></script>
<!-- JS Libraies -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function () {
    $('#example').DataTable();
  });

</script>
<!-- Template JS File -->
<script src="<?= base_url('assets/') ?>stisla-assets/js/scripts.js"></script>
<script src="<?= base_url('assets/') ?>stisla-assets/js/custom.js"></script>
<script type="text/javascript">
  $('#pay-button').click(function (event) {
    event.preventDefault();
    $(this).attr("disabled", "disabled");

    var jumlah = $("#jumlah").val();
    var nama = $("#nama").val();
    var bulan = $("#bulan").val();

    $.ajax({
      type: 'POST',
      url: '<?=site_url()?>/siswa/token',
      data: {
        jumlah: jumlah,
        nama: nama,
        bulan : bulan

      },
      cache: false,

      success: function (data) {
          //location = data;

          console.log('token = ' + data);

          var resultType = document.getElementById('result-type');
          var resultData = document.getElementById('result-data');

          function changeResult(type, data) {
            $("#result-type").val(type);
            $("#result-data").val(JSON.stringify(data));
            // resultType.innerHTML = type;
            // resultData.innerHTML = JSON.stringify(data);
          }

          snap.pay(data, {

            onSuccess: function (result) {
              changeResult('success', result);
              console.log(result.status_message);
              console.log(result);
              $("#payment-form").submit();
            },
            onPending: function (result) {
              changeResult('pending', result);
              console.log(result.status_message);
              $("#payment-form").submit();
            },
            onError: function (result) {
              changeResult('error', result);
              console.log(result.status_message);
              $("#payment-form").submit();
            }
          });
        }
      });
  });

</script>
</body>
</html>
