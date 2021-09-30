<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Data Pembayaran Siswa - SPP Pondok</title>
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
	<script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key='Mid-client-8NTFtmFzD1XUHoqr'></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

</head>

<body>
	

	<?php $this->load->view('siswa/primer/sidebar') ?>

						<!-- Main Content -->
						<div class="main-content">
							<section class="section">
								<div class="card">
									<div class="card-body">
										<h2 class="card-title" style="color: black;">Management Data Pembayaran Siswa Pondok</h2>

									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="bg-white p-4"
										style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px;">
										<div class="table-responsive">
											<table id="example" class="table align-items-center table-flush">

												<thead class="thead-light">
													<tr class="text-center">
														<th scope="col">Bulan</th>
														<th scope="col">Order_Id</th>
														
														<th scope="col">Jumlah</th>
														<th scope="col">Metode</th>
														<th scope="col">Waktu</th>
														<th scope="col">Bank</th>
														<th scope="col">Va_Number</th>
														<th scope="col">Petunjuk</th>
														<th scope="col">Status</th>
													</tr>
												</thead>
												<tbody>

													<?php
													foreach ($transaksi as $t) {
															?>
															<tr class="text-center">
																<td >
																	<?= $t['bulan']; ?>
																</td>

																<td><?= $t['order_id']; ?></td>

																<td  >
																	<?= $t['gross_amount']; ?>
																</td>

																<td>
																	<?= $t['payment_type']; ?>
																</td>

																<td>
																	<?= $t['transaction_time']; ?>
																	
																</td>

																<td>
																	<?= $t['bank']; ?>
																</td>

																<td>
																	<?= $t['va_number']; ?>
																</td>

																<?php if ($t['status_code'] == 200) {
																	?>
																<td>
																</td> <?php } else{ ?>
																	<td>
																	<a href="<?= $t['pdf_url']; ?>">Link</a>
																	
																</td> <?php } ?>

																<td>
																	<?php if ($t['status_code'] == 200) {
																	?>
																	<a href="#" class="btn btn-icon icon-left btn-success"><i class="fas fa-check"></i> Success</a>

																	<?php }
																	else{ ?>
																		<a href="#" class="btn btn-icon icon-left btn-warning"><i class="fas fa-exclamation-triangle"></i> Pending</a>

																	<?php } ?>
																</td>


															


															<?php
														
														}


														?>
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
	</body>


	</html>
