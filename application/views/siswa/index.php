<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Siswa Dashboard - SPP Pondok</title>
    <!-- General CSS Files -->
    <link rel="icon" href="<?= base_url('assets/') ?>img/favicon.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" 
        Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>stisla-assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>stisla-assets/css/components.css">
</head>

<body>

   <?php $this->load->view('siswa/primer/sidebar') ?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1 style="font-size: 27px; letter-spacing:-0.5px; color:black;">Dashboard</h1>
                    </div>
                    <div class="row">
                        <div class="card">
              <div class="card-header">
                <h3>Pondok Pesantren</h3>
              </div>
              <div class="card-body">
                <p>Pesantren adalah sebuah pendidikan tradisional yang para siswanya tinggal bersama dan belajar di bawah bimbingan guru yang lebih dikenal dengan sebutan kiai dan mempunyai asrama untuk tempat menginap santri. Santri tersebut berada dalam kompleks yang juga menyediakan masjid untuk beribadah, ruang untuk belajar, dan kegiatan keagamaan lainnya. Kompleks ini biasanya dikelilingi oleh tembok untuk dapat mengawasi keluar masuknya para santri sesuai dengan peraturan yang berlaku. Pondok Pesantren merupakan dua istilah yang menunjukkan satu pengertian. Pesantren menurut pengertian dasarnya adalah tempat belajar para santri, sedangkan pondok berarti rumah atau tempat tinggal sederhana terbuat dari bambu. Di samping itu, kata pondok mungkin berasal dari Bahasa Arab Funduq yang berarti asrama atau hotel. Di Jawa termasuk Sunda dan Madura umumnya digunakan istilah pondok dan pesantren, sedang di Aceh dikenal dengan Istilah dayah atau rangkang atau menuasa, sedangkan di Minangkabau disebut surau. Pesantren juga dapat dipahami sebagai lembaga pendidikan dan pengajaran agama, umumnya dengan cara nonklasikal, di mana seorang kiai mengajarkan ilmu agama Islam kepada santri-santri berdasarkan kitab-kitab yang ditulis dalam bahasa Arab oleh Ulama Abad pertengahan, dan para santrinya biasanya tinggal di pondok (asrama) dalam pesantren tersebut.</p>
              </div>
            </div>
                    </div>
                </section>
            </div>

            <!-- Start Footer -->
            <footer class="main-footer">
                <div class="text-center">
                    Copyright &copy; 2020 <div class="bullet">
                    </div>
            </footer>
            <!-- End Footer -->

        </div>
    </div>
    <!-- End Main Content -->

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
    <!-- Template JS File -->
    <script src="<?= base_url('assets/') ?>stisla-assets/js/scripts.js"></script>
    <script src="<?= base_url('assets/') ?>stisla-assets/js/custom.js"></script>
</body>

</html>
