CREATE DATABASE IF NOT EXISTS DRAGO;
USE DRAGO;

-- Entity/Table yang berdiri sendiri
CREATE TABLE IF NOT EXISTS Jabatan(
    ID_Jabatan BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Nama_Jabatan VARCHAR(10) NOT NULL
)

CREATE TABLE IF NOT EXISTS Akun(
    ID_Akun BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Nama VARCHAR(50) NOT NULL,
    Alamat VARCHAR(50) NOT NULL,
    Nomor_HP VARCHAR(20) NOT NULL,
    Username VARCHAR(20) NOT NULL UNIQUE,
    Email VARCHAR(255) NOT NULL,
    Sandi VARCHAR(255) NOT NULL,
    Status_Akun BOOLEAN DEFAULT TRUE,
    ID_Jabatan BIGINT UNSIGNED NOT NULL --fk
);

-- Penambahan Foreign Key
ALTER TABLE Akun
ADD CONSTRAINT fk_jabatan
FOREIGN KEY (ID_Jabatan)
REFERENCES Jabatan(ID_Jabatan);


-- Nanti di Hapus yo (dummy data)
-- Insert Jabatan
INSERT INTO Jabatan (Nama_Jabatan) VALUES
('Admin'),
('Petani A');

-- Insert Akun
INSERT INTO Akun (Nama, Alamat, Nomor_HP, Username, Email, Sandi, Status_Akun, ID_Jabatan) VALUES
('Ahmad Saputra', 'Jl. Merdeka No.10', '081234567890', 'ahmads', 'ahmad@example.com', 'hashed_password_1', TRUE, 1),
('Siti Aminah', 'Jl. Sawah Indah', '081223344556', 'sitiaminah', 'siti@example.com', 'hashed_password_2', TRUE, 2),
('Budi Santoso', 'Jl. Desa Baru', '081334455667', 'budis', 'budi@example.com', 'hashed_password_3', TRUE, 2),
('Rina Kartika', 'Jl. Padi Makmur', '081445566778', 'rinak', 'rina@example.com', 'hashed_password_4', TRUE, 2);

