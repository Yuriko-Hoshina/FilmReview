-- MySQL dump 10.13  Distrib 5.7.35, for Linux (x86_64)
--
-- Host: localhost    Database: moviereview
-- ------------------------------------------------------
-- Server version	5.7.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'$2y$10$nrZtdvec7nonVmKQDDhIPO3qAzzm0pc577W.M7YU2RWjJsFFgZhBa','yuriko','utanotantei@gmail.com',NULL,'2022-06-01 11:05:47','2022-06-01 11:05:47');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ages`
--

DROP TABLE IF EXISTS `ages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ages`
--

LOCK TABLES `ages` WRITE;
/*!40000 ALTER TABLE `ages` DISABLE KEYS */;
INSERT INTO `ages` VALUES (1,'10代','2022-06-01 10:56:57','2022-06-01 10:56:57'),(2,'20代','2022-06-01 10:56:57','2022-06-01 10:56:57'),(3,'30代','2022-06-01 10:56:57','2022-06-01 10:56:57'),(4,'40代','2022-06-01 10:56:57','2022-06-01 10:56:57'),(5,'50代','2022-06-01 10:56:57','2022-06-01 10:56:57'),(6,'60代','2022-06-01 10:56:57','2022-06-01 10:56:57'),(7,'その他','2022-06-01 10:56:57','2022-06-01 10:56:57');
/*!40000 ALTER TABLE `ages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `movie_id` bigint(20) DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (2,2,453395,'>>>yuriko@さん　面白いですよねこれ！もはやホラーでしたが','ドクター・ストレンジ/マルチバース・オブ・マッドネス','2022-07-16 11:57:53','2022-07-16 12:37:40'),(3,2,453395,'おもしろい','ドクター・ストレンジ/マルチバース・オブ・マッドネス','2022-07-16 12:03:00','2022-07-16 12:03:00'),(4,1,453395,'>>>マーベル好きさん　ですよね！わかります（笑）さすが「死霊のはらわた」のサム・ライミ監督ですよね～！','ドクター・ストレンジ/マルチバース・オブ・マッドネス','2022-07-16 14:54:45','2022-07-16 15:06:36');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

