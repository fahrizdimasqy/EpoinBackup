<!-- kategori pelanggaran -->
<?
    include 'koneksi.php';
    $output='';
    $sql = "select * from kategoripelanggaran GROUP by kategoripelanggaran";
    $result = mysqli_query($connect, $sql);
   while ($row = mysqli_fetch_array($result)) {
   $output .= '<option value="'.$row["idkategoripelanggaran"].'">'.$row["kategoripelanggaran"].'</option>';
   }
   ?>
   <!-- kelas -->
   <?
    include 'koneksi.php';
    $output2='';
    $sql2 = "select * from kelas GROUP by nama_kelas";
    $result2 = mysqli_query($connect, $sql2);
   while ($row = mysqli_fetch_array($result2)) {
   $output2 .= '<option value="'.$row["idkelas"].'">'.$row["nama_kelas"].'</option>';
   }
   ?>
    <!-- nama siswa -->
   <?
    include 'koneksi.php';
    $output3='';
    $sql3 = "select * from siswa GROUP by namasiswa";
    $result3 = mysqli_query($connect, $sql3);
   while ($row = mysqli_fetch_array($result3)) {
   $output3 .= '<option value="'.$row["nis"].'">'.$row["namasiswa"].'</option>';
   }
   ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="dist/js/jquery-3.2.1.slim.min.js"></script>
    <link rel="stylesheet" href="dist/css/bootstrap.css">
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
   
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="dist//DataTables/datatables.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="dist/js/jquery.lwMultiSelect.js"></script>
  <link rel="stylesheet" href="dist/css/jquery.lwMultiSelect.css" />
  <link rel="stylesheet" href="dist/css/style.css">

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark text-white" style="background-color: #34495e;">
        <a class="navbar-brand" href="#">E-point SMK DB</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end pl-5" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="point_guru.html">Poin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pelanggaran.html">Pelanggaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.html">Profile</a>
                </li>
            </ul>
            <button class="btn btn-danger" data-toggle="modal" data-target="#loginModal" type="button">Logout</button>
        </div>
    </nav>
    <!-- Akhir Navbar -->
    <div class="container mt-5 mb-5">
        <div class="card">
            <h5 class="card-header bg-primary text-white">Tambah Pelanggaran</h5>
            <div class="card-body">
                <form method="post" id="insert_data">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control action">
                            <option value="">Pilih Kategori Pelanggaran
                            </option>
                            <?=$output; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Bentuk Pelanggaran</label>
                        <select name="bentuk_pelanggaran" id="bentuk_pelanggaran" class="form-control action">
                            <option value="">Pilih Bentuk</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Kelas</label>
                        <select name="kelas" id="kelas" class="form-control action">
                            <option value="">Pilih Kelas</option>
                            <?=$output2; ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Nama Siswa</label>
                        <select name="nama" id="nama" class="form-control action">
                            <option value="">Pilih Nama Siswa</option>
                            <?=$output3; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Keterangan</label>
                        <input type="text" class="form-control action" id="keterangan" name="keterangan"
                            placeholder="Keterangan">
                    </div>

                </form>
                <input type="submit" name="insert" id="action" class="btn btn-success col-md-2" value="Tambah">
                <a href="#" class="btn btn-danger col-md-2">Batal</a>
            </div>
        </div>
</body>
<script src="dist/js/datatable.js">
</script>
<script src="dist/js/bootstrap.js"></script>
<script type="text/javascript" src="dist/DataTables/datatables.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>

</html>
<script>
   $(document).ready(function(){
       $('#kategori').change(function () {
           var idkategoripelanggaran = $(this).val();
           $.ajax({
            url:'fetch_kategori_pelanggaran.php',
            method:"POST",
            data:{idkategoriPelanggaran:idkategoripelanggaran},
            dataType:"text",
            success:function(data)
            {             
                $('#bentuk_pelanggaran').html(data);
            }
         });
     });
 });
</script>

<!-- <script>
   $(document).ready(function(){
       $('#kelas').change(function () {
           var idkelas = $(this).val();
           $.ajax({
            url:'fetch_kelas.php',
            method:"POST",
            data:{IDkelas:idkelas},
            dataType:"text",
            success:function(data)
            {             
                $('#nama').html(data);
            }
         });
     });
 });
</script> -->