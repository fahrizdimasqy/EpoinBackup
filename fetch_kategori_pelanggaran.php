<?php

   include 'koneksi.php';
   $output='';
   $sql = "select * from bentukpelanggaran where idkategoripelanggaran = '".$_POST["idkategoriPelanggaran"]."' ORDER by bentukpelanggaran";
   $result = mysqli_query($connect, $sql);
   $output = '<option value="">Pilih Bentuk Pelanggaran</option>';
   while ($row = mysqli_fetch_array($result)) {
   $output .= '<option value="'.$row["idbentukpelanggaran"].'">'.$row["bentukpelanggaran"].'</option>';
   }
   echo $output;
   
//    if(isset($_POST['action']))
// {
//  include('koneksi.php');

//  $output = '';

//  if($_POST["action"] == 'kategori')
//  {
//   $query = "
//   SELECT * FROM bentukpelanggaran where idkategoripelanggaran : kategori ORDER by bentukpelanggaran
//   ";
//   $statement = $connect->prepare($query);
//   $statement->execute(
//    array(
//     ':kategori'  => $_POST["query"]
//    )
//   );
//   $result = $statement->fetchAll();
//   $output .= '<option value="">Pilih Bentuk Pelanggaran</option>';
//   foreach($result as $row)
//   {
//    $output .= '<option value="'.$row["idbentukpelanggaran"].'">'.$row["bentukpelanggaran"].'</option>';
//   }
//  }

//  echo $output;
// }
?>
