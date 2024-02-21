<?php
	include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Jarang - Jasa Pengiriman Barang</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="admin/css/admin.css" rel="stylesheet">
</head>

<body>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php">JaRang</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#cta">Barang</a></li>
          <li><a class="nav-link scrollto" href="#about">Cheklist</a></li>
          <li><a class="nav-link scrollto" href="#counts">Delivery</a></li>
          <li><a class="nav-link scrollto o" href="#about-video">Pembayaran</a></li>
          <li><a class="nav-link scrollto" href="#clients">Penerima</a></li>
          <li><a class="nav-link scrollto" href="#testimonials">Pengemasan</a></li>
          <li><a class="nav-link scrollto" href="#services">Pengirim</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
  <div class="container-xl">
  <div class="section-title">
          <h2>JaRang [Jasa Barang]</h2>
          <p>Jasa Antar Barang Tercepat Dan Terpercaya SeAlam Semesta</p>
        </div>
</div>
</section><!-- End Hero -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
    <div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2><b>Pengirim</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="forms-pengiriman.php" class="btn btn-success" data-toggle="modal"> <span>Tambah</span></a>					
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>No HP</th>
					</tr>
				</thead>
				<tbody>
				<?php
						$sql = mysqli_query($koneksi, "SELECT * FROM pengirim"); 
						while ($result = mysqli_fetch_array($sql)) {
							
					?>
					<tr>
						<td><?= $result['id']; ?></td>
						<td><?= $result['nama_k']; ?></td>
						<td><?= $result['alamat_k']; ?></td>
						<td><?= $result['hp_k']; ?></td>
						<td>
							<a href="forms-Pengirim.php?id=<?= $result['id']; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">EDIT</i></a>
							<a href="http://jarang.com/php/function/hapus-pengirim.php?id=<?= $result['id']; ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">DELETE</i></a>
						</td>
					</tr>
					<?php } ?>	
				</tbody>
			</table>
		</div>
	</div>        
</div>
    </section><!-- End Sevices Section -->

	 <!-- ======= Clients Section ======= -->
	 <section id="clients" class="clients section-bg">
    <div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2><b>Penerima</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="forms-pengiriman.php" class="btn btn-success" data-toggle="modal"> <span>Tambah</span></a>					
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>No HP</th>
					</tr>
				</thead>
				<tbody>
				<?php
						$sql = mysqli_query($koneksi, "SELECT * FROM penerima"); 
						while ($result = mysqli_fetch_array($sql)) {
							
					?>
					<tr>
						<td><?= $result['id']; ?></td>
						<td><?= $result['nama']; ?></td>
						<td><?= $result['alamat']; ?></td>
						<td><?= $result['hp']; ?></td>
						<td>
							<a href="forms-penerima.php?id=<?= $result['id']; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">EDIT</i></a>
							<a href="http://jarang.com/php/function/hapus-penerima.php?id=<?= $result['id']; ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">DELETE</i></a>
						</td>
					</tr>
					<?php } ?>		
				</tbody>
			</table>
		</div>
	</div>        
</div>
    </section><!-- End Clients Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
    <div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2><b>Barang</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="forms-pengiriman.php" class="btn btn-success" data-toggle="modal"> <span>Tambah</span></a>					
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nama</th>
						<th>Jumlah</th>
						<th>Kondisi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql = mysqli_query($koneksi, "SELECT * FROM barang"); 
						while ($result = mysqli_fetch_array($sql)) {
							
					?>
					<tr>
						<td><?= $result['id']; ?></td>
						<td><?= $result['nama']; ?></td>
						<td><?= $result['jumlah']; ?></td>
						<td><?= $result['kondisi']; ?></td>
						<td>
							<a href="forms-barang.php?id=<?= $result['id']; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">EDIT</i></a>
							<a href="http://jarang.com/php/function/hapus.php?id=<?= $result['id']; ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">DELETE</i></a>
						</td>
					</tr>
					<?php } ?> 
				</tbody>
			</table>
		</div>
	</div>        
