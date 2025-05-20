CREATE DATABASE IF NOT EXISTS DRAGO;
USE DRAGO;

-- Entity/Table yang berdiri sendiri
CREATE TABLE IF NOT EXISTS Jabatan(
    ID_Jabatan BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Nama_Jabatan VARCHAR(10) NOT NULL
);

CREATE TABLE IF NOT EXISTS Akun(
    ID_Akun BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Nama VARCHAR(50) NOT NULL,
    Alamat VARCHAR(50) NOT NULL,
    Nomor_HP VARCHAR(20) NOT NULL,
    Username VARCHAR(20) NOT NULL UNIQUE,
    Email VARCHAR(255) NOT NULL,
    Sandi VARCHAR(12) NOT NULL,
    Status_Akun BOOLEAN DEFAULT TRUE,
    ID_Jabatan BIGINT UNSIGNED NOT NULL
);

CREATE TABLE IF NOT EXISTS Penyakit(
    ID_Penyakit BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Nama_Penyakit VARCHAR(50),
    Solusi TEXT
);

CREATE TABLE IF NOT EXISTS Deteksi_Penyakit(
    ID_Deteksi BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Tanggal_Deteksi DATE,
    Gambar_Deteksi MEDIUMBLOB,
    Akurasi FLOAT,
    ID_Akun BIGINT UNSIGNED NOT NULL,
    ID_Penyakit BIGINT UNSIGNED NOT NULL
);

-- Penambahan Foreign Key
ALTER TABLE Akun
ADD CONSTRAINT fk_jabatan
FOREIGN KEY (ID_Jabatan)
REFERENCES Jabatan(ID_Jabatan);

ALTER TABLE Deteksi_Penyakit
ADD CONSTRAINT fk_akun
FOREIGN KEY (ID_Akun)
REFERENCES Akun(ID_Akun);

ALTER TABLE Deteksi_Penyakit
ADD CONSTRAINT fk_penyakit
FOREIGN KEY (ID_Penyakit)
REFERENCES Penyakit(ID_Penyakit);

-- Nanti di Hapus yo (dummy data)
INSERT INTO Jabatan (Nama_Jabatan) VALUES
('Admin'),
('Petani');

INSERT INTO Akun (Nama, Alamat, Nomor_HP, Username, Email, Sandi, Status_Akun, ID_Jabatan) VALUES
('Ahmad Saputra', 'Jl. Merdeka No.10', '081234567890', 'ahmads', 'ahmad@example.com', 'admin123', TRUE, 1),
('Siti Aminah', 'Jl. Sawah Indah', '081223344556', 'sitiaminah', 'siti@example.com', 'akukaya', TRUE, 2),
('Budi Santoso', 'Jl. Desa Baru', '081334455667', 'budis', 'budi@example.com', 'akira77', TRUE, 2),
('Rina Kartika', 'Jl. Padi Makmur', '081445566778', 'rinak', 'rina@example.com', 'hellow', TRUE, 2);

INSERT INTO Penyakit (Nama_Penyakit, Solusi) VALUES
('Antraknosa', 'Pangkas bagian yang terinfeksi, semprotkan fungisida berbahan aktif seperti mankozeb. Hindari kelembaban berlebih.'),
('Bercak Coklat', 'Gunakan fungisida sistemik dan tingkatkan ventilasi pada area tanaman.'),
('Hawar', 'Semprotkan fungisida berbahan aktif boskalid atau fluopyram. Hindari penyiraman berlebihan.'),
('Sehat', 'Tidak ada penanganan diperlukan. Lanjutkan perawatan dan pemantauan rutin.'),
('Busuk Batang', 'Cabut dan musnahkan tanaman yang membusuk. Sterilisasi tanah dan semprotkan bakterisida atau fungisida.'),
('Kanker Batang', 'Pangkas area yang terkena kanker. Semprotkan fungisida, dan hindari luka mekanis pada batang.');
