<!DOCTYPE html>
<html lang="en" style="scroll-behavior:smooth !important;">

<head>

	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Data Detail Siswa - SPP Pondok </title>
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

</head>

<body>

	<?php $this->load->view('admin/primer/sidebar') ?>
			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="">
						<div class="card" style="width:100%;">
							<div class="card-body">
								<h2 class="card-title" style="color: black;">Detail Siswa | <?= $detail->nama ?> </h2>
							</div>
						</div>
						<div class="">
							<div class="hero text-white hero-bg-image">
								<div class="col-md-4 mx-auto rounded-circle bg-white p-3"
									style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px;">
									<img src="<?= base_url() . 'assets/profile_picture/' . $detail->image; ?>"
										class="card-img-top rounded-circle img-responsive" alt="Gambar Tidak Ada">
								</div>
							</div>
						</div>
						<br>
						<div class="col-md-12 bg-white p-3" id="detail"
							style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px;">
							<h1 class="font-weight-bold card-title text-center" style="color: black;">Detail Siswa </h1>
							<p class="text-center" style="line-height: 5px;">Berikut data detail yang terdapat di
								database, meliputi Nama, Email,
								Photo, Akun aktif
								dan Date Created.</p>
							<hr>
							<table style="width: 100%" class="container text-center">
								<tbody>
									<tr style="border-bottom: 0.5px solid #6c757d;">
										<td><span class="font-weight-bold">Nama Siswa :</span></td>
										<td> <?= $detail->nama ?></td>
									</tr>
									<tr style="border-bottom: 0.5px solid #6c757d;">
										<td><span class="font-weight-bold">Alamat Email :</span></td>
										<td> <?= $detail->email ?></td>
									</tr>
									<tr style="border-bottom: 0.5px solid #6c757d;">
										<td><span class="font-weight-bold">Password : </span></td>
										<td>Terenkripsi</td>
									</tr>
									<tr style="border-bottom: 0.5px solid #6c757d;">
										<td><span class="font-weight-bold">Akun Aktif? :</span></td>
										<td><?= $detail->is_active ?></td>
									</tr>
									<tr style="border-bottom: 0.5px solid #6c757d;">
										<td><span class="font-weight-bold">Terdaftar pada :</span></td>
										<td><?= $detail->date_created ?></td>
									</tr>
								</tbody>
							</table>
							<p style="font-weight:500px!important;font-size:18px;text-align:justify;"
								class="text-justify">
							</p>
							<a href="<?= base_url('admin/data_siswa') ?>" class="btn btn-primary btn-block">Kembali</a>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<!-- End Main Content -->

	<!-- Start Footer -->
	<footer class="main-footer">
		<div class="text-center">
			Copyright &copy; 2020 <div class="bullet">
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
