<!DOCTYPE html>
<html lang="en">

<head>
  <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key='Mid-client-8NTFtmFzD1XUHoqr'></script>
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

 <?php $this->load->view('siswa/primer/sidebar') ?>

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
                      
                        <form id="payment-form" method="post" action="<?= site_url()?>siswa/finish">
                          <input type="hidden" name="result_type" id="result-type" value="">
                          <input type="hidden" name="result_data" id="result-data" value="">


                          <div class="table-responsive">

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
                                    <?= $u['jumlah'] ?>
                                    <!-- <input type="text" class="form-control" name="jumlah" id="jumlah" value="<?= $u['jumlah'] ?>" disabled> -->
                                  </td>
                                  <?php
                                }
                              }?>
                              <?php
                              $row = $transaksi->row_array($this->uri->segment(4)-1);
                              if ($row['id_spp'] == $this->uri->segment(4) && $row['id_siswa'] == $this->uri->segment(3) && $row['status_code'] == 200) {?>
                                <td>
                                  <input type="submit" id="pay-button" name="" disabled>
                                </td>
                              <?php } else{ ?>
                                <td>
                                  <input type="submit" id="pay-button" name="" >
                                </td>
                              <?php } ?>


                            </tr>
                          </tbody>

                        </table>

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
          url: '<?=site_url()?>siswa/token',
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