</div>
    </section><!-- End Cta Section -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
    <div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2><b>Cheklist</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="forms-pengiriman.php" class="btn btn-success" data-toggle="modal"> <span>Tambah</span></a>					
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Id Barang</th>
						<th>Id Pengirim</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
				<?php
						$sql = mysqli_query($koneksi, "SELECT * FROM ceklist"); 
						while ($result = mysqli_fetch_array($sql)) {
							
					?>
					<tr>
						<td><?= $result['id']; ?></td>
						<td><?= $result['id_barang']; ?></td>
						<td><?= $result['id_pengirim']; ?></td>
						<td><?= $result['statuscek']; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>        
</div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
    <div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2><b>Delivery</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="forms-pengiriman.php" class="btn btn-success" data-toggle="modal"> <span>Tambah</span></a>					
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Alamat</th>
						<th>Tanggal</th>
						<th>Id Pengemasan</th>
						<th>Id Penerima</th>
					</tr>
				</thead>
				<tbody>
				<?php
						$sql = mysqli_query($koneksi, "SELECT * FROM delivery"); 
						while ($result = mysqli_fetch_array($sql)) {
							
					?>
					<tr>
						<td><?= $result['id']; ?></td>
						<td><?= $result['alamat']; ?></td>
						<td><?= $result['tanggal']; ?></td>
						<td><?= $result['id_pengemasan']; ?></td>
						<td><?= $result['id_penerima']; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>        
</div>
    </section><!-- End Counts Section -->

    <!-- ======= About Video Section ======= -->
    <section id="about-video" class="about-video">
    <div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2><b>Pembayaran</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="forms-pengiriman.php" class="btn btn-success" data-toggle="modal"> <span>Tambah</span></a>					
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Kwitansi</th>
						<th>Harga</th>
						<th>Id Ceklist</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
				<?php
						$sql = mysqli_query($koneksi, "SELECT * FROM pembayaran"); 
						while ($result = mysqli_fetch_array($sql)) {
							
					?>
					<tr>
						<td><?= $result['id']; ?></td>
						<td><?= $result['kwitansi']; ?></td>
						<td><?= $result['harga']; ?></td>
						<td><?= $result['id_ceklist']; ?></td>
						<td><?= $result['statuspem']; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>        
</div>
    </section><!-- End About Video Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
    <div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2><b>Pengemasan</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="forms-pengiriman.php" class="btn btn-success" data-toggle="modal"> <span>Tambah</span></a>					
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Id Pembayaran</th>
						<th>Jumlah</th>
						<th>Berat</th>
					</tr>
				</thead>
				<tbody>
				<?php
						$sql = mysqli_query($koneksi, "SELECT * FROM pengemasan"); 
						while ($result = mysqli_fetch_array($sql)) {
							
					?>
					<tr>
						<td><?= $result['id']; ?></td>
						<td><?= $result['id_pembayaran']; ?></td>
						<td><?= $result['jumlah']; ?></td>
						<td><?= $result['berat']; ?></td>
					</tr>
					<?php } ?>		
				</tbody>
			</table>
		</div>
	</div>        
</div>
    </section><!-- End Testimonials Section -->

	    <!-- ======= Services Section ======= -->
		<section id="services" class="services section-bg">
    <div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2><b>Sedang Dikirim</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="forms-pengiriman.php" class="btn btn-success" data-toggle="modal"> <span>Tambah</span></a>					
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Pengirim</th>
						<th>Penerima</th>
					</tr>
				</thead>
				<tbody>
				<?php
						$sql = mysqli_query($koneksi, "SELECT pengirim.nama_k as pengirim, penerima.nama as penerima FROM delivery 
						Inner join pengemasan on(delivery.id_pengemasan = pengemasan.id)
						Inner join pembayaran on(pengemasan.id_pembayaran = pembayaran.id )
						Inner join ceklist on(pembayaran.id_ceklist = ceklist.id)
						inner join pengirim on(ceklist.id_pengirim = pengirim.id)
						inner join penerima on(delivery.id_penerima = penerima.id)
						");
						while ($result1 = mysqli_fetch_array($sql)) {
							
					?>
					<tr>
						<td><?= $result1['pengirim']; ?></td>
						<td><?= $result1['penerima']; ?></td>
					</tr>
					<?php } ?>	
				</tbody>
			</table>
		</div>
	</div>        
</div>
    </section><!-- End Sevices Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6 footer-contact">
        <h3>JaRang</h3>
        <p>
          Jalan Raya Tlogomas No. 246, <br>
          Kec. Lowokwaru, Kota Malang,<br>
          65144 <br><br>
          <strong>Phone:</strong> +628226405505<br>
          <strong>Email:</strong> hafizhbni@webmail.umm.ac.id<br>
        </p>
      </div>

      <div class="col-lg-2 col-md-6 footer-links">
        <h4>Info</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
		  <li><i class="bx bx-chevron-right"></i> <a href="profil.php">Profil</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
</footer><!-- End Footer -->

  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>