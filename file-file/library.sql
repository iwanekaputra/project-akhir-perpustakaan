-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: dblibrary
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bukus`
--

DROP TABLE IF EXISTS `bukus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bukus` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `halaman` int NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengarang_id` bigint unsigned NOT NULL,
  `penerbit_id` bigint unsigned NOT NULL,
  `kategori_id` bigint unsigned NOT NULL,
  `rak_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bukus`
--

LOCK TABLES `bukus` WRITE;
/*!40000 ALTER TABLE `bukus` DISABLE KEYS */;
INSERT INTO `bukus` VALUES (5,'978-602-02-3447-2','Why? simbiosis dan musuh alami / alih bahasa.','20220727040832.jpg',8,'<p>menceritakan tentang keuntungan dari masing masing hewan tersebut.</p>',159,'40000',3,3,6,1,'2022-07-26 21:08:32','2022-07-26 21:08:32'),(6,'978-602-02-1694-2','40 sains fantastis / alih bahasa.','20220727041536.jpg',7,'<p>buku yang berisikan&nbsp;tanya bertanya tentang ilmiah</p>',173,'60000',3,3,7,1,'2022-07-26 21:15:36','2022-07-26 21:15:36'),(7,'328-102-02-3907-4','Sangkuriang kesiangan : sebuah tjerita rakjat Sunda.','20220727042443.jpg',4,'<p>buku menceritakan&nbsp;Sangkuriang kesiangan : sebuah tjerita rakjat Sunda / dikisahkan kembali oleh Ajip Rosidi</p>',112,'87000',4,4,6,2,'2022-07-26 21:24:43','2022-07-27 15:56:17'),(8,'128-989-01-9287-1','Hurip waras! : dua panineunga.','20220727043431.jpg',9,'<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Buku ini berisi dua pengalaman Ajip Rosidi. Yang pertama adalah sebagai seorang sastrawan yang sering menciptakan tokoh-tokoh sastra dan yang kedua adalah kehidupan dalam dunia nyata, dunia kehidupannya sehari-hari di masyarakat. Ajip Rosidi termasuk tokoh sejarah yang ikut merancang Kongres Pemuda Sunda. Dan merupakan panitia dan peserta termuda.</td>\r\n		</tr>\r\n		<tr>\r\n		</tr>\r\n	</tbody>\r\n</table>',245,'90000',4,5,8,7,'2022-07-26 21:34:31','2022-07-26 21:34:31'),(9,'978-602-02-1000-1','Diawali dari asal muasal manusia di Roma.','20220727044028.jpg',3,'<p>buku yang menceritakan asal muasal manusia yang ada di roma</p>',120,'97000',3,6,7,9,'2022-07-26 21:40:28','2022-07-27 15:43:23'),(10,'978-081-53-700-31','Globalizing','20220727044716.jpg',9,'<p>buku ini menguraikan pentingnya cerita tentang sejarah internasional yang juga memberikan wawasan tentang sejarah informasi, globalisasi, dan hubungan budaya.</p>',186,'130000',5,7,8,6,'2022-07-26 21:47:16','2022-07-27 15:02:48'),(11,'190-1203-120','malin kundang | anak durhaka','20220727224733.jpg',7,'<p>menceritakan tentang anak durhaka</p>',120,'60000',5,6,7,6,'2022-07-27 15:47:33','2022-07-27 15:48:03');
/*!40000 ALTER TABLE `bukus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dendas`
--

DROP TABLE IF EXISTS `dendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dendas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `peminjaman_id` bigint unsigned NOT NULL,
  `harga_denda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dendas`
--

LOCK TABLES `dendas` WRITE;
/*!40000 ALTER TABLE `dendas` DISABLE KEYS */;
INSERT INTO `dendas` VALUES (5,4,'10000','8','2022-07-27 02:44:52','2022-07-27 02:45:11'),(6,7,'10000','8','2022-07-27 15:49:31','2022-07-27 15:49:59');
/*!40000 ALTER TABLE `dendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategori` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (6,'Anak-anak','2022-07-26 20:42:36','2022-07-26 20:42:36'),(7,'Remaja','2022-07-26 20:42:49','2022-07-26 20:42:49'),(8,'Dewasa','2022-07-26 20:42:58','2022-07-26 20:42:58');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keterangans`
--

DROP TABLE IF EXISTS `keterangans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `keterangans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keterangans`
--

LOCK TABLES `keterangans` WRITE;
/*!40000 ALTER TABLE `keterangans` DISABLE KEYS */;
INSERT INTO `keterangans` VALUES (1,'Sedang Dikonfirmasi','2022-07-16 20:30:15','2022-07-16 20:30:15'),(2,'Konfirmasi','2022-07-16 20:30:15','2022-07-16 20:30:15'),(3,'Gagal Konfirmasi','2022-07-16 20:30:15','2022-07-16 20:30:15'),(4,'Sedang Dipinjam','2022-07-16 20:30:15','2022-07-16 20:30:15'),(5,'Denda','2022-07-16 20:30:15','2022-07-16 20:30:15'),(6,'Sudah Dikembalikan','2022-07-16 20:30:15','2022-07-16 20:30:15'),(7,'Belum Lunas','2022-07-16 20:30:15','2022-07-16 20:30:15'),(8,'Lunas','2022-07-16 20:30:15','2022-07-16 20:30:15');
/*!40000 ALTER TABLE `keterangans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (5,'2022_06_13_161948_create_bukus_table',1),(179,'2014_10_12_000000_create_users_table',2),(180,'2014_10_12_100000_create_password_resets_table',2),(181,'2019_08_19_000000_create_failed_jobs_table',2),(182,'2019_12_14_000001_create_personal_access_tokens_table',2),(183,'2022_06_13_171556_create_bukus_table',2),(184,'2022_06_14_034754_create_pengarang_table',2),(185,'2022_06_14_034939_create_penerbit_table',2),(186,'2022_06_14_035012_create_kategori_table',2),(187,'2022_06_14_035037_create_rak_table',2),(188,'2022_06_16_030040_create_peminjamen_table',2),(189,'2022_06_16_114043_create_keterangans_table',2),(190,'2022_07_17_024750_create_dendas_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peminjamen`
--

DROP TABLE IF EXISTS `peminjamen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peminjamen` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `buku_id` bigint unsigned NOT NULL,
  `keterangan_id` bigint unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peminjamen`
--

LOCK TABLES `peminjamen` WRITE;
/*!40000 ALTER TABLE `peminjamen` DISABLE KEYS */;
INSERT INTO `peminjamen` VALUES (4,8,10,6,'maman',2,'2022-07-27','2022-07-30','2022-07-27 02:24:38','2022-07-27 03:01:08'),(6,8,10,6,'maman',2,'2022-07-27','2022-07-30','2022-07-27 03:02:19','2022-07-27 03:04:53'),(7,9,9,8,'iwan',2,'2022-07-28','2022-07-30','2022-07-27 15:43:23','2022-07-27 15:49:59'),(8,9,7,8,'wawan',2,'2022-07-28','2022-07-30','2022-07-27 15:54:31','2022-07-27 15:56:17');
/*!40000 ALTER TABLE `peminjamen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penerbit`
--

DROP TABLE IF EXISTS `penerbit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `penerbit` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `penerbit_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penerbit`
--

LOCK TABLES `penerbit` WRITE;
/*!40000 ALTER TABLE `penerbit` DISABLE KEYS */;
INSERT INTO `penerbit` VALUES (3,'Elex Media Komputindo','Jakarta','elex@gmail.com','081378651721','20220727035808.png','2022-07-26 20:58:08','2022-07-26 20:58:08'),(4,'Tiara','bandung','tiara@gmail.com','088271639182','20220727042208.jpg','2022-07-26 21:22:08','2022-07-26 21:22:08'),(5,'Kiblat Buku Utama','bandung','kiblat@gmail.com','081371829182','20220727043225.jpg','2022-07-26 21:32:25','2022-07-26 21:32:25'),(6,'Gramedia Pustaka Utama','Jakarta','gramedia@gmail.com','082278367198','20220727043819.png','2022-07-26 21:38:19','2022-07-26 21:38:19'),(7,'Routledge','New York','routledge@gmail.com','718092','20220727044350.png','2022-07-26 21:43:50','2022-07-26 21:43:50');
/*!40000 ALTER TABLE `penerbit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengarang`
--

DROP TABLE IF EXISTS `pengarang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengarang` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pengarang_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengarang`
--

LOCK TABLES `pengarang` WRITE;
/*!40000 ALTER TABLE `pengarang` DISABLE KEYS */;
INSERT INTO `pengarang` VALUES (3,'Endah Nawang Novianti','endahnawangnovianti@gmail.com','081370192819','20220727035040.jpg','2022-07-26 20:50:40','2022-07-26 20:53:17'),(4,'Ayib Rosidi','ayib@gmail.com','089513728192','20220727041723.jpg','2022-07-26 21:17:23','2022-07-26 21:17:23'),(5,'Laugesen, Amanda','amanda@gmail.com','71887289','20220727044532.jpg','2022-07-26 21:45:32','2022-07-26 21:45:32');
/*!40000 ALTER TABLE `pengarang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rak`
--

DROP TABLE IF EXISTS `rak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rak` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rak`
--

LOCK TABLES `rak` WRITE;
/*!40000 ALTER TABLE `rak` DISABLE KEYS */;
INSERT INTO `rak` VALUES (1,'Rak 1','2022-07-16 20:30:13','2022-07-16 20:30:13'),(2,'Rak 2','2022-07-16 20:30:13','2022-07-16 20:30:13'),(3,'Rak 3','2022-07-16 20:30:13','2022-07-16 20:30:13'),(4,'Rak 4','2022-07-16 20:30:13','2022-07-16 20:30:13'),(5,'Rak 5','2022-07-16 20:30:14','2022-07-16 20:30:14'),(6,'Rak 6','2022-07-16 20:30:14','2022-07-16 20:30:14'),(7,'Rak 7','2022-07-16 20:30:14','2022-07-16 20:30:14'),(8,'Rak 8','2022-07-16 20:30:14','2022-07-16 20:30:14'),(9,'Rak 9','2022-07-16 20:30:14','2022-07-16 20:30:14'),(10,'Rak 10','2022-07-16 20:30:14','2022-07-16 20:30:14');
/*!40000 ALTER TABLE `rak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Muhammad Taufik','muhammadtaufik@gmail.com',NULL,'$2y$10$y4f7D2kXLUDqLXJxjGX3QOrMpKBWiK02E7kEkT7ouzUog1jBZ2dTy','taufik.jpg',1,NULL,'2022-07-16 20:30:14','2022-07-16 20:30:14'),(2,'Iwan Eka Putra','iwanekaputra@gmail.com',NULL,'$2y$10$zJuU/YGHtyiwdAnqxB2hWO.pMfB2G2tpJMaPaEVlAxraL4WWilXMO','iwan.jpg',1,NULL,'2022-07-16 20:30:14','2022-07-16 20:30:14'),(3,'Suryani','suryani@gmail.com',NULL,'$2y$10$ya5jLHOGuWG4kkGCiWgap.6zQjS.rRt9Xlt1YZMNzW3nhuzjxf9WO','suryani.jpg',1,NULL,'2022-07-16 20:30:14','2022-07-16 20:30:14'),(4,'Nining Suprasmanto','niningsuprasmanto@gmail.com',NULL,'$2y$10$n95ebzoFYzSiRsAKDH8Pse3um2ic/YVtdfITZM9oNaLd3rbLPSy9i','nining.jpg',0,NULL,'2022-07-16 20:30:14','2022-07-16 20:30:14'),(5,'Muhammad Arifin','muhammadarifin@gmail.com',NULL,'$2y$10$wyN6U55hVMUroLd8kG5bP.VQRAdCmR4sr7AvxwECY.AZgn5EtgP2i','arifin.jpg',1,NULL,'2022-07-16 20:30:15','2022-07-16 20:30:15'),(8,'maman','maman@gmail.com',NULL,'$2y$10$VgxnHaoZDuqkPkjo6P307.qM0yOC8WobXqZbgzHJ9yMbojYcUc2Jy','user.jpg',0,NULL,'2022-07-26 21:47:44','2022-07-26 21:47:44'),(9,'iwan','iwan@gmail.com',NULL,'$2y$10$ViRxfnNFlmFRLkWLZiMPdeQ3mgNs2zzb8ttKcsDoJ0fuSVSylSFLS','user.jpg',0,NULL,'2022-07-27 15:42:29','2022-07-27 15:42:29');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'dblibrary'
--

--
-- Dumping routines for database 'dblibrary'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-31 19:55:59
