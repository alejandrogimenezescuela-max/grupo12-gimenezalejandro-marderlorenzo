-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: tatamihub_db
-- ------------------------------------------------------
-- Server version	8.0.46

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Ropa',NULL,NULL),(2,'Indumentaria',NULL,NULL),(3,'Suplementos',NULL,NULL);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactos`
--

DROP TABLE IF EXISTS `contactos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contactos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mensaje` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `leida` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactos`
--

LOCK TABLES `contactos` WRITE;
/*!40000 ALTER TABLE `contactos` DISABLE KEYS */;
/*!40000 ALTER TABLE `contactos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2020_01_01_000000_create_categorias_table',1),(5,'2026_05_15_183049_create_rols_table',1),(6,'2026_05_15_183105_create_usuarios_table',1),(7,'2026_05_19_231740_create_productos_table',1),(8,'2026_05_29_191342_add_direccion_to_usuarios_table',1),(9,'2026_05_30_004125_create_variantes_producto_table',1),(10,'2026_05_30_014124_add_apellido_to_usuarios_table',1),(11,'2026_06_03_191013_add_columns_to_productos_table',1),(12,'2026_06_04_021022_create_contactos_table',1),(13,'2026_06_14_235318_add_talle_color_stock_to_productos_table',1),(14,'2026_06_16_001554_add_leida_to_contactos_table',1),(15,'2026_06_16_182613_create_ventas_cabecera_table',1),(16,'2026_06_16_182810_create_ventas_detalle_table',1),(17,'2026_06_16_224737_add_fecha_venta_to_ventas_cabecera_table',2),(18,'2026_06_17_000338_add_deleted_at_to_usuarios_and_productos_tables',3),(19,'2026_06_17_004850_add_metodo_entrega_to_ventas_cabecera_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `categoria_id` bigint unsigned NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `talle` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `stock_minimo` int NOT NULL DEFAULT '2',
  `imagen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productos_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,1,'Kimono BJJ','sfasf',30000.00,'A2','Azul',1,2,'productos/4zlh599NsHJ1Qwv2lz5GoUR2t9hSEqWiG57Sap8T.jpg','2026-06-17 01:27:23','2026-06-17 06:07:09','2026-06-17 06:07:09'),(2,1,'Kimono BJJ','Hola',100000.00,'A2','Negro',0,2,'productos/T9yNGGKr8ss2WalveKY9QDTqUWeo67Lid2DWrzJ4.jpg','2026-06-17 06:42:43','2026-06-17 20:11:59','2026-06-17 20:11:59'),(3,2,'Guante de Boxeo','Guantes de 12Oz',80000.00,'12Oz','Rojo',0,2,'productos/ZWkGXaiZ0QsajoqE0pTLZEviqEmd2FD3yd3QYzhC.jpg','2026-06-17 06:43:20','2026-06-17 20:11:42','2026-06-17 20:11:42'),(4,3,'CREATINA 1 KG STAR NUTRITION','Creatina de 1kg',72000.00,'1kg','Sin Sabor',1,2,'productos/zdaOWA3YXN4l3CauDJH5rge957jpVU8FVM2qaUMP.png','2026-06-17 19:21:24','2026-06-17 20:11:40','2026-06-17 20:11:40'),(5,3,'CREATINA 1 KG STAR NUTRITION','Una linda creatina de kilo.',72000.00,'1kg','Sin Sabor',6,2,'productos/hhYNFYDFbvlOP3H734un4GHhGnvSxndn3L5hfN5q.jpg','2026-06-17 20:12:43','2026-06-17 20:12:43',NULL),(6,3,'Omega 3 Fish Oil','Capsulas de Omega3 para mejorar la recuperación muscular.',30000.00,'30 caps','Sin Sabor',4,1,'productos/S4k8gnRvwjNt9XRcfIwdxfkrd4uki7MNltPgbAMu.jpg','2026-06-17 20:15:05','2026-06-17 20:15:05',NULL),(7,3,'Proteina Whey StarNutrition','Proteina de suero de leche marca StarNutrition.',60000.00,'2lbs','Chocolate',5,2,'productos/7tz44rmwregBhLH7LTtsZVxOlWIypyaHr9RkOAb9.jpg','2026-06-17 20:17:28','2026-06-17 20:17:28',NULL),(8,1,'Kimono Vulkan BJJ','Kimono resistente y de materiales duraderos.',100000.00,'A2','Negro',4,2,'productos/iP04XI3ctSO7InukA5w9qGzJVlLxvPVVMsPesxEr.jpg','2026-06-17 20:21:25','2026-06-17 20:21:25',NULL),(9,1,'Rash Guard','Camiseta cómoda NO-GI.',35000.00,'M','Negro',7,2,'productos/vk28A28o0OXZ2MLsnnsAUUcWtA0AFvz7aLuU3eOz.jpg','2026-06-17 20:24:09','2026-06-17 20:24:09',NULL),(10,2,'Cabezal de Boxeo','Cabezal resistente y liviano.',30000.00,'M','Negro',5,2,'productos/7gOvoWSIhuqgi42LGYWjasCA9UeZtAELMDRIGEU4.jpg','2026-06-17 20:25:55','2026-06-17 20:25:55',NULL),(11,2,'Guantes de Boxeo TatamiHub','Guantes de boxeo 14oz.',30000.00,'14oz','Rojo',5,2,'productos/Fj6sCe1bHrkex9sLpEhojrH9MM2LxWb7i2upFvk3.jpg','2026-06-17 20:27:27','2026-06-17 20:27:27',NULL),(12,2,'Protector Bucal TatamiHub','Protector Bucal.',15000.00,'Único','Azul',8,3,'productos/bVBdifV5DqpcTTajQXL3jmYNAppHfAG6kjKS03V7.jpg','2026-06-17 20:29:15','2026-06-17 20:29:15',NULL),(13,1,'Short de Muay Thai','Shorts para la disciplina de Muay Thai.',45000.00,'M','Negro',5,2,'productos/5EzUkyCmT3deUji9yI0CvL2BqvHV4vlKpD306DrS.jpg','2026-06-17 20:33:30','2026-06-17 20:33:30',NULL),(14,2,'Tobilleras TatamiHub','Tobilleras resistentes.',32000.00,'M','Rojo',5,2,'productos/penyHNVKIu8EiDqaZdVLl49OLbVipxIGUUbH8Dth.jpg','2026-06-17 20:37:26','2026-06-17 20:37:26',NULL),(15,2,'Cinturones TatamiHub','Cinturones para distinguir el progreso del estudiante, desde el cinturón blanco hasta los niveles más avanzados como el negro.',60000.00,'Único','Varios',5,2,'productos/95aJ97PignaNUAWpzs62ks0AluhfQfQM8Ji8weAZ.jpg','2026-06-17 20:40:03','2026-06-17 20:40:03',NULL),(16,1,'Short Artes Marciales','Un short cómodo.',25000.00,'M','Negro',5,2,'productos/7bW8jU2hNs8w5cdQuXEHytX3fAaaqYfS0gAtZ0nk.jpg','2026-06-17 20:41:32','2026-06-17 20:41:32',NULL),(17,1,'Remera de Compresión TatamiHub','Una remera cómoda de lycra.',20000.00,'L','Azul',5,2,'productos/Q4uyfuuOf6HPbt3umjboyUHqKr6nCFMzaPAIDxjB.jpg','2026-06-17 20:42:50','2026-06-17 20:42:50',NULL),(18,2,'Guantes MMA','Guantes de MMA de primera calidad.',33000.00,'Único','Azul',7,2,'productos/al5FW5Ad5DczHBLq7f5nBMQ4TB1IB5GTci5V7vaA.jpg','2026-06-17 20:44:22','2026-06-17 20:44:22',NULL),(19,3,'Preentreno V8 StarNutrition','Preentreno V8.',33000.00,'285g','Acai',5,2,'productos/Gkw5xTgGAgpFCQrtqikGtE4oj8edCcosR3F8SvQz.png','2026-06-17 20:50:50','2026-06-17 20:50:50',NULL),(20,3,'Citrato de Magnesio StarNutrition','Citrato de Magnesio 500gr, 143 servicios.',28000.00,'500g','Frutos Rojos',4,2,'productos/sWOiqle1iZJZeYPvux2VNqyjYH34n86z4usGjqO0.png','2026-06-17 20:52:57','2026-06-17 20:52:57',NULL);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin',NULL,NULL,NULL,NULL),(2,'Cliente',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol_id` bigint unsigned NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_email_unique` (`email`),
  KEY `usuarios_rol_id_foreign` (`rol_id`),
  CONSTRAINT `usuarios_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Admin Tatami','Principal','admin@gmail.com','Ecuador 3633, Corrientes','3794112233','$2y$12$iwTfIMnaVcmjASJhGKEd8.YC5dOUQYMf.j5Mx3xO5sd0MjqFl4XQe',1,NULL,'2026-06-17 01:26:42','2026-06-17 06:58:05',NULL),(4,'Sofia','Lopez','sofi@gmail.com',NULL,NULL,'$2y$12$ZKKHMIoLdHhXnCiCfNv/q.waoTSJSBipaGEBquA/QflzQj/MIlwAC',2,NULL,'2026-06-17 06:16:32','2026-06-17 06:17:06','2026-06-17 06:17:06'),(5,'Carlos','Lopez','carlitos123@gmail.com','Pago Largo 1950','3794400678','$2y$12$Zw32VxFFoAPVMns32/u97.tpR4CsrS84W9WBFJylLfWCs4wLk02WK',2,NULL,'2026-06-17 08:09:46','2026-06-17 19:23:08',NULL),(6,'Lorenzo','Marder','marder123lorenzo@gmail.com','Rivadavia 1234','3794475612','$2y$12$cSYpzucHWbTM26Z8u7k8S.sXWdq62ql10TpNyeLIabWpzFDvdPt7W',2,NULL,'2026-06-17 21:03:17','2026-06-17 21:03:32',NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `variantes_producto`
