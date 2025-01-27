-- Data Dummy untuk Tabel Buku
INSERT INTO Buku (Judul, Penulis, Subjek, Jenis, Status) VALUES
('Pemrograman Python', 'John Doe', 'Teknologi', 'Ebook', 'Tersedia'),
('Belajar SQL', 'Jane Smith', 'Basis Data', 'Buku Cetak', 'Tersedia'),
('Pengenalan Machine Learning', 'Alice Johnson', 'Teknologi', 'Ebook', 'Dipinjam'),
('Manajemen Proyek TI', 'Michael Brown', 'Manajemen', 'Buku Cetak', 'Tersedia'),
('Dasar-dasar Statistik', 'Emily Davis', 'Matematika', 'Ebook', 'Tersedia');

-- Data Dummy untuk Tabel Anggota
INSERT INTO Anggota (Nama, Alamat, Email, Profil, Status_Keanggotaan) VALUES
('Ahmad Zaki', 'Jl. Sudirman No. 12, Surabaya', 'ahmad.zaki@example.com', 'Pengembang Web', 'Aktif'),
('Putri Ayu', 'Jl. Diponegoro No. 45, Malang', 'putri.ayu@example.com', 'Mahasiswa', 'Aktif'),
('Dewi Lestari', 'Jl. Basuki Rahmat No. 8, Jakarta', 'dewi.lestari@example.com', 'Penulis', 'Nonaktif'),
('Rizal Fadli', 'Jl. Ahmad Yani No. 27, Bandung', 'rizal.fadli@example.com', 'Data Analyst', 'Aktif'),
('Nina Permata', 'Jl. Pemuda No. 10, Yogyakarta', 'nina.permata@example.com', 'Dosen', 'Aktif');

-- Data Dummy untuk Tabel Reservasi
INSERT INTO Reservasi (ID_Buku, ID_Anggota, Tanggal_Reservasi) VALUES
(1, 1, '2025-01-01'),
(2, 2, '2025-01-02'),
(3, 1, '2025-01-03'),
(4, 3, '2025-01-04'),
(5, 4, '2025-01-05');

-- Data Dummy untuk Tabel Peminjaman
INSERT INTO Peminjaman (ID_Buku, ID_Anggota, Tanggal_Peminjaman, Tanggal_Pengembalian, Status) VALUES
(1, 1, '2025-01-01', '2025-01-10', 'Dikembalikan'),
(2, 2, '2025-01-05', '2025-01-15', 'Dipinjam'),
(3, 1, '2025-01-07', NULL, 'Dipinjam'),
(4, 4, '2025-01-08', '2025-01-18', 'Dikembalikan'),
(5, 5, '2025-01-09', NULL, 'Dipinjam');

-- Data Dummy untuk Tabel Sanksi dan Denda
INSERT INTO Sanksi_Denda (ID_Anggota, ID_Peminjaman, Jumlah_Denda, Status) VALUES
(1, 3, 5000.00, 'Belum Dibayar'),
(2, 2, 10000.00, 'Dibayar'),
(4, 4, 0.00, 'Dibayar'),
(5, 5, 15000.00, 'Belum Dibayar');

-- Data Dummy untuk Tabel Notifikasi
INSERT INTO Notifikasi (ID_Anggota, Pesan, Status) VALUES
(1, 'Anda memiliki denda sebesar Rp 5,000. Harap segera membayar.', 'Belum Terkirim'),
(2, 'Reservasi untuk buku "Belajar SQL" berhasil dilakukan.', 'Terkirim'),
(3, 'Keanggotaan Anda telah dinonaktifkan.', 'Terkirim'),
(5, 'Anda memiliki denda sebesar Rp 15,000. Harap segera membayar.', 'Belum Terkirim');
