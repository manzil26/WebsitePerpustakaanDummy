<?php
// panggil koneksi database 
include "koneksi.php";
if (isset($_POST['bsimpan'])) {

    // persiapan simpan data baru 
    $simpan = mysqli_query($koneksi, "INSERT INTO anggota (Nama, Alamat, Email, Profil, Status_Keanggotaan)
                                                        VALUES ('{$_POST['tnama']}', 
                                                                '{$_POST['talamat']}', 
                                                                '{$_POST['temail']}', 
                                                                '{$_POST['tprofil']}', 
                                                                '{$_POST['tstatus']}')");


    // jika simpan sukses 
    if ($simpan) {
        echo "<script>
              alert('Simpan data Sukses!');
              document.location='index.php';
        
        </script>";
    } else {
        echo "<script>
        alert('Simpan data Gagal!');
        document.location='index.php';
  
  </script>";

    }
}

// uji jika tombol di klik 

if (isset($_POST['bubah'])) {

    // persiapan ubah data
    $ubah = mysqli_query($koneksi, "UPDATE anggota SET
                                                                    ID_Anggota = '$_POST[tidanggota]',
                                                                    Nama = '$_POST[tnama]',
                                                                    Alamat = '$_POST[talamat]',
                                                                    Email = '$_POST[temail]',
                                                                    Profil = '$_POST[tprofil]',
                                                                    Status_Keanggotaan = '$_POST[tstatus]'
                                                                    WHERE ID_Anggota = '$_POST[tidanggota]'
    ");
    // jika simpan sukses 
    if ($ubah) {
        echo "<script>
              alert('Ubah data Sukses!');
              document.location='index.php';
        
        </script>";
    } else {
        echo "<script>
        alert('Ubah data Gagal!');
        document.location='index.php';
  
  </script>";

    }
}



if (isset($_POST['bhapus'])) {

    // persiapan ubah data
    $hapus = mysqli_query($koneksi, "DELETE FROM anggota WHERE ID_Anggota = '$_POST[tidanggota]'");
    // jika simpan sukses 
    if ($hapus) {
        echo "<script>
              alert('Ubah data Sukses!');
              document.location='index.php';
        
        </script>";
    } else {
        echo "<script>
        alert('Ubah data Gagal!');
        document.location='index.php';
  
  </script>";

    }
}

?>