truncate table `countries`;
--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES ('JA','日本','2022-06-01 10:56:57','2022-06-01 10:56:57'),('US','アメリカ','2022-06-01 10:56:57','2022-06-01 10:56:57'),('UK','イギリス','2022-06-01 10:56:57','2022-06-01 10:56:57'),('FR','フランス','2022-06-01 10:56:57','2022-06-01 10:56:57'),('DE','ドイツ','2022-06-01 10:56:57','2022-06-01 10:56:57'),('ES','スペイン','2022-06-01 10:56:57','2022-06-01 10:56:57'),('CA','カナダ','2022-06-01 10:56:57','2022-06-01 10:56:57'),('KR','韓国','2022-06-01 10:56:57','2022-06-01 10:56:57'),('HK','香港','2022-06-01 10:56:57','2022-06-01 10:56:57'),('CN','中国','2022-06-01 10:56:57','2022-06-01 10:56:57'),('IN','インド','2022-06-01 10:56:57','2022-06-01 10:56:57');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feelings`
--

DROP TABLE IF EXISTS `feelings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feelings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feelings`
--

LOCK TABLES `feelings` WRITE;
/*!40000 ALTER TABLE `feelings` DISABLE KEYS */;
INSERT INTO `feelings` VALUES (1,'感動したい','2022-07-15 17:47:57','2022-07-15 17:47:57'),(2,'元気を出したい','2022-07-15 17:47:57','2022-07-15 17:47:57'),(3,'ワクワクしたい','2022-07-15 17:47:57','2022-07-15 17:47:57'),(4,'癒されたい','2022-07-15 17:47:57','2022-07-15 17:47:57'),(5,'やる気を出したい','2022-07-15 17:47:57','2022-07-15 17:47:57'),(6,'キュンキュンしたい','2022-07-15 17:47:57','2022-07-15 17:47:57'),(7,'ひやひや/ゾクゾクしたい','2022-07-15 17:47:57','2022-07-15 17:47:57'),(8,'スカッとしたい','2022-07-15 17:47:57','2022-07-15 17:47:57'),(9,'笑いたい','2022-07-15 17:47:57','2022-07-15 17:47:57'),(10,'泣きたい','2022-07-15 17:47:57','2022-07-15 17:47:57');
/*!40000 ALTER TABLE `feelings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genders`
--

DROP TABLE IF EXISTS `genders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genders`
--

LOCK TABLES `genders` WRITE;
/*!40000 ALTER TABLE `genders` DISABLE KEYS */;
INSERT INTO `genders` VALUES (1,'男性','2022-06-01 10:56:57','2022-06-01 10:56:57'),(2,'女性','2022-06-01 10:56:57','2022-06-01 10:56:57'),(3,'その他','2022-06-01 10:56:57','2022-06-01 10:56:57'),(4,'回答しない','2022-06-01 10:56:57','2022-06-01 10:56:57');
/*!40000 ALTER TABLE `genders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genres` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmdb_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genres`
--

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
INSERT INTO `genres` VALUES (1,'アクション',28,'2022-06-01 10:56:57','2022-06-01 10:56:57'),(2,'ドラマ',18,'2022-06-01 10:56:57','2022-06-01 10:56:57'),(3,'SF',878,'2022-06-01 10:56:57','2022-06-01 10:56:57'),(4,'ファンタジー',14,'2022-06-01 10:56:57','2022-06-01 10:56:57'),(5,'アドベンチャー',12,'2022-06-01 10:56:57','2022-06-01 10:56:57'),(6,'サスペンス',80,'2022-06-01 10:56:57','2022-06-01 10:56:57'),(7,'ミステリー',9648,'2022-06-01 10:56:57','2022-06-01 10:56:57'),(8,'ホラー',27,'2022-06-01 10:56:57','2022-06-01 10:56:57'),(9,'スリラー',53,'2022-06-01 10:56:57','2022-06-01 10:56:57'),(10,'ロマンス',10749,'2022-06-01 10:56:57','2022-06-01 10:56:57'),(11,'アニメ',16,'2022-06-01 10:56:57','2022-06-01 10:56:57'),(12,'ファミリー',10751,'2022-06-01 10:56:57','2022-06-01 10:56:57'),(13,'コメディ',35,'2022-06-01 10:56:57','2022-06-01 10:56:57'),(14,'ドキュメンタリー',99,'2022-06-01 10:56:57','2022-06-01 10:56:57'),(15,'戦争',10752,'2022-06-01 10:56:57','2022-06-01 10:56:57'),(16,'史劇',36,'2022-06-01 10:56:57','2022-06-01 10:56:57'),(17,'西部劇',37,'2022-06-01 10:56:57','2022-06-01 10:56:57'),(18,'音楽',10402,'2022-06-01 10:56:57','2022-06-01 10:56:57'),(19,'テレビ映画',10770,'2022-06-01 10:56:57','2022-06-01 10:56:57');
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(58,'2022_04_18_170209_create_genres_table',2),(59,'2022_04_18_171603_create_countries_table',2),(60,'2022_04_18_172333_create_movies_table',2),(61,'2022_04_19_134440_create_admins_table',2),(62,'2022_04_19_201300_create_profiles_table',2),(63,'2022_04_20_124356_create_ages_table',2),(64,'2022_04_20_124412_create_genders_table',2),(65,'2022_04_20_174021_create_profile_histories_table',2),(66,'2022_04_30_141847_create_social_users_table',2),(67,'2022_04_30_144407_add_social_columns_to_users',2),(72,'2022_05_07_143554_create_recommendations_table',3),(115,'2022_06_12_134010_create_comments_table',4),(116,'2022_06_19_114030_create_scores_table',4),(117,'2022_06_19_114119_create_feelings_table',4),(118,'2022_07_11_215444_movie_scores',4),(119,'2022_07_11_215501_movie_feelings',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_feelings`
--

DROP TABLE IF EXISTS `movie_feelings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie_feelings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `movie_id` bigint(20) DEFAULT NULL,
  `feeling_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_feelings`
--

LOCK TABLES `movie_feelings` WRITE;
/*!40000 ALTER TABLE `movie_feelings` DISABLE KEYS */;
/*!40000 ALTER TABLE `movie_feelings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_scores`
--

DROP TABLE IF EXISTS `movie_scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie_scores` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `movie_id` bigint(20) DEFAULT NULL,
  `score_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_scores`
--

LOCK TABLES `movie_scores` WRITE;
/*!40000 ALTER TABLE `movie_scores` DISABLE KEYS */;
/*!40000 ALTER TABLE `movie_scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movies`
--


--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
-- Table structure for table `profile_histories`
--

DROP TABLE IF EXISTS `profile_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile_histories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) NOT NULL,
  `edited_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_histories`
--

LOCK TABLES `profile_histories` WRITE;
/*!40000 ALTER TABLE `profile_histories` DISABLE KEYS */;
INSERT INTO `profile_histories` VALUES (1,1,'2022-06-01 14:51:21','2022-06-01 14:51:21','2022-06-01 14:51:21'),(2,1,'2022-06-01 14:51:41','2022-06-01 14:51:41','2022-06-01 14:51:41'),(3,1,'2022-06-01 15:08:15','2022-06-01 15:08:15','2022-06-01 15:08:15'),(4,1,'2022-06-01 15:08:31','2022-06-01 15:08:31','2022-06-01 15:08:31'),(5,1,'2022-06-01 15:08:46','2022-06-01 15:08:46','2022-06-01 15:08:46'),(6,1,'2022-06-06 17:19:42','2022-06-06 17:19:42','2022-06-06 17:19:42'),(7,2,'2022-06-06 17:44:45','2022-06-06 17:44:45','2022-06-06 17:44:45'),(8,1,'2022-06-06 18:25:18','2022-06-06 18:25:18','2022-06-06 18:25:18'),(9,1,'2022-06-13 11:54:00','2022-06-13 11:54:00','2022-06-13 11:54:00'),(10,1,'2022-06-20 21:47:20','2022-06-20 21:47:20','2022-06-20 21:47:20'),(11,1,'2022-06-20 22:25:40','2022-06-20 22:25:40','2022-06-20 22:25:40'),(12,1,'2022-06-23 16:14:47','2022-06-23 16:14:47','2022-06-23 16:14:47'),(13,1,'2022-07-04 16:09:40','2022-07-04 16:09:40','2022-07-04 16:09:40'),(14,2,'2022-07-04 16:13:45','2022-07-04 16:13:45','2022-07-04 16:13:45'),(15,1,'2022-07-06 12:00:54','2022-07-06 12:00:54','2022-07-06 12:00:54'),(16,1,'2022-07-06 21:40:07','2022-07-06 21:40:07','2022-07-06 21:40:07'),(17,3,'2022-07-16 11:58:30','2022-07-16 11:58:30','2022-07-16 11:58:30');
/*!40000 ALTER TABLE `profile_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_id` bigint(20) NOT NULL,
  `age_id` bigint(20) NOT NULL,
  `genre_id` bigint(20) NOT NULL,
  `best_movie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (1,1,'yuriko@',2,2,6,'デッドプール','pagination。オススメ機能。☑平均点表示。☑ユーザーの削除。☑コメント内容表示時にユーザーネームを出したい。','HX8J285og2aegLyCl5ABqw6wymLw9VcFNZWWQuiP.webp','2022-06-01 14:50:58','2022-07-06 21:40:07'),(2,7,'sample2',4,7,19,'アメリカン・サイコ','twi連携だとプロフィール詳細画面で画像の表示ができない',NULL,'2022-06-05 11:54:54','2022-07-04 16:13:45'),(3,2,'マーベル好き',4,7,19,'アメリカン・サイコ','aaa',NULL,'2022-06-06 17:59:14','2022-07-16 11:58:30');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recommendations`
--

DROP TABLE IF EXISTS `recommendations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recommendations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `movie_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recommendations`
--

LOCK TABLES `recommendations` WRITE;
/*!40000 ALTER TABLE `recommendations` DISABLE KEYS */;
/*!40000 ALTER TABLE `recommendations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scores`
--

DROP TABLE IF EXISTS `scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scores` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scores`
--

LOCK TABLES `scores` WRITE;
/*!40000 ALTER TABLE `scores` DISABLE KEYS */;
INSERT INTO `scores` VALUES (1,'1点','2022-07-15 17:47:57','2022-07-15 17:47:57'),(2,'2点','2022-07-15 17:47:57','2022-07-15 17:47:57'),(3,'3点','2022-07-15 17:47:57','2022-07-15 17:47:57'),(4,'4点','2022-07-15 17:47:57','2022-07-15 17:47:57'),(5,'5点','2022-07-15 17:47:57','2022-07-15 17:47:57'),(6,'6点','2022-07-15 17:47:57','2022-07-15 17:47:57'),(7,'7点','2022-07-15 17:47:57','2022-07-15 17:47:57'),(8,'8点','2022-07-15 17:47:57','2022-07-15 17:47:57'),(9,'9点','2022-07-15 17:47:57','2022-07-15 17:47:57'),(10,'10点','2022-07-15 17:47:57','2022-07-15 17:47:57');
/*!40000 ALTER TABLE `scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_users`
--

DROP TABLE IF EXISTS `social_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `provider_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `social_users_user_id_index` (`user_id`),
  KEY `social_users_provider_user_id_index` (`provider_user_id`),
  CONSTRAINT `social_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_users`
--

LOCK TABLES `social_users` WRITE;
/*!40000 ALTER TABLE `social_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'yuriko','utanotantei@gmail.com',NULL,'$2y$10$J/g1/TC285zKeGfZGkDxmuJZ9bT0U6O5nRSMWbdsKbBPSFz8jYofW',NULL,NULL,NULL,'2022-04-14 21:03:58','2022-04-14 21:03:58'),(2,NULL,'kiku','uta_jemini_pri@yahoo.co.jp',NULL,'$2y$10$lHujMZ8yVtZ9JbmdLA6iTuGnX90HHChk4C8QBk3ZdsDZGHhp6W.8i',NULL,NULL,NULL,'2022-05-09 15:20:35','2022-05-09 15:20:35'),(7,'2414011291','ほっこ',NULL,NULL,'DUMMY_PASSWORD','http://pbs.twimg.com/profile_images/1352190769482801153/eJtVvdTg_normal.jpg',NULL,NULL,'2022-06-01 15:01:59','2022-06-01 15:01:59');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-17  2:07:04
