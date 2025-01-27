<?php
//panggil koneksi database 
include "koneksi.php";

?>

<!doctype html>
<html lang="en"> <!-- bahasa yg digunakan inggris -->

<head>
    <meta charset="utf-8"> <!-- menentukan karakter encoding -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- membuat halaaman responsive -->
    <title>Perpustakaan + Modal Bootstrap 5 </title> <!-- judul halaman -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css"> <!-- Link ke file CSS eksternal -->
    <!-- Menyisipkan file CSS Bootstrap. -->
</head>

<body>

    <div class="container"> <!-- Container utama Bootstrap. -->
        <div class="mt-3">


            <h3 class="text-center"> Data Perpustakaan Dummy </h3> <!-- Heading utama. -->

        </div>
        <div class="card mt-3"> <!-- Margin top untuk jarak bagian atas. -->
            <div class="card-header"> <!-- Header card dengan background biru. -->
                Data Anggota

            </div>
            <div class="card-body">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    Tambah Data Anggota
                </button>

                <!-- Awal tabel dengan responsivitas -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Profil</th>
                                <th>Status keanggotaan</th>
                                <th>Edit data</th>
                            </tr>
                        </thead>

                        <?php
                        // Persiapan menampilkan data
                        $no = 1;
                        $tampil = mysqli_query($koneksi, "SELECT * FROM anggota ORDER BY id_anggota DESC"); // Query untuk mendapatkan data dari tabel tmhs 
                        while ($data = mysqli_fetch_array($tampil)):

                            ?>
                            <tr>
                                <!-- td itu tabel data isi datanya  -->
                                <td><?= $no++ ?></td>
                                <td><?= $data['Nama'] ?></td>
                                <td><?= $data['Alamat'] ?></td>
                                <td><?= $data['Email'] ?></td>
                                <td><?= $data['Profil'] ?></td>
                                <td><?= $data['Status_Keanggotaan'] ?></td>


                                <td>

                                    <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
                                </td>
                            </tr>

                            <!-- Awal Modal Ubah -->
                            <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title fs-5" id="staticBackdropLabel">Form data anggota</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="aksi_crud.php">
                                            <input type="hidden" name="ID_Anggota" value="<?= $data['ID_Anggota'] ?>">

                                            <div class="modal-body">



                                                <div class="mb-3">
                                                    <label class="form-label">id Anggota</label>
                                                    <input type="text" class="form-control" name="tidanggota"
                                                        value="<?= $data['ID_Anggota'] ?>"
                                                        placeholder="Masukkan id Anggota!">

                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Nama Lengkap</label>
                                                    <input type="text" class="form-control" name="tnama"
                                                        value="<?= $data['Nama'] ?>"
                                                        placeholder="Masukkan Nama lengkap Anggota!">
                                                </div>


                                                <div class="mb-3">
                                                    <label for="exampleFormControlTextarea1" class="form-label">Alamat
                                                    </label>
                                                    <textarea class="form-control" name="talamat"
                                                        rows="3"><?= $data['Alamat'] ?></textarea>

                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="temail"
                                                        value="<?= $data['Email'] ?>" placeholder="">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Profil</label>
                                                    <input type="text" class="form-control" name="tprofil"
                                                        value="<?= $data['Profil'] ?>" placeholder="">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Status</label>

                                                    <select class="form-select" name="tstatus">
                                                        <option value="<?= $data['Status_Keanggotaan'] ?>" selected>
                                                            <?= $data['Status_Keanggotaan'] ?>
                                                        </option>
                                                        <option value="Aktif">Aktif</option>
                                                        <option value="Nonaktif">Nonaktif</option>

                                                    </select>

                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" name="bubah">Simpan</button>
                                                <button type="submit" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Keluar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Modal ubah-->

                            <!-- Awal Modal hapus -->
                            <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi hapus data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="aksi_crud.php">
                                            <input type="hidden" name="tidanggota" value="<?= $data['ID_Anggota'] ?>">

                                            <div class="modal-body">

                                                <h5 class="text-center"> Apakah Anda yakin akan menghapus data ini? <br>
                                                    <span class="text-danger"><?= $data['Nama'] ?></span>
                                                </h5>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" name="bhapus">Hapus</button>
                                                <button type="submit" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Keluar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Modal hapus-->
                        <?php endwhile; ?>



                    </table>

                    <!-- Akhir tabel -->



                    <!-- Awal Modal Tambah -->
                    <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title fs-5" id="staticBackdropLabel">Form data Anggota Perpustakaan
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="POST" action="aksi_crud.php">
                                    <div class="modal-body">


                                        <div class="mb-3">
                                            <label class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="tnama"
                                                placeholder="Masukkan Nama Lengkap">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Alamat</label>
                                            <textarea class="form-control" name="talamat" rows="3"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="temail"
                                                placeholder="Masukkan Email">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Profil</label>
                                            <input type="text" class="form-control" name="tprofil"
                                                placeholder="Masukkan Profil">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Status Keanggotaan</label>
                                            <select class="form-select" name="tstatus">
                                                <option value="">Pilih Status</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Nonaktif">Nonaktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Keluar</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- Akhir Modal -->



                </div>
            </div>

        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
</body>

</html>