-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for evaluasi2
DROP DATABASE IF EXISTS `evaluasi2`;
CREATE DATABASE IF NOT EXISTS `evaluasi2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `evaluasi2`;

-- Dumping structure for table evaluasi2.evaluations
DROP TABLE IF EXISTS `evaluations`;
CREATE TABLE IF NOT EXISTS `evaluations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `namaInfra` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lokasiInfra` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nilaiKontrak` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tahunMulai` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tahunSelesai` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `evaluasi1_1` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi1_2` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi1_3` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi1_4` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi1_5` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi2_1` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi2_2` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi2_3` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi2_4` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi3_1` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi3_2` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi3_3` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi4_1` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi4_2` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi4_3` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi5_1` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi5_2` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi5_3` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi5_4` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi6_1` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi6_2` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi7_1` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi7_2` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi7_3` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `evaluasi7_4` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nilaiAkhir` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table evaluasi2.evaluations: ~3 rows (approximately)

-- Dumping structure for table evaluasi2.indikator
DROP TABLE IF EXISTS `indikator`;
CREATE TABLE IF NOT EXISTS `indikator` (
  `id` int NOT NULL AUTO_INCREMENT,
  `indikator_nama` varchar(255) DEFAULT NULL,
  `indikator_bobot` int DEFAULT NULL,
  `section_sub_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `section_sub_id` (`section_sub_id`),
  CONSTRAINT `indikator_ibfk_1` FOREIGN KEY (`section_sub_id`) REFERENCES `section_sub` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table evaluasi2.indikator: ~32 rows (approximately)
INSERT INTO `indikator` (`id`, `indikator_nama`, `indikator_bobot`, `section_sub_id`) VALUES
	(1, 'Kondisi Struktur Bawah (Fondasi)', 30, 1),
	(2, 'Kondisi Struktur Atas (Kolom, Sloof, Balok, Pelat Lantai)', 30, 1),
	(3, 'Kondisi Rangka Atap (Rangka, Gording)', 30, 1),
	(4, 'Kondisi Struktur Lain (Tangga)', 10, 1),
	(5, 'Kondisi lantai', 20, 2),
	(6, 'Kondisi Dinding', 20, 2),
	(7, 'Pintu & Jendela', 20, 2),
	(8, 'Penutup langit-langit (plafon)', 20, 2),
	(9, 'Penutup Atap', 20, 2),
	(10, 'Sistem kelistrikan (penerapan, stopkontak)', 30, 3),
	(11, 'Sistem Air Bersih', 20, 3),
	(12, 'Sistem Air Berkas (Grey Water)', 10, 3),
	(13, 'Sistem Air Kotor (Black Water)', 20, 3),
	(14, 'Sistem Sirkulasi Udara', 20, 3),
	(15, 'Kualitas struktur dan permukaan jalan', 40, 4),
	(16, 'Aksesibilitas Jalan', 40, 4),
	(17, 'Kebersihan jalan', 20, 4),
	(18, 'Kondisi Fisik Saluran', 40, 5),
	(19, 'Konektivitas Saluran', 40, 5),
	(20, 'Kebersihan Saluran', 20, 5),
	(21, 'Kondisi prasarana dan sarana persampahan', 60, 6),
	(22, 'Pengumpulan dan pengangkutan', 40, 6),
	(23, 'Distribusi Air', 40, 7),
	(24, 'Kualitas Air', 40, 7),
	(25, 'Ketersediaan Sarana Penampungan', 20, 7),
	(26, 'Jaringan Pembuangan Limbah', 50, 8),
	(27, 'Sarana Pengelolaan Air Limbah', 50, 8),
	(28, 'Vegetasi (Tanaman, Pohon, Rumput)', 40, 9),
	(29, 'Kebersihan Area', 30, 9),
	(30, 'Aksesibilitas & Kenyamanan', 30, 9),
	(31, 'Ketersediaan Sistem Proteksi Kebakaran', 70, 10),
	(32, 'Sarana Akses dan Pencegahan Kebakaran', 30, 10);

-- Dumping structure for table evaluasi2.indikator_kriteria
DROP TABLE IF EXISTS `indikator_kriteria`;
CREATE TABLE IF NOT EXISTS `indikator_kriteria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kriteria_nama` varchar(255) DEFAULT NULL,
  `nilai` int DEFAULT NULL,
  `indikator_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `indikator_id` (`indikator_id`),
  CONSTRAINT `indikator_kriteria_ibfk_1` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table evaluasi2.indikator_kriteria: ~96 rows (approximately)
INSERT INTO `indikator_kriteria` (`id`, `kriteria_nama`, `nilai`, `indikator_id`) VALUES
	(1, 'Tidak ada penurunan/retak, fondasi stabil', 3, 1),
	(2, 'Ada retakan kecil/penurunan sebagian namun masih aman digunakan.', 2, 1),
	(3, 'Retak besar, penurunan signifikan, tidak mampu menahan beban.', 1, 1),
	(4, 'Tidak retak besar, tidak miring, tidak ada deformasi.', 3, 2),
	(5, 'Ada kerusakan ringan/sedang, tapi struktur masih berdiri.', 2, 2),
	(6, 'Retak berat, deformasi signifikan, atau roboh.', 1, 2),
	(7, 'Tidak melengkung, kokoh, tidak terlepas.', 3, 3),
	(8, 'Ada kelengkungan ringan, baut/koneksi melemah, masih berfungsi sebagian.', 2, 3),
	(9, 'Rangka goyah, roboh, atau terlepas dari struktur utama.', 1, 3),
	(10, 'Tidak melengkung, tidak roboh, kokoh.', 3, 4),
	(11, 'Ada kerusakan ringan (retak, korosi), masih dapat digunakan.', 2, 4),
	(12, 'Rusak berat, roboh.', 1, 4),
	(13, 'Rata, tidak pecah, aman.', 3, 5),
	(14, 'Ada pecah/retak sebagian, permukaan kurang rata.', 2, 5),
	(15, 'Lantai rusak berat, berlubang, tidak aman dipakai.', 1, 5),
	(16, 'Finishing baik, cat tidak mengelupas, tidak lembab.', 3, 6),
	(17, 'Cat mengelupas, lembab/berjamur sebagian.', 2, 6),
	(18, 'Retak besar, roboh sebagian/seluruhnya.', 1, 6),
	(19, 'Bisa dibuka/tutup dengan baik, kunci berfungsi, tidak rusak.', 3, 7),
	(20, 'Ada kusen aus, kaca retak, atau pintu macet sebagian.', 2, 7),
	(21, 'Tidak bisa digunakan sama sekali (rusak, hilang).', 1, 7),
	(22, 'Rata, tidak rusak, tidak berjamur.', 3, 8),
	(23, 'Ada kerusakan sebagian (retak, berjamur kecil, melengkung).', 2, 8),
	(24, 'Jatuh/roboh, berjamur parah, tidak bisa dipakai.', 1, 8),
	(25, 'Tidak bocor, tidak pecah, tidak terlepas.', 3, 9),
	(26, 'Bocor ringan/pecah sebagian.', 2, 9),
	(27, 'Bocor parah, pecah/terlepas luas, tidak dapat melindungi ruang.', 1, 9),
	(28, 'Instalasi rapi, aman, semua titik berfungsi.', 3, 10),
	(29, 'Ada titik bermasalah (lampu mati, stopkontak rusak), sebagian masih berfungsi.', 2, 10),
	(30, 'Instalasi rusak total, listrik padam/tidak berfungsi.', 1, 10),
	(31, 'Air lancar, tersedia di seluruh titik, kualitas baik.', 3, 11),
	(32, 'Debit air berkurang, ada kebocoran kecil, distribusi terbatas.', 2, 11),
	(33, 'Air tidak mengalir, pompa rusak, pipa bocor parah.', 1, 11),
	(34, 'Berfungsi optimal, tidak ada kebocoran, aliran lancar.', 3, 12),
	(35, 'Ada gangguan ringan, masih bisa berfungsi dengan perbaikan kecil.', 2, 12),
	(36, 'Tidak berfungsi, aliran terhambat atau bocor parah.', 1, 12),
	(37, 'Saluran lancar, tidak ada sumbatan, tidak menimbulkan bau.', 3, 13),
	(38, 'Ada sumbatan sebagian, aliran lambat, perlu perawatan.', 2, 13),
	(39, 'Tidak berfungsi, saluran tersumbat total.', 1, 13),
	(40, 'Ventilasi/AC berfungsi baik, udara segar dan sehat.', 3, 14),
	(41, 'Aliran udara terbatas, kurang nyaman.', 2, 14),
	(42, 'Tidak berfungsi, udara pengap.', 1, 14),
	(43, 'Permukaan jalan rata, mantap, tidak berlubang sampai dengan berlubang sedikit, nyaman dilalui, struktur baik (jalan / jembatan).', 3, 15),
	(44, 'Terdapat kerusakan ringan seperti retak-retak atau lubang kecil, sebagian besar berlubang, masih dapat dilalui, struktur rusak sebagian (kecuali struktur utama).', 2, 15),
	(45, 'Banyak lubang/retak besar, permukaan rusak berat, sulit dilalui, struktur rusak seluruhnya.', 1, 15),
	(46, 'Jalan mudah diakses oleh pengguna sesuai peruntukan, konektivitas baik.', 3, 16),
	(47, 'Sebagian jalur bisa dilalui, namun ada hambatan (sempit, tidak beraspal merata, atau terputus sebagian).', 2, 16),
	(48, 'Jalan sulit diakses, tidak bisa dilalui kendaraan, atau terputus total.', 1, 16),
	(49, 'Jalan terjaga kebersihannya, bebas sampah, debu, dan lumpur.', 3, 17),
	(50, 'Jalan agak kotor, ada sampah/daun/lumpur di beberapa titik.', 2, 17),
	(51, 'Jalan sangat kotor, banyak sampah/sedimen menumpuk, tidak terawat.', 1, 17),
	(52, 'Saluran terbangun permanen, konstruksi kokoh, tidak ada kerusakan.', 3, 18),
	(53, 'Ada kerusakan ringan (retak/penurunan), masih dapat berfungsi.', 2, 18),
	(54, 'Rusak berat/runtuh, tidak ada saluran fisik yang layak.', 1, 18),
	(55, 'Tersambung baik ke saluran induk/utama, aliran terintegrasi (dapat teralirkan dan tidak menimbulkan banjir).', 3, 19),
	(56, 'Sebagian tersambung, namun ada beberapa segmen yang terputus tetapi masih dapat mengalir.', 2, 19),
	(57, 'Tidak ada keterhubungan, saluran terputus, aliran terhenti di semua titik.', 1, 19),
	(58, 'Saluran bersih, bebas dari sampah, sedimen, atau lumpur.', 3, 20),
	(59, 'Ada banyak sampah/sedimen, namun masih bisa mengalir.', 2, 20),
	(60, 'Saluran penuh sampah/sedimen, mampet, tidak berfungsi.', 1, 20),
	(61, 'Sarana persampahan sesuai dengan yang terbangun, berfungsi baik, dan terpelihara secara rutin.', 3, 21),
	(62, 'Sebagian sarana masih berfungsi tetapi ada kerusakan ringan dan pemeliharaan tidak teratur / hilang sebagian.', 2, 21),
	(63, 'Sebagian besar sarana rusak/tidak berfungsi, tidak sesuai standar teknis, dan tidak terpelihara / hilang seluruhnya.', 1, 21),
	(64, 'Pewadahan didukung dengan sarana pengumpulan serta pengangkutan terjadwal.', 3, 22),
	(65, 'Pengangkutan tidak rutin sehingga area agak kotor dengan sampah di beberapa titik atau pembuangan liar kecil namun masih terkendali.', 2, 22),
	(66, 'Pengumpulan dan pewadahan buruk dan area kotor dengan tumpukan sampah, terdapat pembuangan liar.', 1, 22),
	(67, 'Air terdistribusi lancar sampai dengan titik pelayanan terjauh dan jaringan berfungsi baik, jaringan tidak mengalami kerusakan dan ketersedian air secara kontinu.', 3, 23),
	(68, 'Distribusi air menjangkau sebagian area  (kapasitas sumber air kurang / jaringan sebagian rusak / lainnya).', 2, 23),
	(69, 'Distribusi air tidak berfungsi, sering terhenti, atau tidak menjangkau area (kapasitas sumber air tidak ada / jaringan rusak / lainnya).', 1, 23),
	(70, 'Air jernih, tidak berbau, dan tidak berasa untuk kebutuhan rumah tangga.', 3, 24),
	(71, 'Air agak keruh/berbau ringan, masih dapat digunakan setelah pengolahan sederhana.', 2, 24),
	(72, 'Air keruh, berbau, tercemar, atau tidak layak digunakan.', 1, 24),
	(73, 'Tersedia sarana penampungan air memadai, terpelihara, dan berfungsi optimal.', 3, 25),
	(74, 'Sarana penampungan ada namun kapasitas terbatas atau kurang terpelihara.', 2, 25),
	(75, 'Tidak ada atau sarana penampungan rusak.', 1, 25),
	(76, 'Saluran tertutup/rapi, tidak ada kebocoran, tidak mampet, air mengalir lancar.', 3, 26),
	(77, 'Ada genangan, aliran sedikit tersumbat.', 2, 26),
	(78, 'Banyak kebocoran/genangan banyak, aliran tersumbat permanen, bau menyengat.', 1, 26),
	(79, 'Instalasi (IPAL / septik tank dan bangunan pelengkap) berfungsi, tidak bocor, tidak ada bau berlebihan.', 3, 27),
	(80, 'Kapasitas kecil, kadang overload, ada sedikit rembesan.', 2, 27),
	(81, 'Instalasi tidak berfungsi sesuai fungsinya, limbah tidak terolah.', 1, 27),
	(82, 'Tanaman tumbuh sehat, hijau / sedikit kering, terawat, tidak / sedikit yang mati.', 3, 28),
	(83, 'Sebagian besar tanaman kering, banyak area gundul.', 2, 28),
	(84, 'Keseluruhan tanaman mati, tidak ada perawatan.', 1, 28),
	(85, 'Area bersih, tidak ada sampah berserakan.', 3, 29),
	(86, 'Ada sampah kecil, belum rutin dibersihkan.', 2, 29),
	(87, 'Banyak sampah/limbah menumpuk.', 1, 29),
	(88, 'Semua sarana berfungsi normal (lampu menyala, bangku layak, jalur evakuasi, struktur pendukung kawasan, dan lain-lain).', 3, 30),
	(89, 'Ada sebagian sarana tidak berfungsi.', 2, 30),
	(90, 'Hampir semua sarana rusak/tidak bisa dipakai.', 1, 30),
	(91, 'Ketersediaan sistem proteksi kebakaran (APAR, hidran, sprinkler, dan lain-lain) tersedia sesuai standar teknis, terpelihara, dan berfungsi.', 3, 31),
	(92, 'Sistem proteksi kebakaran tersedia namun beberapa hilang / tidak berfungsi.', 2, 31),
	(93, 'Sistem proteksi kebakaran seluruhnya hilang atau tidak dapat digunakan.', 1, 31),
	(94, 'Jalan kawasan cukup lebar, bebas hambatan, dan tersedia titik manuver kendaraan pemadam.', 3, 32),
	(95, 'Jalan tersedia tetapi sebagian sempit/terhalang sehingga sulit diakses.', 2, 32),
	(96, 'Tidak ada akses kendaraan pemadam ke area rawan kebakaran.', 1, 32);

-- Dumping structure for table evaluasi2.infrastruktur
DROP TABLE IF EXISTS `infrastruktur`;
CREATE TABLE IF NOT EXISTS `infrastruktur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_infra` varchar(255) DEFAULT NULL,
  `lokasi_infra` varchar(255) DEFAULT NULL,
  `nilai_kontrak` varchar(255) DEFAULT NULL,
  `tahun_mulai` varchar(255) DEFAULT NULL,
  `tahun_selesai` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table evaluasi2.infrastruktur: ~0 rows (approximately)
INSERT INTO `infrastruktur` (`id`, `nama_infra`, `lokasi_infra`, `nilai_kontrak`, `tahun_mulai`, `tahun_selesai`) VALUES
	(3, 'Test Infrastruktur', 'Jawa Timur', '100000000', '2023-12-31', '2024-12-31');

-- Dumping structure for table evaluasi2.infrastruktur_evaluasi
DROP TABLE IF EXISTS `infrastruktur_evaluasi`;
CREATE TABLE IF NOT EXISTS `infrastruktur_evaluasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `infrastruktur_id` int DEFAULT NULL,
  `section_nama` varchar(255) DEFAULT NULL,
  `section_kategori_decision` text,
  `section_skor` int DEFAULT NULL,
  `section_skor_kategori` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_eval_infra` (`infrastruktur_id`),
  CONSTRAINT `fk_eval_infra` FOREIGN KEY (`infrastruktur_id`) REFERENCES `infrastruktur` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table evaluasi2.infrastruktur_evaluasi: ~0 rows (approximately)
INSERT INTO `infrastruktur_evaluasi` (`id`, `infrastruktur_id`, `section_nama`, `section_kategori_decision`, `section_skor`, `section_skor_kategori`) VALUES
	(3, 3, 'Kondisi Bangunan', 'return x > 70 ? \'(Berfungsi)\' : x >= 30 ? \'(Kurang Berfungsi)\' : \'(Tidak Berfungsi)\'', 50, '(Kurang Berfungsi)'),
	(4, 3, 'Jalan', 'return x > 50 ? \'(Berfungsi)\' : x > 0 ? \'(Kurang Berfungsi)\' : \'(Tidak Berfungsi)\'', 100, '(Berfungsi)'),
	(5, 3, 'Drainase', 'return x > 50 ? \'(Berfungsi)\' : x > 0 ? \'(Kurang Berfungsi)\' : \'(Tidak Berfungsi)\'', 50, '(Kurang Berfungsi)'),
	(6, 3, 'Pengelolaan Persampahan', 'return x > 50 ? \'(Berfungsi)\' : x > 0 ? \'(Kurang Berfungsi)\' : \'(Tidak Berfungsi)\'', 0, '(Tidak Berfungsi)'),
	(7, 3, 'Sistem Penyediaan Air Minum', 'return x > 50 ? \'(Berfungsi)\' : x > 0 ? \'(Kurang Berfungsi)\' : \'(Tidak Berfungsi)\'', 50, '(Kurang Berfungsi)'),
	(8, 3, 'Sistem Pengelolaan Air Limbah', 'return x > 50 ? \'(Berfungsi)\' : x > 0 ? \'(Kurang Berfungsi)\' : \'(Tidak Berfungsi)\'', 100, '(Berfungsi)'),
	(9, 3, 'RTH/RTHP/Infrastruktur Pendukung Kawasan', 'return x > 50 ? \'(Berfungsi)\' : x > 0 ? \'(Kurang Berfungsi)\' : \'(Tidak Berfungsi)\'', 50, '(Kurang Berfungsi)'),
	(10, 3, 'Sistem Proteksi Kebakaran', 'return x > 50 ? \'(Berfungsi)\' : x > 0 ? \'(Kurang Berfungsi)\' : \'(Tidak Berfungsi)\'', 50, '(Kurang Berfungsi)');

-- Dumping structure for table evaluasi2.infrastruktur_evaluasi_sub
DROP TABLE IF EXISTS `infrastruktur_evaluasi_sub`;
CREATE TABLE IF NOT EXISTS `infrastruktur_evaluasi_sub` (
  `id` int NOT NULL AUTO_INCREMENT,
  `infrastruktur_evaluasi_id` int DEFAULT NULL,
  `section_sub_nama` varchar(255) DEFAULT NULL,
  `section_sub_bobot` int DEFAULT NULL,
  `section_sub_kategori_decision` text,
  `section_sub_skor` int DEFAULT NULL,
  `section_sub_skor_kategori` varchar(255) DEFAULT NULL,
  `section_sub_skor_result` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_eval_sub_eval` (`infrastruktur_evaluasi_id`),
  CONSTRAINT `fk_eval_sub_eval` FOREIGN KEY (`infrastruktur_evaluasi_id`) REFERENCES `infrastruktur_evaluasi` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table evaluasi2.infrastruktur_evaluasi_sub: ~0 rows (approximately)
INSERT INTO `infrastruktur_evaluasi_sub` (`id`, `infrastruktur_evaluasi_id`, `section_sub_nama`, `section_sub_bobot`, `section_sub_kategori_decision`, `section_sub_skor`, `section_sub_skor_kategori`, `section_sub_skor_result`) VALUES
	(5, 3, 'Struktur', 40, 'return nilai_arr.map(n => n.nilai).includes(1) ? [\'tidak baik\', 0] : x > 85 ? [\'baik\', 100] : x > 35 ? [\'kurang baik\', 50] : [\'tidak baik\', 0]', 100, 'baik', 100),
	(6, 3, 'Arsitektur', 30, 'return nilai_arr.map(n => n.nilai).includes(1) ? [\'tidak baik\', 0] : x > 81 ? [\'baik\', 100] : x > 50 ? [\'kurang baik\', 50] : [\'tidak baik\', 0]', 80, 'kurang baik', 50),
	(7, 3, 'MEP', 30, 'return nilai_arr.filter(n=>[10,11,12,13].includes(n.id)).map(n => n.nilai).includes(1) ? [\'tidak baik\', 0] : x > 85 ? [\'baik\', 100] : x > 50 ? [\'kurang baik\', 50] : [\'tidak baik\', 0]', 65, 'tidak baik', 0),
	(8, 4, 'Jalan', 100, 'return nilai_arr.filter(n=>[15,16].includes(n.id)).map(n => n.nilai).includes(1) ? [\'tidak baik\', 0] : x > 85 ? [\'baik\', 100] : x > 50 ? [\'kurang baik\', 50] : [\'tidak baik\', 0]', 90, 'baik', 100),
	(9, 5, 'Drainase', 100, 'return nilai_arr.filter(n=>[18,19].includes(n.id)).map(n => n.nilai).includes(1) ? [\'tidak baik\', 0] : x > 90 ? [\'baik\', 100] : x > 40 ? [\'kurang baik\', 50] : [\'tidak baik\', 0]', 60, 'kurang baik', 50),
	(10, 6, 'Pengelolaan Persampahan', 100, 'return nilai_arr.filter(n=>[21,22].includes(n.id)).map(n => n.nilai).includes(1) ? [\'tidak baik\', 0] : x >= 85 ? [\'baik\', 100] : x > 20 ? [\'kurang baik\', 50] : [\'tidak baik\', 0]', 60, 'tidak baik', 0),
	(11, 7, 'Sistem Penyediaan Air Minum', 100, 'return nilai_arr.filter(n=>[23,24].includes(n.id)).map(n => n.nilai).includes(1) ? [\'tidak baik\', 0] : x > 90 ? [\'baik\', 100] : x > 40 ? [\'kurang baik\', 50] : [\'tidak baik\', 0]', 60, 'kurang baik', 50),
	(12, 8, 'Sistem Pengelolaan Air Limbah', 100, 'return nilai_arr.filter(n=>[26,27].includes(n.id)).map(n => n.nilai).includes(1) ? [\'tidak baik\', 0] : x > 75 ? [\'baik\', 100] : x > 20 ? [\'kurang baik\', 50] : [\'tidak baik\', 0]', 100, 'baik', 100),
	(13, 9, 'RTH/RTHP/Infrastruktur Pendukung Kawasan', 100, 'return nilai_arr.filter(n=>[28,30].includes(n.id)).map(n => n.nilai).includes(1) ? [\'tidak baik\', 0] : x >= 85 ? [\'baik\', 100] : x > 20 ? [\'kurang baik\', 50] : [\'tidak baik\', 0]', 65, 'kurang baik', 50),
	(14, 10, 'Sistem Proteksi Kebakaran', 100, 'return nilai_arr.filter(n=>[31].includes(n.id)).map(n => n.nilai).includes(1) ? [\'tidak baik\', 0] : x > 85 ? [\'baik\', 100] : x > 20 ? [\'kurang baik\', 50] : [\'tidak baik\', 0]', 85, 'kurang baik', 50);

-- Dumping structure for table evaluasi2.infrastruktur_evaluasi_sub_indikator
DROP TABLE IF EXISTS `infrastruktur_evaluasi_sub_indikator`;
CREATE TABLE IF NOT EXISTS `infrastruktur_evaluasi_sub_indikator` (
  `id` int NOT NULL AUTO_INCREMENT,
  `infrastruktur_evaluasi_sub_id` int DEFAULT NULL,
  `indikator_nama` varchar(255) DEFAULT NULL,
  `indikator_bobot` int DEFAULT NULL,
  `indikator_skor` int DEFAULT NULL,
  `indikator_nilai` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_eval_sub_indikator_sub` (`infrastruktur_evaluasi_sub_id`),
  CONSTRAINT `fk_eval_sub_indikator_sub` FOREIGN KEY (`infrastruktur_evaluasi_sub_id`) REFERENCES `infrastruktur_evaluasi_sub` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table evaluasi2.infrastruktur_evaluasi_sub_indikator: ~0 rows (approximately)
INSERT INTO `infrastruktur_evaluasi_sub_indikator` (`id`, `infrastruktur_evaluasi_sub_id`, `indikator_nama`, `indikator_bobot`, `indikator_skor`, `indikator_nilai`) VALUES
	(13, 5, 'Kondisi Struktur Bawah (Fondasi)', 30, 30, 3),
	(14, 5, 'Kondisi Struktur Atas (Kolom, Sloof, Balok, Pelat Lantai)', 30, 30, 3),
	(15, 5, 'Kondisi Rangka Atap (Rangka, Gording)', 30, 30, 3),
	(16, 5, 'Kondisi Struktur Lain (Tangga)', 10, 10, 3),
	(17, 6, 'Kondisi lantai', 20, 10, 2),
	(18, 6, 'Kondisi Dinding', 20, 20, 3),
	(19, 6, 'Pintu & Jendela', 20, 10, 2),
	(20, 6, 'Penutup langit-langit (plafon)', 20, 20, 3),
	(21, 6, 'Penutup Atap', 20, 20, 3),
	(22, 7, 'Sistem kelistrikan (penerapan, stopkontak)', 30, 15, 2),
	(23, 7, 'Sistem Air Bersih', 20, 0, 1),
	(24, 7, 'Sistem Air Berkas (Grey Water)', 10, 10, 3),
	(25, 7, 'Sistem Air Kotor (Black Water)', 20, 20, 3),
	(26, 7, 'Sistem Sirkulasi Udara', 20, 20, 3),
	(27, 8, 'Kualitas struktur dan permukaan jalan', 40, 40, 3),
	(28, 8, 'Aksesibilitas Jalan', 40, 40, 3),
	(29, 8, 'Kebersihan jalan', 20, 10, 2),
	(30, 9, 'Kondisi Fisik Saluran', 40, 40, 3),
	(31, 9, 'Konektivitas Saluran', 40, 20, 2),
	(32, 9, 'Kebersihan Saluran', 20, 0, 1),
	(33, 10, 'Kondisi prasarana dan sarana persampahan', 60, 60, 3),
	(34, 10, 'Pengumpulan dan pengangkutan', 40, 0, 1),
	(35, 11, 'Distribusi Air', 40, 40, 3),
	(36, 11, 'Kualitas Air', 40, 20, 2),
	(37, 11, 'Ketersediaan Sarana Penampungan', 20, 0, 1),
	(38, 12, 'Jaringan Pembuangan Limbah', 50, 50, 3),
	(39, 12, 'Sarana Pengelolaan Air Limbah', 50, 50, 3),
	(40, 13, 'Vegetasi (Tanaman, Pohon, Rumput)', 40, 20, 2),
	(41, 13, 'Kebersihan Area', 30, 30, 3),
	(42, 13, 'Aksesibilitas & Kenyamanan', 30, 15, 2),
	(43, 14, 'Ketersediaan Sistem Proteksi Kebakaran', 70, 70, 3),
	(44, 14, 'Sarana Akses dan Pencegahan Kebakaran', 30, 15, 2);

-- Dumping structure for table evaluasi2.infrastruktur_evaluasi_sub_indikator_kriteria
DROP TABLE IF EXISTS `infrastruktur_evaluasi_sub_indikator_kriteria`;
CREATE TABLE IF NOT EXISTS `infrastruktur_evaluasi_sub_indikator_kriteria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `infrastruktur_evaluasi_sub_indikator_id` int DEFAULT NULL,
  `indikator_kriteria_nama` varchar(255) DEFAULT NULL,
  `nilai` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_eval_sub_indikator_kriteria_indikator` (`infrastruktur_evaluasi_sub_indikator_id`),
  CONSTRAINT `fk_eval_sub_indikator_kriteria_indikator` FOREIGN KEY (`infrastruktur_evaluasi_sub_indikator_id`) REFERENCES `infrastruktur_evaluasi_sub_indikator` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table evaluasi2.infrastruktur_evaluasi_sub_indikator_kriteria: ~0 rows (approximately)
INSERT INTO `infrastruktur_evaluasi_sub_indikator_kriteria` (`id`, `infrastruktur_evaluasi_sub_indikator_id`, `indikator_kriteria_nama`, `nilai`) VALUES
	(37, 13, 'Tidak ada penurunan/retak, fondasi stabil', 3),
	(38, 13, 'Ada retakan kecil/penurunan sebagian namun masih aman digunakan.', 2),
	(39, 13, 'Retak besar, penurunan signifikan, tidak mampu menahan beban.', 1),
	(40, 14, 'Tidak retak besar, tidak miring, tidak ada deformasi.', 3),
	(41, 14, 'Ada kerusakan ringan/sedang, tapi struktur masih berdiri.', 2),
	(42, 14, 'Retak berat, deformasi signifikan, atau roboh.', 1),
	(43, 15, 'Tidak melengkung, kokoh, tidak terlepas.', 3),
	(44, 15, 'Ada kelengkungan ringan, baut/koneksi melemah, masih berfungsi sebagian.', 2),
	(45, 15, 'Rangka goyah, roboh, atau terlepas dari struktur utama.', 1),
	(46, 16, 'Tidak melengkung, tidak roboh, kokoh.', 3),
	(47, 16, 'Ada kerusakan ringan (retak, korosi), masih dapat digunakan.', 2),
	(48, 16, 'Rusak berat, roboh.', 1),
	(49, 17, 'Rata, tidak pecah, aman.', 3),
	(50, 17, 'Ada pecah/retak sebagian, permukaan kurang rata.', 2),
	(51, 17, 'Lantai rusak berat, berlubang, tidak aman dipakai.', 1),
	(52, 18, 'Finishing baik, cat tidak mengelupas, tidak lembab.', 3),
	(53, 18, 'Cat mengelupas, lembab/berjamur sebagian.', 2),
	(54, 18, 'Retak besar, roboh sebagian/seluruhnya.', 1),
	(55, 19, 'Bisa dibuka/tutup dengan baik, kunci berfungsi, tidak rusak.', 3),
	(56, 19, 'Ada kusen aus, kaca retak, atau pintu macet sebagian.', 2),
	(57, 19, 'Tidak bisa digunakan sama sekali (rusak, hilang).', 1),
	(58, 20, 'Rata, tidak rusak, tidak berjamur.', 3),
	(59, 20, 'Ada kerusakan sebagian (retak, berjamur kecil, melengkung).', 2),
	(60, 20, 'Jatuh/roboh, berjamur parah, tidak bisa dipakai.', 1),
	(61, 21, 'Tidak bocor, tidak pecah, tidak terlepas.', 3),
	(62, 21, 'Bocor ringan/pecah sebagian.', 2),
	(63, 21, 'Bocor parah, pecah/terlepas luas, tidak dapat melindungi ruang.', 1),
	(64, 22, 'Instalasi rapi, aman, semua titik berfungsi.', 3),
	(65, 22, 'Ada titik bermasalah (lampu mati, stopkontak rusak), sebagian masih berfungsi.', 2),
	(66, 22, 'Instalasi rusak total, listrik padam/tidak berfungsi.', 1),
	(67, 23, 'Air lancar, tersedia di seluruh titik, kualitas baik.', 3),
	(68, 23, 'Debit air berkurang, ada kebocoran kecil, distribusi terbatas.', 2),
	(69, 23, 'Air tidak mengalir, pompa rusak, pipa bocor parah.', 1),
	(70, 24, 'Berfungsi optimal, tidak ada kebocoran, aliran lancar.', 3),
	(71, 24, 'Ada gangguan ringan, masih bisa berfungsi dengan perbaikan kecil.', 2),
	(72, 24, 'Tidak berfungsi, aliran terhambat atau bocor parah.', 1),
	(73, 25, 'Saluran lancar, tidak ada sumbatan, tidak menimbulkan bau.', 3),
	(74, 25, 'Ada sumbatan sebagian, aliran lambat, perlu perawatan.', 2),
	(75, 25, 'Tidak berfungsi, saluran tersumbat total.', 1),
	(76, 26, 'Ventilasi/AC berfungsi baik, udara segar dan sehat.', 3),
	(77, 26, 'Aliran udara terbatas, kurang nyaman.', 2),
	(78, 26, 'Tidak berfungsi, udara pengap.', 1),
	(79, 27, 'Permukaan jalan rata, mantap, tidak berlubang sampai dengan berlubang sedikit, nyaman dilalui, struktur baik (jalan / jembatan).', 3),
	(80, 27, 'Terdapat kerusakan ringan seperti retak-retak atau lubang kecil, sebagian besar berlubang, masih dapat dilalui, struktur rusak sebagian (kecuali struktur utama).', 2),
	(81, 27, 'Banyak lubang/retak besar, permukaan rusak berat, sulit dilalui, struktur rusak seluruhnya.', 1),
	(82, 28, 'Jalan mudah diakses oleh pengguna sesuai peruntukan, konektivitas baik.', 3),
	(83, 28, 'Sebagian jalur bisa dilalui, namun ada hambatan (sempit, tidak beraspal merata, atau terputus sebagian).', 2),
	(84, 28, 'Jalan sulit diakses, tidak bisa dilalui kendaraan, atau terputus total.', 1),
	(85, 29, 'Jalan terjaga kebersihannya, bebas sampah, debu, dan lumpur.', 3),
	(86, 29, 'Jalan agak kotor, ada sampah/daun/lumpur di beberapa titik.', 2),
	(87, 29, 'Jalan sangat kotor, banyak sampah/sedimen menumpuk, tidak terawat.', 1),
	(88, 30, 'Saluran terbangun permanen, konstruksi kokoh, tidak ada kerusakan.', 3),
	(89, 30, 'Ada kerusakan ringan (retak/penurunan), masih dapat berfungsi.', 2),
	(90, 30, 'Rusak berat/runtuh, tidak ada saluran fisik yang layak.', 1),
	(91, 31, 'Tersambung baik ke saluran induk/utama, aliran terintegrasi (dapat teralirkan dan tidak menimbulkan banjir).', 3),
	(92, 31, 'Sebagian tersambung, namun ada beberapa segmen yang terputus tetapi masih dapat mengalir.', 2),
	(93, 31, 'Tidak ada keterhubungan, saluran terputus, aliran terhenti di semua titik.', 1),
	(94, 32, 'Saluran bersih, bebas dari sampah, sedimen, atau lumpur.', 3),
	(95, 32, 'Ada banyak sampah/sedimen, namun masih bisa mengalir.', 2),
	(96, 32, 'Saluran penuh sampah/sedimen, mampet, tidak berfungsi.', 1),
	(97, 33, 'Sarana persampahan sesuai dengan yang terbangun, berfungsi baik, dan terpelihara secara rutin.', 3),
	(98, 33, 'Sebagian sarana masih berfungsi tetapi ada kerusakan ringan dan pemeliharaan tidak teratur / hilang sebagian.', 2),
	(99, 33, 'Sebagian besar sarana rusak/tidak berfungsi, tidak sesuai standar teknis, dan tidak terpelihara / hilang seluruhnya.', 1),
	(100, 34, 'Pewadahan didukung dengan sarana pengumpulan serta pengangkutan terjadwal.', 3),
	(101, 34, 'Pengangkutan tidak rutin sehingga area agak kotor dengan sampah di beberapa titik atau pembuangan liar kecil namun masih terkendali.', 2),
	(102, 34, 'Pengumpulan dan pewadahan buruk dan area kotor dengan tumpukan sampah, terdapat pembuangan liar.', 1),
	(103, 35, 'Air terdistribusi lancar sampai dengan titik pelayanan terjauh dan jaringan berfungsi baik, jaringan tidak mengalami kerusakan dan ketersedian air secara kontinu.', 3),
	(104, 35, 'Distribusi air menjangkau sebagian area  (kapasitas sumber air kurang / jaringan sebagian rusak / lainnya).', 2),
	(105, 35, 'Distribusi air tidak berfungsi, sering terhenti, atau tidak menjangkau area (kapasitas sumber air tidak ada / jaringan rusak / lainnya).', 1),
	(106, 36, 'Air jernih, tidak berbau, dan tidak berasa untuk kebutuhan rumah tangga.', 3),
	(107, 36, 'Air agak keruh/berbau ringan, masih dapat digunakan setelah pengolahan sederhana.', 2),
	(108, 36, 'Air keruh, berbau, tercemar, atau tidak layak digunakan.', 1),
	(109, 37, 'Tersedia sarana penampungan air memadai, terpelihara, dan berfungsi optimal.', 3),
	(110, 37, 'Sarana penampungan ada namun kapasitas terbatas atau kurang terpelihara.', 2),
	(111, 37, 'Tidak ada atau sarana penampungan rusak.', 1),
	(112, 38, 'Saluran tertutup/rapi, tidak ada kebocoran, tidak mampet, air mengalir lancar.', 3),
	(113, 38, 'Ada genangan, aliran sedikit tersumbat.', 2),
	(114, 38, 'Banyak kebocoran/genangan banyak, aliran tersumbat permanen, bau menyengat.', 1),
	(115, 39, 'Instalasi (IPAL / septik tank dan bangunan pelengkap) berfungsi, tidak bocor, tidak ada bau berlebihan.', 3),
	(116, 39, 'Kapasitas kecil, kadang overload, ada sedikit rembesan.', 2),
	(117, 39, 'Instalasi tidak berfungsi sesuai fungsinya, limbah tidak terolah.', 1),
	(118, 40, 'Tanaman tumbuh sehat, hijau / sedikit kering, terawat, tidak / sedikit yang mati.', 3),
	(119, 40, 'Sebagian besar tanaman kering, banyak area gundul.', 2),
	(120, 40, 'Keseluruhan tanaman mati, tidak ada perawatan.', 1),
	(121, 41, 'Area bersih, tidak ada sampah berserakan.', 3),
	(122, 41, 'Ada sampah kecil, belum rutin dibersihkan.', 2),
	(123, 41, 'Banyak sampah/limbah menumpuk.', 1),
	(124, 42, 'Semua sarana berfungsi normal (lampu menyala, bangku layak, jalur evakuasi, struktur pendukung kawasan, dan lain-lain).', 3),
	(125, 42, 'Ada sebagian sarana tidak berfungsi.', 2),
	(126, 42, 'Hampir semua sarana rusak/tidak bisa dipakai.', 1),
	(127, 43, 'Ketersediaan sistem proteksi kebakaran (APAR, hidran, sprinkler, dan lain-lain) tersedia sesuai standar teknis, terpelihara, dan berfungsi.', 3),
	(128, 43, 'Sistem proteksi kebakaran tersedia namun beberapa hilang / tidak berfungsi.', 2),
	(129, 43, 'Sistem proteksi kebakaran seluruhnya hilang atau tidak dapat digunakan.', 1),
	(130, 44, 'Jalan kawasan cukup lebar, bebas hambatan, dan tersedia titik manuver kendaraan pemadam.', 3),
	(131, 44, 'Jalan tersedia tetapi sebagian sempit/terhalang sehingga sulit diakses.', 2),
	(132, 44, 'Tidak ada akses kendaraan pemadam ke area rawan kebakaran.', 1);

-- Dumping structure for table evaluasi2.section
DROP TABLE IF EXISTS `section`;
CREATE TABLE IF NOT EXISTS `section` (
  `id` int NOT NULL AUTO_INCREMENT,
  `section_nama` varchar(255) DEFAULT NULL,
  `section_kategori_decision` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table evaluasi2.section: ~8 rows (approximately)
INSERT INTO `section` (`id`, `section_nama`, `section_kategori_decision`) VALUES
	(1, 'Kondisi Bangunan', 'return x > 70 ? \'(Berfungsi)\' : x >= 30 ? \'(Kurang Berfungsi)\' : \'(Tidak Berfungsi)\''),
	(2, 'Jalan', 'return x > 50 ? \'(Berfungsi)\' : x > 0 ? \'(Kurang Berfungsi)\' : \'(Tidak Berfungsi)\''),
	(3, 'Drainase', 'return x > 50 ? \'(Berfungsi)\' : x > 0 ? \'(Kurang Berfungsi)\' : \'(Tidak Berfungsi)\''),
	(4, 'Pengelolaan Persampahan', 'return x > 50 ? \'(Berfungsi)\' : x > 0 ? \'(Kurang Berfungsi)\' : \'(Tidak Berfungsi)\''),
	(5, 'Sistem Penyediaan Air Minum', 'return x > 50 ? \'(Berfungsi)\' : x > 0 ? \'(Kurang Berfungsi)\' : \'(Tidak Berfungsi)\''),
	(6, 'Sistem Pengelolaan Air Limbah', 'return x > 50 ? \'(Berfungsi)\' : x > 0 ? \'(Kurang Berfungsi)\' : \'(Tidak Berfungsi)\''),
	(7, 'RTH/RTHP/Infrastruktur Pendukung Kawasan', 'return x > 50 ? \'(Berfungsi)\' : x > 0 ? \'(Kurang Berfungsi)\' : \'(Tidak Berfungsi)\''),
	(8, 'Sistem Proteksi Kebakaran', 'return x > 50 ? \'(Berfungsi)\' : x > 0 ? \'(Kurang Berfungsi)\' : \'(Tidak Berfungsi)\'');

-- Dumping structure for table evaluasi2.section_sub
DROP TABLE IF EXISTS `section_sub`;
CREATE TABLE IF NOT EXISTS `section_sub` (
  `id` int NOT NULL AUTO_INCREMENT,
  `section_sub_nama` varchar(255) DEFAULT NULL,
  `section_sub_bobot` int DEFAULT NULL,
  `section_sub_kategori_decision` text,
  `section_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `section_id` (`section_id`),
  CONSTRAINT `section_sub_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table evaluasi2.section_sub: ~10 rows (approximately)
INSERT INTO `section_sub` (`id`, `section_sub_nama`, `section_sub_bobot`, `section_sub_kategori_decision`, `section_id`) VALUES
	(1, 'Struktur', 40, 'return nilai_arr.map(n => n.nilai).includes(1) ? [\'tidak baik\', 0] : x > 85 ? [\'baik\', 100] : x > 35 ? [\'kurang baik\', 50] : [\'tidak baik\', 0]', 1),
	(2, 'Arsitektur', 30, 'return nilai_arr.map(n => n.nilai).includes(1) ? [\'tidak baik\', 0] : x > 81 ? [\'baik\', 100] : x > 50 ? [\'kurang baik\', 50] : [\'tidak baik\', 0]', 1),
	(3, 'MEP', 30, 'return nilai_arr.filter(n=>[10,11,12,13].includes(n.id)).map(n => n.nilai).includes(1) ? [\'tidak baik\', 0] : x > 85 ? [\'baik\', 100] : x > 50 ? [\'kurang baik\', 50] : [\'tidak baik\', 0]', 1),
	(4, 'Jalan', 100, 'return nilai_arr.filter(n=>[15,16].includes(n.id)).map(n => n.nilai).includes(1) ? [\'tidak baik\', 0] : x > 85 ? [\'baik\', 100] : x > 50 ? [\'kurang baik\', 50] : [\'tidak baik\', 0]', 2),
	(5, 'Drainase', 100, 'return nilai_arr.filter(n=>[18,19].includes(n.id)).map(n => n.nilai).includes(1) ? [\'tidak baik\', 0] : x > 90 ? [\'baik\', 100] : x > 40 ? [\'kurang baik\', 50] : [\'tidak baik\', 0]', 3),
	(6, 'Pengelolaan Persampahan', 100, 'return nilai_arr.filter(n=>[21,22].includes(n.id)).map(n => n.nilai).includes(1) ? [\'tidak baik\', 0] : x >= 85 ? [\'baik\', 100] : x > 20 ? [\'kurang baik\', 50] : [\'tidak baik\', 0]', 4),
	(7, 'Sistem Penyediaan Air Minum', 100, 'return nilai_arr.filter(n=>[23,24].includes(n.id)).map(n => n.nilai).includes(1) ? [\'tidak baik\', 0] : x > 90 ? [\'baik\', 100] : x > 40 ? [\'kurang baik\', 50] : [\'tidak baik\', 0]', 5),
	(8, 'Sistem Pengelolaan Air Limbah', 100, 'return nilai_arr.filter(n=>[26,27].includes(n.id)).map(n => n.nilai).includes(1) ? [\'tidak baik\', 0] : x > 75 ? [\'baik\', 100] : x > 20 ? [\'kurang baik\', 50] : [\'tidak baik\', 0]', 6),
	(9, 'RTH/RTHP/Infrastruktur Pendukung Kawasan', 100, 'return nilai_arr.filter(n=>[28,30].includes(n.id)).map(n => n.nilai).includes(1) ? [\'tidak baik\', 0] : x >= 85 ? [\'baik\', 100] : x > 20 ? [\'kurang baik\', 50] : [\'tidak baik\', 0]', 7),
	(10, 'Sistem Proteksi Kebakaran', 100, 'return nilai_arr.filter(n=>[31].includes(n.id)).map(n => n.nilai).includes(1) ? [\'tidak baik\', 0] : x > 85 ? [\'baik\', 100] : x > 20 ? [\'kurang baik\', 50] : [\'tidak baik\', 0]', 8);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
