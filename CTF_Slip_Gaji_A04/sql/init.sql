CREATE DATABASE IF NOT EXISTS payroll_ctf;
USE payroll_ctf;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50),
  password VARCHAR(255),
  role ENUM('admin', 'karyawan') DEFAULT 'karyawan'
);

CREATE TABLE slip_gaji (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  nama VARCHAR(100),
  jabatan VARCHAR(100),
  gaji_pokok INT,
  tunjangan INT,
  potongan INT,
  flag TEXT
);




INSERT INTO users (id, username, password, role) VALUES
(1, 'admin', 'admin123', 'admin'),
(2, 'karyawan', 'user123', 'karyawan'),
(3, 'user1', 'pass1', 'karyawan'),
(4, 'user2', 'pass2', 'karyawan'),
(5, 'user3', 'pass3', 'karyawan'),
(6, 'user4', 'pass4', 'karyawan'),
(7, 'user5', 'pass5', 'karyawan'),
(8, 'user6', 'pass6', 'karyawan'),
(9, 'user7', 'pass7', 'karyawan'),
(10, 'user8', 'pass8', 'karyawan'),
(11, 'user9', 'pass9', 'karyawan');

INSERT INTO slip_gaji (id, user_id, nama, jabatan, gaji_pokok, tunjangan, potongan, flag) VALUES
(1, 1, 'Karyawan Biasa', 'Staff', 5000000, 500000, 250000, NULL),
(2, 2, 'Admin Payroll', 'Direktur', 15000000, 5000000, 1000000, 'CTF{slip_gaji}'),
(3, 3, 'User 01', 'Staff', 4000000, 400000, 100000, NULL),
(4, 4, 'User 02', 'Staff', 4100000, 410000, 110000, NULL),
(5, 5, 'User 03', 'Staff', 4200000, 420000, 120000, NULL),
(6, 6, 'User 04', 'Staff', 4300000, 430000, 130000, NULL),
(7, 7, 'User 05', 'Staff', 4400000, 440000, 140000, NULL),
(8, 8, 'User 06', 'Staff', 4500000, 450000, 150000, NULL),
(9, 9, 'User 07', 'Staff', 4600000, 460000, 160000, NULL),
(10, 10, 'User 08', 'Staff', 4700000, 470000, 170000, NULL),
(11, 11, 'User 09', 'Staff', 4800000, 480000, 180000, NULL);
