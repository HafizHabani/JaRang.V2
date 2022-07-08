<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Elegant Contact Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Patua+One">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link href="table/css/universal.css" rel="stylesheet">
</head>
<body>
<div class="container-lg">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="contact-form">
                <h1>Ubah Data Barang</h1>    
                <?php 
                    include 'koneksi.php';

                    $id = $_GET['id'];

                    $sql = mysqli_query($koneksi, "SELECT * FROM barang WHERE id = '$id'");
                    while($data = mysqli_fetch_array($sql)) {
                        $nama = $data['nama'];
                        $jumlah = $data['jumlah'];
                        $kondisi = $data['kondisi'];
                        $berat = $berat['berat'];
                    }
                ?>
                <form action="http://jarang.com/php/function/update-barang.php?id=<?= $id; ?>" method="post">            
                    <div class="form-group">
                        <label for="inputSubject">Nama</label>
                        <input name="nama" type="text" class="form-control" id="inputSubject" value="<?= $nama; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="inputSubject">Jumlah</label>
                        <input name="jumlah" type="text" class="form-control" id="inputSubject" value="<?= $jumlah; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="inputSubject">Kondisi</label>
                        <input name="kondisi" type="text" class="form-control" id="inputSubject" value="<?= $kondisi; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="inputSubject">Berat</label>
                        <input name="kondisi" type="text" class="form-control" id="inputSubject" value="<?= $berat; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>