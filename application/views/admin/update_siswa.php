<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth">

<head>

	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Update Data Siswa - SPP Pondok</title>
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
								<a href="#detail" class="btn btn-primary">Saya paham dan
									ingin melanjutkan ⭢</a>
							</div>
						</div>
					</div>
					<form action="<?= base_url('admin/user_edit') ?>" enctype="multipart/form-data" method="post">
						<?php foreach ($user as $u) { ?>
						<div class="">
							<div class="hero text-white hero-bg-image"
								data-background="<?= base_url('assets/') ?>stisla-assets/img/unsplash/eberhard-grossgasteiger-1207565-unsplash.jpg">
								<div class="col-md-4 mx-auto rounded-circle bg-white p-3"
									style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px;">
									<img src="<?= base_url() . 'assets/profile_picture/' . $u->image; ?>"
										class="card-img-top  rounded-circle img-responsive" alt="...">
								</div>
								<div class="input-group mt-3 mx-auto" style="width: 50%;">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
									</div>
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="image" name="image"
											aria-describedby="inputGroupFileAddon01">
										<label class="custom-file-label" for="inputGroupFile01">Upload Photo</label>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div id="detail" class="col-md-12 bg-white p-3"
							style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px;">
							<h1 class="font-weight-bold card-title text-center" style="color: black;">Update Data
								Siswa
							</h1>
							<p class="text-center" style="line-height: 5px;">Silahkan isi data dibawah untuk update
								data, dan upload file diatas untuk update data profile picture</p>
							<hr>
							<div class="form-group">
								<input type="hidden" name="id" value="<?= $u->id ?>">
								<input type="hidden" name="password" value="<?= $u->password ?>">
								<input type="hidden" name="is_active" value="<?= $u->is_active ?>">
								<input type="hidden" name="date_created" value="<?= $u->date_created ?>">
								<label for="exampleInputEmail1" class="font-weight-bold"
									style="font-size: 20px;">Nama</label>
								<input type=" text" class="form-control" id="exampleInputEmail1"
									aria-describedby="emailHelp" required name="nama" value="<?= $u->nama ?>">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1" class="font-weight-bold"
									style="font-size: 20px;">Email</label>
								<input type="email" class="form-control" readonly name="email" value="<?= $u->email ?>"
									id="exampleInputPassword1">
							</div>
							<input type="submit" value="Update ⭢" class="btn btn-primary btn-block">
						</div>
						<?php } ?>
					</form>
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
	<script>
		$('.custom-file-input').on('change', function () {
			let fileName = $(this).val().split('\\').pop();
			$(this).next('.custom-file-label').addClass("selected").html(fileName);
		});

	</script>
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
	<!-- Page Specific JS File -->
</body>

</html>