--

DROP TABLE IF EXISTS `variantes_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `variantes_producto` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `producto_id` bigint unsigned NOT NULL,
  `talle` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `variantes_producto_producto_id_foreign` (`producto_id`),
  CONSTRAINT `variantes_producto_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `variantes_producto`
--

LOCK TABLES `variantes_producto` WRITE;
/*!40000 ALTER TABLE `variantes_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `variantes_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas_cabecera`
--

DROP TABLE IF EXISTS `ventas_cabecera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas_cabecera` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'carrito',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fecha_venta` timestamp NULL DEFAULT NULL,
  `metodo_entrega` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'retiro',
  PRIMARY KEY (`id`),
  KEY `ventas_cabecera_user_id_foreign` (`user_id`),
  CONSTRAINT `ventas_cabecera_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas_cabecera`
--

LOCK TABLES `ventas_cabecera` WRITE;
/*!40000 ALTER TABLE `ventas_cabecera` DISABLE KEYS */;
INSERT INTO `ventas_cabecera` VALUES (1,1,'confirmado',300000.00,'2026-06-17 01:27:34','2026-06-17 04:48:00','2026-06-17 04:48:00','retiro'),(2,1,'confirmado',60000.00,'2026-06-17 04:50:58','2026-06-17 04:51:18','2026-06-17 04:51:18','retiro'),(3,1,'confirmado',90000.00,'2026-06-17 04:54:31','2026-06-17 04:55:35','2026-06-17 04:55:35','retiro'),(4,1,'confirmado',30000.00,'2026-06-17 04:56:57','2026-06-17 05:32:24','2026-06-17 05:32:24','retiro'),(5,1,'confirmado',60000.00,'2026-06-17 05:49:39','2026-06-17 05:49:46','2026-06-17 05:49:46','retiro'),(6,1,'confirmado',60000.00,'2026-06-17 05:54:26','2026-06-17 05:54:37','2026-06-17 05:54:37','retiro'),(7,1,'confirmado',640000.00,'2026-06-17 06:41:41','2026-06-17 06:44:06','2026-06-17 06:44:06','retiro'),(8,1,'confirmado',80000.00,'2026-06-17 06:49:07','2026-06-17 06:49:12','2026-06-17 06:49:12','retiro'),(9,1,'confirmado',80000.00,'2026-06-17 06:53:29','2026-06-17 07:16:28','2026-06-17 07:16:28','retiro'),(10,1,'confirmado',0.00,'2026-06-17 07:07:08','2026-06-17 07:07:08',NULL,'envio'),(11,1,'confirmado',0.00,'2026-06-17 07:07:10','2026-06-17 07:07:10',NULL,'envio'),(12,1,'confirmado',0.00,'2026-06-17 07:07:11','2026-06-17 07:07:11',NULL,'envio'),(13,1,'confirmado',0.00,'2026-06-17 07:07:16','2026-06-17 07:07:16',NULL,'envio'),(14,1,'confirmado',0.00,'2026-06-17 07:08:09','2026-06-17 07:08:09',NULL,'envio'),(15,1,'confirmado',0.00,'2026-06-17 07:08:10','2026-06-17 07:08:10',NULL,'envio'),(16,1,'confirmado',0.00,'2026-06-17 07:08:10','2026-06-17 07:08:10',NULL,'envio'),(17,1,'confirmado',0.00,'2026-06-17 07:08:10','2026-06-17 07:08:10',NULL,'envio'),(18,1,'confirmado',0.00,'2026-06-17 07:08:10','2026-06-17 07:08:10',NULL,'envio'),(19,1,'confirmado',0.00,'2026-06-17 07:08:10','2026-06-17 07:08:10',NULL,'envio'),(20,1,'confirmado',0.00,'2026-06-17 07:08:11','2026-06-17 07:08:11',NULL,'envio'),(21,1,'confirmado',0.00,'2026-06-17 07:08:11','2026-06-17 07:08:11',NULL,'envio'),(22,1,'confirmado',0.00,'2026-06-17 07:08:11','2026-06-17 07:08:11',NULL,'envio'),(23,1,'confirmado',0.00,'2026-06-17 07:08:11','2026-06-17 07:08:11',NULL,'envio'),(24,1,'confirmado',0.00,'2026-06-17 07:08:11','2026-06-17 07:08:11',NULL,'envio'),(25,1,'confirmado',0.00,'2026-06-17 07:08:19','2026-06-17 07:08:19',NULL,'retiro'),(26,1,'confirmado',0.00,'2026-06-17 07:08:23','2026-06-17 07:08:23',NULL,'envio'),(27,1,'confirmado',0.00,'2026-06-17 07:08:56','2026-06-17 07:08:56',NULL,'envio'),(28,1,'confirmado',0.00,'2026-06-17 07:12:46','2026-06-17 07:12:46',NULL,'envio'),(29,1,'confirmado',0.00,'2026-06-17 07:13:16','2026-06-17 07:13:16',NULL,'envio'),(30,1,'confirmado',100000.00,'2026-06-17 07:58:57','2026-06-17 07:59:03','2026-06-17 07:59:03','retiro'),(31,1,'confirmado',100000.00,'2026-06-17 08:00:43','2026-06-17 08:00:48','2026-06-17 08:00:48','retiro'),(32,1,'confirmado',100000.00,'2026-06-17 08:01:53','2026-06-17 08:01:57','2026-06-17 08:01:57','retiro'),(33,1,'confirmado',100000.00,'2026-06-17 08:04:41','2026-06-17 08:04:47','2026-06-17 08:04:47','retiro'),(34,1,'carrito',0.00,'2026-06-17 08:05:35','2026-06-17 20:11:20',NULL,'retiro'),(35,5,'confirmado',100000.00,'2026-06-17 08:10:12','2026-06-17 08:13:18','2026-06-17 08:13:18','retiro'),(36,5,'confirmado',216000.00,'2026-06-17 19:22:40','2026-06-17 19:23:13','2026-06-17 19:23:13','retiro'),(37,5,'confirmado',172000.00,'2026-06-17 19:44:34','2026-06-17 19:45:06','2026-06-17 19:45:06','retiro'),(38,6,'carrito',0.00,'2026-06-17 21:03:34','2026-06-17 21:03:34',NULL,'retiro');
/*!40000 ALTER TABLE `ventas_cabecera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas_detalle`
--

DROP TABLE IF EXISTS `ventas_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas_detalle` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `venta_id` bigint unsigned NOT NULL,
  `producto_id` bigint unsigned NOT NULL,
  `cantidad` int NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventas_detalle_venta_id_foreign` (`venta_id`),
  KEY `ventas_detalle_producto_id_foreign` (`producto_id`),
  CONSTRAINT `ventas_detalle_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  CONSTRAINT `ventas_detalle_venta_id_foreign` FOREIGN KEY (`venta_id`) REFERENCES `ventas_cabecera` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas_detalle`
--

LOCK TABLES `ventas_detalle` WRITE;
/*!40000 ALTER TABLE `ventas_detalle` DISABLE KEYS */;
INSERT INTO `ventas_detalle` VALUES (1,1,1,10,30000.00,300000.00,'2026-06-17 01:27:34','2026-06-17 04:39:35'),(2,2,1,2,30000.00,60000.00,'2026-06-17 04:51:10','2026-06-17 04:51:10'),(3,3,1,3,30000.00,90000.00,'2026-06-17 04:55:29','2026-06-17 04:55:29'),(4,4,1,1,30000.00,30000.00,'2026-06-17 05:32:20','2026-06-17 05:32:20'),(5,5,1,2,30000.00,60000.00,'2026-06-17 05:49:39','2026-06-17 05:49:39'),(6,6,1,2,30000.00,60000.00,'2026-06-17 05:54:26','2026-06-17 05:54:26'),(7,7,2,4,100000.00,400000.00,'2026-06-17 06:43:37','2026-06-17 06:43:37'),(8,7,3,3,80000.00,240000.00,'2026-06-17 06:43:58','2026-06-17 06:43:58'),(9,8,3,1,80000.00,80000.00,'2026-06-17 06:49:07','2026-06-17 06:49:07'),(11,9,3,1,80000.00,80000.00,'2026-06-17 06:58:18','2026-06-17 06:58:18'),(12,30,2,1,100000.00,100000.00,'2026-06-17 07:58:57','2026-06-17 07:58:57'),(13,31,2,1,100000.00,100000.00,'2026-06-17 08:00:43','2026-06-17 08:00:43'),(14,32,2,1,100000.00,100000.00,'2026-06-17 08:01:53','2026-06-17 08:01:53'),(15,33,2,1,100000.00,100000.00,'2026-06-17 08:04:41','2026-06-17 08:04:41'),(17,35,2,1,100000.00,100000.00,'2026-06-17 08:12:18','2026-06-17 08:12:18'),(18,36,4,3,72000.00,216000.00,'2026-06-17 19:22:40','2026-06-17 19:22:40'),(19,37,2,1,100000.00,100000.00,'2026-06-17 19:44:47','2026-06-17 19:44:47'),(20,37,4,1,72000.00,72000.00,'2026-06-17 19:44:58','2026-06-17 19:44:58');
/*!40000 ALTER TABLE `ventas_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'tatamihub_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-17 19:10:47
