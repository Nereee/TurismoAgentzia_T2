CREATE DATABASE  IF NOT EXISTS `db_bidai_agentzia` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `db_bidai_agentzia`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: db_bidai_agentzia
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `agentzia`
--

DROP TABLE IF EXISTS `agentzia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agentzia` (
  `agentzia_id` int(11) NOT NULL,
  `izena` varchar(25) DEFAULT NULL,
  `logoa` varchar(25) DEFAULT NULL,
  `marka_kolore` varchar(9) DEFAULT NULL,
  `erabiltzailea` varchar(25) DEFAULT NULL,
  `pasahitza` varchar(25) DEFAULT NULL,
  `agentzia_kod` char(2) DEFAULT NULL,
  `langile_kod` char(2) DEFAULT NULL,
  PRIMARY KEY (`agentzia_id`),
  KEY `agentzia_kod` (`agentzia_kod`),
  KEY `langile_kod` (`langile_kod`),
  CONSTRAINT `agentzia_ibfk_1` FOREIGN KEY (`agentzia_kod`) REFERENCES `agentzia_mota` (`agentzia_kod`),
  CONSTRAINT `agentzia_ibfk_2` FOREIGN KEY (`langile_kod`) REFERENCES `langile_kop` (`langile_kod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agentzia`
--

LOCK TABLES `agentzia` WRITE;
/*!40000 ALTER TABLE `agentzia` DISABLE KEYS */;
/*!40000 ALTER TABLE `agentzia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agentzia_mota`
--

DROP TABLE IF EXISTS `agentzia_mota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agentzia_mota` (
  `agentzia_kod` char(2) NOT NULL,
  `deskribapena` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`agentzia_kod`),
  UNIQUE KEY `agentzia_kod` (`agentzia_kod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agentzia_mota`
--

LOCK TABLES `agentzia_mota` WRITE;
/*!40000 ALTER TABLE `agentzia_mota` DISABLE KEYS */;
INSERT INTO `agentzia_mota` VALUES ('A1','Mayorista'),('A2','Minorista'),('A3','Mayorista-minorista');
/*!40000 ALTER TABLE `agentzia_mota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `airelinea`
--

DROP TABLE IF EXISTS `airelinea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `airelinea` (
  `airelinea_kod` varchar(4) NOT NULL,
  `izena` varchar(50) DEFAULT NULL,
  `herrialdea` char(3) DEFAULT NULL,
  PRIMARY KEY (`airelinea_kod`),
  UNIQUE KEY `airelinea_kod` (`airelinea_kod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `airelinea`
--

LOCK TABLES `airelinea` WRITE;
/*!40000 ALTER TABLE `airelinea` DISABLE KEYS */;
INSERT INTO `airelinea` VALUES ('2K','AVIANCA-Ecuador dba AVIANCA','EC'),('3P','World 2 Fly PT, S.A.','PT'),('6B2','TUIfly Nordic AB','CN'),('A.C.','Air France ','FR'),('A0','BA Euroflyer Limited dba British Airways','GB'),('AA','American Airlines','USA'),('AM','Aerovias de Mexico SA de CV dba AeroMexico','MX'),('AR','Aerolineas Argentinas S.A.','AR'),('AV','Aerovias del Continente Americano S.A. AVIANCA','CO'),('AY','Finnair','FI'),('AZ','Alitalia','IT'),('BA','British Airways PLC','GB'),('CL','Lufthansa CityLine GmbH','DE'),('DE','Condor Flugdienst GmbH','DE'),('DL','Delta Air Lines Inc','USA'),('DS','Easyjet CH S.A','CH'),('GL','Air GRL','GRL'),('JJ','Tam Linhas Aereas SA dba Latam Airlines Brasil','BR'),('KL','KLM','NL'),('KN','CN United Airlines','CN'),('LH','Lufthansa','DE'),('LX','SWISS Internation Air Lines Ltd','CH'),('M3','BSA - Aerolinhas Brasileiras S.A dba LATAM Cargo B','BR'),('MS','Egyptair','EG'),('MT','MT Air Travel Ltd dba MT MedAir','MT'),('N0','Norse Atlantic Airways AS','NO'),('OU','HR Airlines d.d.','HR'),('PC','Pegasus Airlines','TR'),('QR','QA Airways Group Q.C.S.C dba QA Airways','QA'),('RJ','Alia - The Royal JOn Airlines dba Royal JOn','JO'),('RK','RYNAIR','PT'),('S4','SATA Internacional - Azores Airlines, S.A.','TR'),('SN','Brussels Airlines','BE'),('SP','SATA (Air Acores)','PT'),('TK','Turkish Airlines Inc','TR'),('TP','TAP PT','PT'),('TS','Air Transat','CA'),('U2','EASYJET UK LIMITED','GB'),('UA','United Airlines Inc','USA'),('UX','Air Europa Lineas Aereas, S.A.','ES'),('VOY','Aerolínea Vueling SA','ES'),('VS','Virgin Atlantic Airways Ltd','GB'),('WA','KLM Cityhopper','NL'),('WFL','World2Fly','NL'),('WK','Edelweiss Air AG','ES'),('X3*','TUIfly Gmbh','DE'),('X7','Challenge Airlines (BE) S.A.','BE'),('YW','Air Nostrum, Lineas aereas del Mediterra neo SA','ES');
/*!40000 ALTER TABLE `airelinea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aireportua`
--

DROP TABLE IF EXISTS `aireportua`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aireportua` (
  `aireportu_kod` varchar(3) NOT NULL,
  `hiria` varchar(100) DEFAULT NULL,
  `jatorri_aireport` varchar(100) DEFAULT NULL,
  `helmug_aireport` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`aireportu_kod`),
  UNIQUE KEY `aireportu_kod` (`aireportu_kod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aireportua`
--

LOCK TABLES `aireportua` WRITE;
/*!40000 ALTER TABLE `aireportua` DISABLE KEYS */;
INSERT INTO `aireportua` VALUES ('ACA','MÉXICO (ACAPULCO)',NULL,NULL),('ACE','Lanzarote',NULL,NULL),('AGP','MALAGA',NULL,NULL),('ALC','Alicante',NULL,NULL),('AMS','HOLANDA Amsterdam ',NULL,NULL),('AMX','JO (Ammán ) AMM',NULL,NULL),('ATH','GRECIA ( Atenas)',NULL,NULL),('BCN','arcelona',NULL,NULL),('BER','ALEMANIA (Berlín )',NULL,NULL),('BIO','Bilbao',NULL,NULL),('BJZ','Badajoz',NULL,NULL),('BKK','TAILANDIA Bagkok ',NULL,NULL),('BOG','COLOMBIA Bogotá ',NULL,NULL),('BOS','Boston ',NULL,NULL),('BRU','BELGICA (Bruselas ) ',NULL,NULL),('BSB','BRASIL (brasilia)',NULL,NULL),('BUE','Buenos Aires ',NULL,NULL),('CAI','EG El Cairo ',NULL,NULL),('CAS','MARRUECOS (Casablanca) ',NULL,NULL),('CCS','VENEZUELA ( CARACAS)',NULL,NULL),('CDG','FRANCIA,París (aeropuerto Charles de Gaulle)',NULL,NULL),('CPH','DINAMARCA ',NULL,NULL),('DTT','DETROIT',NULL,NULL),('DUB','IRLANDA (DUBLIN)',NULL,NULL),('DUS','ALEMANIA (Dusseldorf )',NULL,NULL),('EAS','SAN SEBASTIAN',NULL,NULL),('FRA','ALEMANIA (Frankfurt )',NULL,NULL),('FUE','FUERTEVENTURA',NULL,NULL),('GMZ','LA GOMERA',NULL,NULL),('GRO','Gerona ',NULL,NULL),('GRX','Granada ',NULL,NULL),('GVA','SUIZA (Ginebra )',NULL,NULL),('HAM','ALEMANIA (hamburgo)',NULL,NULL),('HEL','FINLANDIA (Helsinki )',NULL,NULL),('HOU','Houston',NULL,NULL),('IBZ','Ibiza',NULL,NULL),('IST','TR (ESTAMBUL)',NULL,NULL),('JFK','Nueva York',NULL,NULL),('KIN','JAMAICA (kingston)',NULL,NULL),('LAX','LOS ANGELES',NULL,NULL),('LBG','FRANCIA ,Le Bourget,',NULL,NULL),('LCG','La Coruña LCG',NULL,NULL),('LGH','LONDRES (GATWICK)',NULL,NULL),('LHR','LONDRES Heathrow',NULL,NULL),('LIM','PERU ( Lima)',NULL,NULL),('LIS','PT (lisboa)',NULL,NULL),('LPA','GRAN CANARIA',NULL,NULL),('LYS','FRANCIA (lyon)',NULL,NULL),('MAD','Madrid',NULL,NULL),('MAh','MAHON',NULL,NULL),('MEL','AUSTRALIA Melbourne ',NULL,NULL),('MEX','México D.F.',NULL,NULL),('MIA','Miami',NULL,NULL),('MIL','ITALIA (Milán )',NULL,NULL),('MJV','Murcia ',NULL,NULL),('MOW','RUSIA (Moscú ) MOW ',NULL,NULL),('MRS','FRANCIA (Marsella)',NULL,NULL),('MUC','ALEMANIA (Munich )',NULL,NULL),('NBO','KENIA ( Nairobi)',NULL,NULL),('ODB','Córdoba ',NULL,NULL),('ORY','MadFRANCIA (ORLY)rid',NULL,NULL),('OSL','NORUEGA (oslo)',NULL,NULL),('OVD','Asturias',NULL,NULL),('PHL','Philadelphia PHL ',NULL,NULL),('PMI','PALMA DE MALLORCA',NULL,NULL),('PNA','Pamplona ',NULL,NULL),('PRG','REPUBLICA CHECA (Praga )',NULL,NULL),('RAK','MARRUECOS (Marrakech)',NULL,NULL),('REU','REUS',NULL,NULL),('RIO','BRASIL (Rio de Janeiro )',NULL,NULL),('SAO',' BRASIL (Sao Paulo )',NULL,NULL),('SCQ','Santiago de Compostela ',NULL,NULL),('SDQ',' REPUBLICA DOMINICANA (Santo Domingo) ',NULL,NULL),('SDR','SANTANDER',NULL,NULL),('SEA','Seattle ',NULL,NULL),('SFO','SAN FRANCISCO',NULL,NULL),('SLM','Salamanca ',NULL,NULL),('SPC','Santa Cruz de la Palma ',NULL,NULL),('STN','LONDRES ( Stanted)',NULL,NULL),('STO','SUECIA (Estocolmo)',NULL,NULL),('STR','ALEMANIA (Stuttgart) ',NULL,NULL),('SYD','AUSTRALIA (SIYNEY)',NULL,NULL),('TFN','Tenerife Norte ',NULL,NULL),('TFS','Tenerife Sur ',NULL,NULL),('TUN','Túnez',NULL,NULL),('VDE','HIERRO',NULL,NULL),('VGO','Vigo',NULL,NULL),('VIE','AUSTRIA (Viena )',NULL,NULL),('VIT','VITORIA',NULL,NULL),('VLC','Valencia ',NULL,NULL),('WAS','WASHINGTON',NULL,NULL),('WAW','POLONIA (Varsovia ) WAW ',NULL,NULL),('XRY','JEREZ DE LA FRONTERA',NULL,NULL),('YMQ','Montreal, Québec ',NULL,NULL),('YOW',' CA Ottawa, Ontario YOW',NULL,NULL),('YTO','CA Toronto, Ontario YTO',NULL,NULL),('YVR','CA VANCOUVER  ',NULL,NULL),('ZAZ','Zaragoza',NULL,NULL),('ZRH','SUIZA (Zurich)',NULL,NULL);
/*!40000 ALTER TABLE `aireportua` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beste_batzuk`
--

DROP TABLE IF EXISTS `beste_batzuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `beste_batzuk` (
  `zerb_kod` varchar(4) NOT NULL,
  `izena` varchar(25) DEFAULT NULL,
  `deskribapena` varchar(25) DEFAULT NULL,
  `prezioa` int(11) DEFAULT NULL,
  PRIMARY KEY (`zerb_kod`),
  CONSTRAINT `beste_batzuk_ibfk_1` FOREIGN KEY (`zerb_kod`) REFERENCES `zerbitzuak` (`zerb_kod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beste_batzuk`
--

LOCK TABLES `beste_batzuk` WRITE;
/*!40000 ALTER TABLE `beste_batzuk` DISABLE KEYS */;
/*!40000 ALTER TABLE `beste_batzuk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bidai_mota`
--

DROP TABLE IF EXISTS `bidai_mota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bidai_mota` (
  `bidai_kod` char(2) NOT NULL,
  `deskribapena` varchar(75) DEFAULT NULL,
  `bidai_id` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`bidai_kod`),
  UNIQUE KEY `bidai_kod` (`bidai_kod`),
  KEY `bidai_id` (`bidai_id`),
  CONSTRAINT `bidai_mota_ibfk_1` FOREIGN KEY (`bidai_id`) REFERENCES `bidaia` (`bidai_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bidai_mota`
--

LOCK TABLES `bidai_mota` WRITE;
/*!40000 ALTER TABLE `bidai_mota` DISABLE KEYS */;
INSERT INTO `bidai_mota` VALUES ('B1','Ezkongaiak',NULL),('B2','Senior',NULL),('B3','Taldeak',NULL),('B4','bidai handia (heñlmuga exotikoak+hegaldia+ostatua)',NULL),('B5','Eskapada',NULL),('B6','Familiak (haur txikiekin)',NULL);
/*!40000 ALTER TABLE `bidai_mota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bidaia`
--

DROP TABLE IF EXISTS `bidaia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bidaia` (
  `bidai_id` varchar(12) NOT NULL,
  `izena` varchar(25) DEFAULT NULL,
  `deskribapena` varchar(25) DEFAULT NULL,
  `bidai_iraupen` int(4) DEFAULT NULL,
  `agentzia_id` int(11) DEFAULT NULL,
  `herrialdea` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`bidai_id`),
  KEY `agentzia_id` (`agentzia_id`),
  CONSTRAINT `bidaia_ibfk_1` FOREIGN KEY (`agentzia_id`) REFERENCES `agentzia` (`agentzia_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bidaia`
--

LOCK TABLES `bidaia` WRITE;
/*!40000 ALTER TABLE `bidaia` DISABLE KEYS */;
/*!40000 ALTER TABLE `bidaia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hegaldia`
--

DROP TABLE IF EXISTS `hegaldia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hegaldia` (
  `hegaldi_kod` varchar(7) NOT NULL,
  `izena` varchar(25) DEFAULT NULL,
  `prezioa` int(11) DEFAULT NULL,
  `irteera_data` varchar(10) DEFAULT NULL,
  `irteera_ordua` varchar(5) DEFAULT NULL,
  `bidai_iraupen` varchar(5) DEFAULT NULL,
  `aireportu_kod` varchar(3) DEFAULT NULL,
  `airelinea_kod` varchar(4) DEFAULT NULL,
  `helmug_aireport` varchar(100) DEFAULT NULL,
  `zerb_kod` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`hegaldi_kod`),
  UNIQUE KEY `hegaldi_kod` (`hegaldi_kod`),
  KEY `aireportu_kod` (`aireportu_kod`),
  KEY `airelinea_kod` (`airelinea_kod`),
  KEY `zerb_kod` (`zerb_kod`),
  CONSTRAINT `hegaldia_ibfk_1` FOREIGN KEY (`aireportu_kod`) REFERENCES `aireportua` (`aireportu_kod`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hegaldia_ibfk_2` FOREIGN KEY (`airelinea_kod`) REFERENCES `airelinea` (`airelinea_kod`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hegaldia_ibfk_3` FOREIGN KEY (`zerb_kod`) REFERENCES `ostatua` (`zerb_kod`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hegaldia`
--

LOCK TABLES `hegaldia` WRITE;
/*!40000 ALTER TABLE `hegaldia` DISABLE KEYS */;
/*!40000 ALTER TABLE `hegaldia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `herrialdeak`
--

DROP TABLE IF EXISTS `herrialdeak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `herrialdeak` (
  `herri_kod` char(2) NOT NULL,
  `herrialdea` varchar(50) DEFAULT NULL,
  `bidai_id` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`herri_kod`),
  UNIQUE KEY `herri_kod` (`herri_kod`),
  KEY `bidai_id` (`bidai_id`),
  CONSTRAINT `herrialdeak_ibfk_1` FOREIGN KEY (`bidai_id`) REFERENCES `bidaia` (`bidai_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `herrialdeak`
--

LOCK TABLES `herrialdeak` WRITE;
/*!40000 ALTER TABLE `herrialdeak` DISABLE KEYS */;
INSERT INTO `herrialdeak` VALUES ('AR','ARGENTINA',NULL),('AT','AUSTRIA',NULL),('BA','CANADA',NULL),('BE','BÉLGICA',NULL),('BR','BRASIL',NULL),('CH','SUIZA',NULL),('CN','CHINA',NULL),('CU','CUBA',NULL),('CY','CHIPRE',NULL),('CZ','REPUBLICA CHECA',NULL),('DE','ALEMANIA',NULL),('DK','DINAMARCA',NULL),('EE','ESTONIA',NULL),('EG','EGIPTO',NULL),('ES','ESPAÑA',NULL),('FI','FINLANDIA',NULL),('FR','FRANCIA',NULL),('GB','REINO UNIDO',NULL),('GR','GRECIA',NULL),('GT','GUATEMALA',NULL),('HK','HONG-KONG',NULL),('HR','CROACIA',NULL),('HU','HUNGRIA',NULL),('ID','INDONESIA',NULL),('IE','IRLANDA',NULL),('IL','ISRAEL',NULL),('IN','INDIA',NULL),('IS','ISLANDIA',NULL),('IT','ITALIA',NULL),('JP','JAPÓN',NULL),('KE','KENIA',NULL),('LU','LUXEMBURGO',NULL),('MA','MARRUECOS',NULL),('MC','MÓNACO',NULL),('MT','MALTA',NULL),('MV','MALDIVAS',NULL),('MX','MEXICO',NULL),('NL','PAISES BAJOS',NULL),('NO','NORUEGA',NULL),('PA','PANAMÁ',NULL),('PE','PERÚ',NULL),('PL','POLONIA',NULL),('PR','PUERTO RICO',NULL),('PT','PORTUGAL',NULL),('QA','QATAR',NULL),('RO','RUMANIA',NULL),('RU','RUSIA',NULL),('SC','SEYCHELLES',NULL),('SE','SUECIA',NULL),('SG','SINGAPUR',NULL),('TH','TAILANDIA',NULL),('TN','TÚNEZ',NULL),('TR','TURQUIA',NULL),('TZ','TANZANIA',NULL),('US','ESTADOS UNIDOS',NULL),('VE','VENEZUELA',NULL),('VN','VIETNAM',NULL),('ZA','SUDÁFRICA',NULL);
/*!40000 ALTER TABLE `herrialdeak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `joan_etorria`
--

DROP TABLE IF EXISTS `joan_etorria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `joan_etorria` (
  `joanetorri_kod` varchar(7) NOT NULL,
  `itzulera_data` varchar(10) DEFAULT NULL,
  `itzulera_ordua` varchar(25) DEFAULT NULL,
  `buelta_iraupen` varchar(25) DEFAULT NULL,
  `buelta_hegal_kod` varchar(5) DEFAULT NULL,
  `airelinea_kod` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`joanetorri_kod`),
  UNIQUE KEY `joanetorri_kod` (`joanetorri_kod`),
  KEY `airelinea_kod` (`airelinea_kod`),
  CONSTRAINT `joan_etorria_ibfk_1` FOREIGN KEY (`airelinea_kod`) REFERENCES `airelinea` (`airelinea_kod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `joan_etorria`
--

LOCK TABLES `joan_etorria` WRITE;
/*!40000 ALTER TABLE `joan_etorria` DISABLE KEYS */;
/*!40000 ALTER TABLE `joan_etorria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `langile_kop`
--

DROP TABLE IF EXISTS `langile_kop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `langile_kop` (
  `langile_kod` char(2) NOT NULL,
  `deskribapena` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`langile_kod`),
  UNIQUE KEY `langile_kod` (`langile_kod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `langile_kop`
--

LOCK TABLES `langile_kop` WRITE;
/*!40000 ALTER TABLE `langile_kop` DISABLE KEYS */;
INSERT INTO `langile_kop` VALUES ('L1','5 gehienez (1-5 bitartean)'),('L2','10 gehienez (1-10 bitartean)'),('L3','20 gehienez (1-20 bitartean)');
/*!40000 ALTER TABLE `langile_kop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logela_mota`
--

DROP TABLE IF EXISTS `logela_mota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logela_mota` (
  `logela_kod` char(3) NOT NULL,
  `deskribapena` varchar(25) DEFAULT NULL,
  `zerb_kod` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`logela_kod`),
  UNIQUE KEY `logela_kod` (`logela_kod`),
  KEY `zerb_kod` (`zerb_kod`),
  CONSTRAINT `logela_mota_ibfk_1` FOREIGN KEY (`zerb_kod`) REFERENCES `ostatua` (`zerb_kod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logela_mota`
--

LOCK TABLES `logela_mota` WRITE;
/*!40000 ALTER TABLE `logela_mota` DISABLE KEYS */;
INSERT INTO `logela_mota` VALUES ('DB','Bikoitza',NULL),('DUI','Bikoitza, erabilpen indib',NULL),('SIN','Indibiduala',NULL),('TPL','Hirukoitza',NULL);
/*!40000 ALTER TABLE `logela_mota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ostatua`
--

DROP TABLE IF EXISTS `ostatua`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ostatua` (
  `zerb_kod` varchar(4) NOT NULL,
  `izena` varchar(25) DEFAULT NULL,
  `prezioa` int(11) DEFAULT NULL,
  `hiria` varchar(50) DEFAULT NULL,
  `sarrera_egun` varchar(10) DEFAULT NULL,
  `ireeta_egun` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`zerb_kod`),
  CONSTRAINT `ostatua_ibfk_1` FOREIGN KEY (`zerb_kod`) REFERENCES `zerbitzuak` (`zerb_kod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ostatua`
--

LOCK TABLES `ostatua` WRITE;
/*!40000 ALTER TABLE `ostatua` DISABLE KEYS */;
/*!40000 ALTER TABLE `ostatua` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zerbitzuak`
--

DROP TABLE IF EXISTS `zerbitzuak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `zerbitzuak` (
  `zerb_kod` varchar(4) NOT NULL,
  `bidai_id` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`zerb_kod`),
  UNIQUE KEY `zerb_kod` (`zerb_kod`),
  KEY `bidai_id` (`bidai_id`),
  CONSTRAINT `zerbitzuak_ibfk_1` FOREIGN KEY (`bidai_id`) REFERENCES `bidaia` (`bidai_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zerbitzuak`
--

LOCK TABLES `zerbitzuak` WRITE;
/*!40000 ALTER TABLE `zerbitzuak` DISABLE KEYS */;
/*!40000 ALTER TABLE `zerbitzuak` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-28 12:26:27
