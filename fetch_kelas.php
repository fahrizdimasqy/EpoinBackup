<?php

   include 'koneksi.php';
   $output='';
   $sql = "select * from siswa WHERE idkelas = '".$_POST["idkelas"]."'";
   $result = mysqli_query($connect, $sql);
   $output = '<option value="">Pilih Nama Siswa</option>';
   while ($row = mysqli_fetch_array($result)) {
   $output .= '<option value="'.$row["nis"].'">'.$row["nis"].'</option>';
   }
   echo $output;

?>
