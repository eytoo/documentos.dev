# Host: localhost  (Version 5.5.5-10.1.16-MariaDB)
# Date: 2017-06-09 19:48:45
# Generator: MySQL-Front 6.0  (Build 1.115)


#
# Structure for table "admins"
#

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `admin_nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_apellidos` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_estado` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_foto` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_admin_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "admins"
#

INSERT INTO `admins` VALUES (1,'2017-04-07 15:57:37','2017-04-07 15:57:37',NULL,'Cesar','Cueva Mejia','imarvdt@gmail.com','$2y$10$DV6e1S6q1PBCC4YLxBgsb.sgSjlRojtYGA2CiNwFKmg6Lkrb2upoy',1,'4VcQmUBlyPhIT74Py5rIVmd0nAjJOJVjqhde1Z9XAfCWvOJpow4vpc7z4QO7',''),(2,'2017-05-11 10:48:53','2017-05-11 10:48:53',NULL,'Luis Cruz','Cespedez','lcruz@cursania.com','$2y$10$sKatHrNs4D5amsJG7dtah.quO.905ED6Ilqv0F../tgwQM0OR5XQi',1,'','default');

#
# Structure for table "comentarios"
#

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `com_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `com_descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `com_tipo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_cont_id` int(11) NOT NULL,
  `com_estado` int(11) NOT NULL DEFAULT '0',
  `com_calificacion` double(8,2) NOT NULL DEFAULT '0.00',
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`com_id`),
  KEY `comentarios_com_parent_id_foreign` (`com_parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "comentarios"
#


#
# Structure for table "countries"
#

DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` int(10) unsigned NOT NULL,
  `capital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citizenship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_sub_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_decimals` int(11) DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso_3166_2` char(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `iso_3166_3` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `region_code` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sub_region_code` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `eea` tinyint(1) NOT NULL DEFAULT '0',
  `calling_code` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `countries_id_index` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "countries"
#

INSERT INTO `countries` VALUES (4,'Kabul','Afghan','004','afghani','AFN','pul','؋',2,'Islamic Republic of Afghanistan','AF','AFG','Afghanistan','142','034',0,'93','AF.png'),(8,'Tirana','Albanian','008','lek','ALL','(qindar (pl. qindarka))','Lek',2,'Republic of Albania','AL','ALB','Albania','150','039',0,'355','AL.png'),(10,'Antartica','of Antartica','010','','','','',2,'Antarctica','AQ','ATA','Antarctica','','',0,'672','AQ.png'),(12,'Algiers','Algerian','012','Algerian dinar','DZD','centime','DZD',2,'People’s Democratic Republic of Algeria','DZ','DZA','Algeria','002','015',0,'213','DZ.png'),(16,'Pago Pago','American Samoan','016','US dollar','USD','cent','$',2,'Territory of American','AS','ASM','American Samoa','009','061',0,'1','AS.png'),(20,'Andorra la Vella','Andorran','020','euro','EUR','cent','€',2,'Principality of Andorra','AD','AND','Andorra','150','039',0,'376','AD.png'),(24,'Luanda','Angolan','024','kwanza','AOA','cêntimo','Kz',2,'Republic of Angola','AO','AGO','Angola','002','017',0,'244','AO.png'),(28,'St John’s','of Antigua and Barbuda','028','East Caribbean dollar','XCD','cent','$',2,'Antigua and Barbuda','AG','ATG','Antigua and Barbuda','019','029',0,'1','AG.png'),(31,'Baku','Azerbaijani','031','Azerbaijani manat','AZN','kepik (inv.)','ман',2,'Republic of Azerbaijan','AZ','AZE','Azerbaijan','142','145',0,'994','AZ.png'),(32,'Buenos Aires','Argentinian','032','Argentine peso','ARS','centavo','$',2,'Argentine Republic','AR','ARG','Argentina','019','005',0,'54','AR.png'),(36,'Canberra','Australian','036','Australian dollar','AUD','cent','$',2,'Commonwealth of Australia','AU','AUS','Australia','009','053',0,'61','AU.png'),(40,'Vienna','Austrian','040','euro','EUR','cent','€',2,'Republic of Austria','AT','AUT','Austria','150','155',1,'43','AT.png'),(44,'Nassau','Bahamian','044','Bahamian dollar','BSD','cent','$',2,'Commonwealth of the Bahamas','BS','BHS','Bahamas','019','029',0,'1','BS.png'),(48,'Manama','Bahraini','048','Bahraini dinar','BHD','fils (inv.)','BHD',3,'Kingdom of Bahrain','BH','BHR','Bahrain','142','145',0,'973','BH.png'),(50,'Dhaka','Bangladeshi','050','taka (inv.)','BDT','poisha (inv.)','BDT',2,'People’s Republic of Bangladesh','BD','BGD','Bangladesh','142','034',0,'880','BD.png'),(51,'Yerevan','Armenian','051','dram (inv.)','AMD','luma','AMD',2,'Republic of Armenia','AM','ARM','Armenia','142','145',0,'374','AM.png'),(52,'Bridgetown','Barbadian','052','Barbados dollar','BBD','cent','$',2,'Barbados','BB','BRB','Barbados','019','029',0,'1','BB.png'),(56,'Brussels','Belgian','056','euro','EUR','cent','€',2,'Kingdom of Belgium','BE','BEL','Belgium','150','155',1,'32','BE.png'),(60,'Hamilton','Bermudian','060','Bermuda dollar','BMD','cent','$',2,'Bermuda','BM','BMU','Bermuda','019','021',0,'1','BM.png'),(64,'Thimphu','Bhutanese','064','ngultrum (inv.)','BTN','chhetrum (inv.)','BTN',2,'Kingdom of Bhutan','BT','BTN','Bhutan','142','034',0,'975','BT.png'),(68,'Sucre (BO1)','Bolivian','068','boliviano','BOB','centavo','$b',2,'Plurinational State of Bolivia','BO','BOL','Bolivia, Plurinational State of','019','005',0,'591','BO.png'),(70,'Sarajevo','of Bosnia and Herzegovina','070','convertible mark','BAM','fening','KM',2,'Bosnia and Herzegovina','BA','BIH','Bosnia and Herzegovina','150','039',0,'387','BA.png'),(72,'Gaborone','Botswanan','072','pula (inv.)','BWP','thebe (inv.)','P',2,'Republic of Botswana','BW','BWA','Botswana','002','018',0,'267','BW.png'),(74,'Bouvet island','of Bouvet island','074','','','','kr',2,'Bouvet Island','BV','BVT','Bouvet Island','','',0,'47','BV.png'),(76,'Brasilia','Brazilian','076','real (pl. reais)','BRL','centavo','R$',2,'Federative Republic of Brazil','BR','BRA','Brazil','019','005',0,'55','BR.png'),(84,'Belmopan','Belizean','084','Belize dollar','BZD','cent','BZ$',2,'Belize','BZ','BLZ','Belize','019','013',0,'501','BZ.png'),(86,'Diego Garcia','Changosian','086','US dollar','USD','cent','$',2,'British Indian Ocean Territory','IO','IOT','British Indian Ocean Territory','','',0,'246','IO.png'),(90,'Honiara','Solomon Islander','090','Solomon Islands dollar','SBD','cent','$',2,'Solomon Islands','SB','SLB','Solomon Islands','009','054',0,'677','SB.png'),(92,'Road Town','British Virgin Islander;','092','US dollar','USD','cent','$',2,'British Virgin Islands','VG','VGB','Virgin Islands, British','019','029',0,'1','VG.png'),(96,'Bandar Seri Begawan','Bruneian','096','Brunei dollar','BND','sen (inv.)','$',2,'Brunei Darussalam','BN','BRN','Brunei Darussalam','142','035',0,'673','BN.png'),(100,'Sofia','Bulgarian','100','lev (pl. leva)','BGN','stotinka','лв',2,'Republic of Bulgaria','BG','BGR','Bulgaria','150','151',1,'359','BG.png'),(104,'Yangon','Burmese','104','kyat','MMK','pya','K',2,'Union of Myanmar/','MM','MMR','Myanmar','142','035',0,'95','MM.png'),(108,'Bujumbura','Burundian','108','Burundi franc','BIF','centime','BIF',0,'Republic of Burundi','BI','BDI','Burundi','002','014',0,'257','BI.png'),(112,'Minsk','Belarusian','112','Belarusian rouble','BYR','kopek','p.',2,'Republic of Belarus','BY','BLR','Belarus','150','151',0,'375','BY.png'),(116,'Phnom Penh','Cambodian','116','riel','KHR','sen (inv.)','៛',2,'Kingdom of Cambodia','KH','KHM','Cambodia','142','035',0,'855','KH.png'),(120,'Yaoundé','Cameroonian','120','CFA franc (BEAC)','XAF','centime','FCF',0,'Republic of Cameroon','CM','CMR','Cameroon','002','017',0,'237','CM.png'),(124,'Ottawa','Canadian','124','Canadian dollar','CAD','cent','$',2,'Canada','CA','CAN','Canada','019','021',0,'1','CA.png'),(132,'Praia','Cape Verdean','132','Cape Verde escudo','CVE','centavo','CVE',2,'Republic of Cape Verde','CV','CPV','Cape Verde','002','011',0,'238','CV.png'),(136,'George Town','Caymanian','136','Cayman Islands dollar','KYD','cent','$',2,'Cayman Islands','KY','CYM','Cayman Islands','019','029',0,'1','KY.png'),(140,'Bangui','Central African','140','CFA franc (BEAC)','XAF','centime','CFA',0,'Central African Republic','CF','CAF','Central African Republic','002','017',0,'236','CF.png'),(144,'Colombo','Sri Lankan','144','Sri Lankan rupee','LKR','cent','₨',2,'Democratic Socialist Republic of Sri Lanka','LK','LKA','Sri Lanka','142','034',0,'94','LK.png'),(148,'N’Djamena','Chadian','148','CFA franc (BEAC)','XAF','centime','XAF',0,'Republic of Chad','TD','TCD','Chad','002','017',0,'235','TD.png'),(152,'Santiago','Chilean','152','Chilean peso','CLP','centavo','CLP',0,'Republic of Chile','CL','CHL','Chile','019','005',0,'56','CL.png'),(156,'Beijing','Chinese','156','renminbi-yuan (inv.)','CNY','jiao (10)','¥',2,'People’s Republic of China','CN','CHN','China','142','030',0,'86','CN.png'),(158,'Taipei','Taiwanese','158','new Taiwan dollar','TWD','fen (inv.)','NT$',2,'Republic of China, Taiwan (TW1)','TW','TWN','Taiwan, Province of China','142','030',0,'886','TW.png'),(162,'Flying Fish Cove','Christmas Islander','162','Australian dollar','AUD','cent','$',2,'Christmas Island Territory','CX','CXR','Christmas Island','','',0,'61','CX.png'),(166,'Bantam','Cocos Islander','166','Australian dollar','AUD','cent','$',2,'Territory of Cocos (Keeling) Islands','CC','CCK','Cocos (Keeling) Islands','','',0,'61','CC.png'),(170,'Santa Fe de Bogotá','Colombian','170','Colombian peso','COP','centavo','$',2,'Republic of Colombia','CO','COL','Colombia','019','005',0,'57','CO.png'),(174,'Moroni','Comorian','174','Comorian franc','KMF','','KMF',0,'Union of the Comoros','KM','COM','Comoros','002','014',0,'269','KM.png'),(175,'Mamoudzou','Mahorais','175','euro','EUR','cent','€',2,'Departmental Collectivity of Mayotte','YT','MYT','Mayotte','002','014',0,'262','YT.png'),(178,'Brazzaville','Congolese','178','CFA franc (BEAC)','XAF','centime','FCF',0,'Republic of the Congo','CG','COG','Congo','002','017',0,'242','CG.png'),(180,'Kinshasa','Congolese','180','Congolese franc','CDF','centime','CDF',2,'Democratic Republic of the Congo','CD','COD','Congo, the Democratic Republic of the','002','017',0,'243','CD.png'),(184,'Avarua','Cook Islander','184','New Zealand dollar','NZD','cent','$',2,'Cook Islands','CK','COK','Cook Islands','009','061',0,'682','CK.png'),(188,'San José','Costa Rican','188','Costa Rican colón (pl. colones)','CRC','céntimo','₡',2,'Republic of Costa Rica','CR','CRI','Costa Rica','019','013',0,'506','CR.png'),(191,'Zagreb','Croatian','191','kuna (inv.)','HRK','lipa (inv.)','kn',2,'Republic of Croatia','HR','HRV','Croatia','150','039',1,'385','HR.png'),(192,'Havana','Cuban','192','Cuban peso','CUP','centavo','₱',2,'Republic of Cuba','CU','CUB','Cuba','019','029',0,'53','CU.png'),(196,'Nicosia','Cypriot','196','euro','EUR','cent','CYP',2,'Republic of Cyprus','CY','CYP','Cyprus','142','145',1,'357','CY.png'),(203,'Prague','Czech','203','Czech koruna (pl. koruny)','CZK','halér','Kč',2,'Czech Republic','CZ','CZE','Czech Republic','150','151',1,'420','CZ.png'),(204,'Porto Novo (BJ1)','Beninese','204','CFA franc (BCEAO)','XOF','centime','XOF',0,'Republic of Benin','BJ','BEN','Benin','002','011',0,'229','BJ.png'),(208,'Copenhagen','Danish','208','Danish krone','DKK','øre (inv.)','kr',2,'Kingdom of Denmark','DK','DNK','Denmark','150','154',1,'45','DK.png'),(212,'Roseau','Dominican','212','East Caribbean dollar','XCD','cent','$',2,'Commonwealth of Dominica','DM','DMA','Dominica','019','029',0,'1','DM.png'),(214,'Santo Domingo','Dominican','214','Dominican peso','DOP','centavo','RD$',2,'Dominican Republic','DO','DOM','Dominican Republic','019','029',0,'1','DO.png'),(218,'Quito','Ecuadorian','218','US dollar','USD','cent','$',2,'Republic of Ecuador','EC','ECU','Ecuador','019','005',0,'593','EC.png'),(222,'San Salvador','Salvadoran','222','Salvadorian colón (pl. colones)','SVC','centavo','$',2,'Republic of El Salvador','SV','SLV','El Salvador','019','013',0,'503','SV.png'),(226,'Malabo','Equatorial Guinean','226','CFA franc (BEAC)','XAF','centime','FCF',2,'Republic of Equatorial Guinea','GQ','GNQ','Equatorial Guinea','002','017',0,'240','GQ.png'),(231,'Addis Ababa','Ethiopian','231','birr (inv.)','ETB','cent','ETB',2,'Federal Democratic Republic of Ethiopia','ET','ETH','Ethiopia','002','014',0,'251','ET.png'),(232,'Asmara','Eritrean','232','nakfa','ERN','cent','Nfk',2,'State of Eritrea','ER','ERI','Eritrea','002','014',0,'291','ER.png'),(233,'Tallinn','Estonian','233','euro','EUR','cent','kr',2,'Republic of Estonia','EE','EST','Estonia','150','154',1,'372','EE.png'),(234,'Tórshavn','Faeroese','234','Danish krone','DKK','øre (inv.)','kr',2,'Faeroe Islands','FO','FRO','Faroe Islands','150','154',0,'298','FO.png'),(238,'Stanley','Falkland Islander','238','Falkland Islands pound','FKP','new penny','£',2,'Falkland Islands','FK','FLK','Falkland Islands (Malvinas)','019','005',0,'500','FK.png'),(239,'King Edward Point (Grytviken)','of South Georgia and the South Sandwich Islands','239','','','','£',2,'South Georgia and the South Sandwich Islands','GS','SGS','South Georgia and the South Sandwich Islands','','',0,'44','GS.png'),(242,'Suva','Fijian','242','Fiji dollar','FJD','cent','$',2,'Republic of Fiji','FJ','FJI','Fiji','009','054',0,'679','FJ.png'),(246,'Helsinki','Finnish','246','euro','EUR','cent','€',2,'Republic of Finland','FI','FIN','Finland','150','154',1,'358','FI.png'),(248,'Mariehamn','Åland Islander','248','euro','EUR','cent',NULL,NULL,'Åland Islands','AX','ALA','Åland Islands','150','154',0,'358',NULL),(250,'Paris','French','250','euro','EUR','cent','€',2,'French Republic','FR','FRA','France','150','155',1,'33','FR.png'),(254,'Cayenne','Guianese','254','euro','EUR','cent','€',2,'French Guiana','GF','GUF','French Guiana','019','005',0,'594','GF.png'),(258,'Papeete','Polynesian','258','CFP franc','XPF','centime','XPF',0,'French Polynesia','PF','PYF','French Polynesia','009','061',0,'689','PF.png'),(260,'Port-aux-Francais','of French Southern and Antarctic Lands','260','euro','EUR','cent','€',2,'French Southern and Antarctic Lands','TF','ATF','French Southern Territories','','',0,'33','TF.png'),(262,'Djibouti','Djiboutian','262','Djibouti franc','DJF','','DJF',0,'Republic of Djibouti','DJ','DJI','Djibouti','002','014',0,'253','DJ.png'),(266,'Libreville','Gabonese','266','CFA franc (BEAC)','XAF','centime','FCF',0,'Gabonese Republic','GA','GAB','Gabon','002','017',0,'241','GA.png'),(268,'Tbilisi','Georgian','268','lari','GEL','tetri (inv.)','GEL',2,'Georgia','GE','GEO','Georgia','142','145',0,'995','GE.png'),(270,'Banjul','Gambian','270','dalasi (inv.)','GMD','butut','D',2,'Republic of the Gambia','GM','GMB','Gambia','002','011',0,'220','GM.png'),(275,NULL,'Palestinian','275',NULL,NULL,NULL,'₪',2,NULL,'PS','PSE','Palestinian Territory, Occupied','142','145',0,'970','PS.png'),(276,'Berlin','German','276','euro','EUR','cent','€',2,'Federal Republic of Germany','DE','DEU','Germany','150','155',1,'49','DE.png'),(288,'Accra','Ghanaian','288','Ghana cedi','GHS','pesewa','¢',2,'Republic of Ghana','GH','GHA','Ghana','002','011',0,'233','GH.png'),(292,'Gibraltar','Gibraltarian','292','Gibraltar pound','GIP','penny','£',2,'Gibraltar','GI','GIB','Gibraltar','150','039',0,'350','GI.png'),(296,'Tarawa','Kiribatian','296','Australian dollar','AUD','cent','$',2,'Republic of Kiribati','KI','KIR','Kiribati','009','057',0,'686','KI.png'),(300,'Athens','Greek','300','euro','EUR','cent','€',2,'Hellenic Republic','GR','GRC','Greece','150','039',1,'30','GR.png'),(304,'Nuuk','Greenlander','304','Danish krone','DKK','øre (inv.)','kr',2,'Greenland','GL','GRL','Greenland','019','021',0,'299','GL.png'),(308,'St George’s','Grenadian','308','East Caribbean dollar','XCD','cent','$',2,'Grenada','GD','GRD','Grenada','019','029',0,'1','GD.png'),(312,'Basse Terre','Guadeloupean','312','euro','EUR ','cent','€',2,'Guadeloupe','GP','GLP','Guadeloupe','019','029',0,'590','GP.png'),(316,'Agaña (Hagåtña)','Guamanian','316','US dollar','USD','cent','$',2,'Territory of Guam','GU','GUM','Guam','009','057',0,'1','GU.png'),(320,'Guatemala City','Guatemalan','320','quetzal (pl. quetzales)','GTQ','centavo','Q',2,'Republic of Guatemala','GT','GTM','Guatemala','019','013',0,'502','GT.png'),(324,'Conakry','Guinean','324','Guinean franc','GNF','','GNF',0,'Republic of Guinea','GN','GIN','Guinea','002','011',0,'224','GN.png'),(328,'Georgetown','Guyanese','328','Guyana dollar','GYD','cent','$',2,'Cooperative Republic of Guyana','GY','GUY','Guyana','019','005',0,'592','GY.png'),(332,'Port-au-Prince','Haitian','332','gourde','HTG','centime','G',2,'Republic of Haiti','HT','HTI','Haiti','019','029',0,'509','HT.png'),(334,'Territory of Heard Island and McDonald Islands','of Territory of Heard Island and McDonald Islands','334','','','','$',2,'Territory of Heard Island and McDonald Islands','HM','HMD','Heard Island and McDonald Islands','','',0,'61','HM.png'),(336,'Vatican City','of the Holy See/of the Vatican','336','euro','EUR','cent','€',2,'the Holy See/ Vatican City State','VA','VAT','Holy See (Vatican City State)','150','039',0,'39','VA.png'),(340,'Tegucigalpa','Honduran','340','lempira','HNL','centavo','L',2,'Republic of Honduras','HN','HND','Honduras','019','013',0,'504','HN.png'),(344,'(HK3)','Hong Kong Chinese','344','Hong Kong dollar','HKD','cent','$',2,'Hong Kong Special Administrative Region of the People’s Republic of China (HK2)','HK','HKG','Hong Kong','142','030',0,'852','HK.png'),(348,'Budapest','Hungarian','348','forint (inv.)','HUF','(fillér (inv.))','Ft',2,'Republic of Hungary','HU','HUN','Hungary','150','151',1,'36','HU.png'),(352,'Reykjavik','Icelander','352','króna (pl. krónur)','ISK','','kr',0,'Republic of Iceland','IS','ISL','Iceland','150','154',1,'354','IS.png'),(356,'New Delhi','Indian','356','Indian rupee','INR','paisa','₹',2,'Republic of India','IN','IND','India','142','034',0,'91','IN.png'),(360,'Jakarta','Indonesian','360','Indonesian rupiah (inv.)','IDR','sen (inv.)','Rp',2,'Republic of Indonesia','ID','IDN','Indonesia','142','035',0,'62','ID.png'),(364,'Tehran','Iranian','364','Iranian rial','IRR','(dinar) (IR1)','﷼',2,'Islamic Republic of Iran','IR','IRN','Iran, Islamic Republic of','142','034',0,'98','IR.png'),(368,'Baghdad','Iraqi','368','Iraqi dinar','IQD','fils (inv.)','IQD',3,'Republic of Iraq','IQ','IRQ','Iraq','142','145',0,'964','IQ.png'),(372,'Dublin','Irish','372','euro','EUR','cent','€',2,'Ireland (IE1)','IE','IRL','Ireland','150','154',1,'353','IE.png'),(376,'(IL1)','Israeli','376','shekel','ILS','agora','₪',2,'State of Israel','IL','ISR','Israel','142','145',0,'972','IL.png'),(380,'Rome','Italian','380','euro','EUR','cent','€',2,'Italian Republic','IT','ITA','Italy','150','039',1,'39','IT.png'),(384,'Yamoussoukro (CI1)','Ivorian','384','CFA franc (BCEAO)','XOF','centime','XOF',0,'Republic of Côte d’Ivoire','CI','CIV','Côte d\'Ivoire','002','011',0,'225','CI.png'),(388,'Kingston','Jamaican','388','Jamaica dollar','JMD','cent','$',2,'Jamaica','JM','JAM','Jamaica','019','029',0,'1','JM.png'),(392,'Tokyo','Japanese','392','yen (inv.)','JPY','(sen (inv.)) (JP1)','¥',0,'Japan','JP','JPN','Japan','142','030',0,'81','JP.png'),(398,'Astana','Kazakh','398','tenge (inv.)','KZT','tiyn','лв',2,'Republic of Kazakhstan','KZ','KAZ','Kazakhstan','142','143',0,'7','KZ.png'),(400,'Amman','Jordanian','400','Jordanian dinar','JOD','100 qirsh','JOD',2,'Hashemite Kingdom of Jordan','JO','JOR','Jordan','142','145',0,'962','JO.png'),(404,'Nairobi','Kenyan','404','Kenyan shilling','KES','cent','KES',2,'Republic of Kenya','KE','KEN','Kenya','002','014',0,'254','KE.png'),(408,'Pyongyang','North Korean','408','North Korean won (inv.)','KPW','chun (inv.)','₩',2,'Democratic People’s Republic of Korea','KP','PRK','Korea, Democratic People\'s Republic of','142','030',0,'850','KP.png'),(410,'Seoul','South Korean','410','South Korean won (inv.)','KRW','(chun (inv.))','₩',0,'Republic of Korea','KR','KOR','Korea, Republic of','142','030',0,'82','KR.png'),(414,'Kuwait City','Kuwaiti','414','Kuwaiti dinar','KWD','fils (inv.)','KWD',3,'State of Kuwait','KW','KWT','Kuwait','142','145',0,'965','KW.png'),(417,'Bishkek','Kyrgyz','417','som','KGS','tyiyn','лв',2,'Kyrgyz Republic','KG','KGZ','Kyrgyzstan','142','143',0,'996','KG.png'),(418,'Vientiane','Lao','418','kip (inv.)','LAK','(at (inv.))','₭',0,'Lao People’s Democratic Republic','LA','LAO','Lao People\'s Democratic Republic','142','035',0,'856','LA.png'),(422,'Beirut','Lebanese','422','Lebanese pound','LBP','(piastre)','£',2,'Lebanese Republic','LB','LBN','Lebanon','142','145',0,'961','LB.png'),(426,'Maseru','Basotho','426','loti (pl. maloti)','LSL','sente','L',2,'Kingdom of Lesotho','LS','LSO','Lesotho','002','018',0,'266','LS.png'),(428,'Riga','Latvian','428','euro','EUR','cent','Ls',2,'Republic of Latvia','LV','LVA','Latvia','150','154',1,'371','LV.png'),(430,'Monrovia','Liberian','430','Liberian dollar','LRD','cent','$',2,'Republic of Liberia','LR','LBR','Liberia','002','011',0,'231','LR.png'),(434,'Tripoli','Libyan','434','Libyan dinar','LYD','dirham','LYD',3,'Socialist People’s Libyan Arab Jamahiriya','LY','LBY','Libya','002','015',0,'218','LY.png'),(438,'Vaduz','Liechtensteiner','438','Swiss franc','CHF','centime','CHF',2,'Principality of Liechtenstein','LI','LIE','Liechtenstein','150','155',1,'423','LI.png'),(440,'Vilnius','Lithuanian','440','euro','EUR','cent','Lt',2,'Republic of Lithuania','LT','LTU','Lithuania','150','154',1,'370','LT.png'),(442,'Luxembourg','Luxembourger','442','euro','EUR','cent','€',2,'Grand Duchy of Luxembourg','LU','LUX','Luxembourg','150','155',1,'352','LU.png'),(446,'Macao (MO3)','Macanese','446','pataca','MOP','avo','MOP',2,'Macao Special Administrative Region of the People’s Republic of China (MO2)','MO','MAC','Macao','142','030',0,'853','MO.png'),(450,'Antananarivo','Malagasy','450','ariary','MGA','iraimbilanja (inv.)','MGA',2,'Republic of Madagascar','MG','MDG','Madagascar','002','014',0,'261','MG.png'),(454,'Lilongwe','Malawian','454','Malawian kwacha (inv.)','MWK','tambala (inv.)','MK',2,'Republic of Malawi','MW','MWI','Malawi','002','014',0,'265','MW.png'),(458,'Kuala Lumpur (MY1)','Malaysian','458','ringgit (inv.)','MYR','sen (inv.)','RM',2,'Malaysia','MY','MYS','Malaysia','142','035',0,'60','MY.png'),(462,'Malé','Maldivian','462','rufiyaa','MVR','laari (inv.)','Rf',2,'Republic of Maldives','MV','MDV','Maldives','142','034',0,'960','MV.png'),(466,'Bamako','Malian','466','CFA franc (BCEAO)','XOF','centime','XOF',0,'Republic of Mali','ML','MLI','Mali','002','011',0,'223','ML.png'),(470,'Valletta','Maltese','470','euro','EUR','cent','MTL',2,'Republic of Malta','MT','MLT','Malta','150','039',1,'356','MT.png'),(474,'Fort-de-France','Martinican','474','euro','EUR','cent','€',2,'Martinique','MQ','MTQ','Martinique','019','029',0,'596','MQ.png'),(478,'Nouakchott','Mauritanian','478','ouguiya','MRO','khoum','UM',2,'Islamic Republic of Mauritania','MR','MRT','Mauritania','002','011',0,'222','MR.png'),(480,'Port Louis','Mauritian','480','Mauritian rupee','MUR','cent','₨',2,'Republic of Mauritius','MU','MUS','Mauritius','002','014',0,'230','MU.png'),(484,'Mexico City','Mexican','484','Mexican peso','MXN','centavo','$',2,'United Mexican States','MX','MEX','Mexico','019','013',0,'52','MX.png'),(492,'Monaco','Monegasque','492','euro','EUR','cent','€',2,'Principality of Monaco','MC','MCO','Monaco','150','155',0,'377','MC.png'),(496,'Ulan Bator','Mongolian','496','tugrik','MNT','möngö (inv.)','₮',2,'Mongolia','MN','MNG','Mongolia','142','030',0,'976','MN.png'),(498,'Chisinau','Moldovan','498','Moldovan leu (pl. lei)','MDL','ban','MDL',2,'Republic of Moldova','MD','MDA','Moldova, Republic of','150','151',0,'373','MD.png'),(499,'Podgorica','Montenegrin','499','euro','EUR','cent','€',2,'Montenegro','ME','MNE','Montenegro','150','039',0,'382','ME.png'),(500,'Plymouth (MS2)','Montserratian','500','East Caribbean dollar','XCD','cent','$',2,'Montserrat','MS','MSR','Montserrat','019','029',0,'1','MS.png'),(504,'Rabat','Moroccan','504','Moroccan dirham','MAD','centime','MAD',2,'Kingdom of Morocco','MA','MAR','Morocco','002','015',0,'212','MA.png'),(508,'Maputo','Mozambican','508','metical','MZN','centavo','MT',2,'Republic of Mozambique','MZ','MOZ','Mozambique','002','014',0,'258','MZ.png'),(512,'Muscat','Omani','512','Omani rial','OMR','baiza','﷼',3,'Sultanate of Oman','OM','OMN','Oman','142','145',0,'968','OM.png'),(516,'Windhoek','Namibian','516','Namibian dollar','NAD','cent','$',2,'Republic of Namibia','NA','NAM','Namibia','002','018',0,'264','NA.png'),(520,'Yaren','Nauruan','520','Australian dollar','AUD','cent','$',2,'Republic of Nauru','NR','NRU','Nauru','009','057',0,'674','NR.png'),(524,'Kathmandu','Nepalese','524','Nepalese rupee','NPR','paisa (inv.)','₨',2,'Nepal','NP','NPL','Nepal','142','034',0,'977','NP.png'),(528,'Amsterdam (NL2)','Dutch','528','euro','EUR','cent','€',2,'Kingdom of the Netherlands','NL','NLD','Netherlands','150','155',1,'31','NL.png'),(531,'Willemstad','Curaçaoan','531','Netherlands Antillean guilder (CW1)','ANG','cent',NULL,NULL,'Curaçao','CW','CUW','Curaçao','019','029',0,'599',NULL),(533,'Oranjestad','Aruban','533','Aruban guilder','AWG','cent','ƒ',2,'Aruba','AW','ABW','Aruba','019','029',0,'297','AW.png'),(534,'Philipsburg','Sint Maartener','534','Netherlands Antillean guilder (SX1)','ANG','cent',NULL,NULL,'Sint Maarten','SX','SXM','Sint Maarten (Dutch part)','019','029',0,'721',NULL),(535,NULL,'of Bonaire, Sint Eustatius and Saba','535','US dollar','USD','cent',NULL,NULL,NULL,'BQ','BES','Bonaire, Sint Eustatius and Saba','019','029',0,'599',NULL),(540,'Nouméa','New Caledonian','540','CFP franc','XPF','centime','XPF',0,'New Caledonia','NC','NCL','New Caledonia','009','054',0,'687','NC.png'),(548,'Port Vila','Vanuatuan','548','vatu (inv.)','VUV','','Vt',0,'Republic of Vanuatu','VU','VUT','Vanuatu','009','054',0,'678','VU.png'),(554,'Wellington','New Zealander','554','New Zealand dollar','NZD','cent','$',2,'New Zealand','NZ','NZL','New Zealand','009','053',0,'64','NZ.png'),(558,'Managua','Nicaraguan','558','córdoba oro','NIO','centavo','C$',2,'Republic of Nicaragua','NI','NIC','Nicaragua','019','013',0,'505','NI.png'),(562,'Niamey','Nigerien','562','CFA franc (BCEAO)','XOF','centime','XOF',0,'Republic of Niger','NE','NER','Niger','002','011',0,'227','NE.png'),(566,'Abuja','Nigerian','566','naira (inv.)','NGN','kobo (inv.)','₦',2,'Federal Republic of Nigeria','NG','NGA','Nigeria','002','011',0,'234','NG.png'),(570,'Alofi','Niuean','570','New Zealand dollar','NZD','cent','$',2,'Niue','NU','NIU','Niue','009','061',0,'683','NU.png'),(574,'Kingston','Norfolk Islander','574','Australian dollar','AUD','cent','$',2,'Territory of Norfolk Island','NF','NFK','Norfolk Island','009','053',0,'672','NF.png'),(578,'Oslo','Norwegian','578','Norwegian krone (pl. kroner)','NOK','øre (inv.)','kr',2,'Kingdom of Norway','NO','NOR','Norway','150','154',1,'47','NO.png'),(580,'Saipan','Northern Mariana Islander','580','US dollar','USD','cent','$',2,'Commonwealth of the Northern Mariana Islands','MP','MNP','Northern Mariana Islands','009','057',0,'1','MP.png'),(581,'United States Minor Outlying Islands','of United States Minor Outlying Islands','581','US dollar','USD','cent','$',2,'United States Minor Outlying Islands','UM','UMI','United States Minor Outlying Islands','','',0,'1','UM.png'),(583,'Palikir','Micronesian','583','US dollar','USD','cent','$',2,'Federated States of Micronesia','FM','FSM','Micronesia, Federated States of','009','057',0,'691','FM.png'),(584,'Majuro','Marshallese','584','US dollar','USD','cent','$',2,'Republic of the Marshall Islands','MH','MHL','Marshall Islands','009','057',0,'692','MH.png'),(585,'Melekeok','Palauan','585','US dollar','USD','cent','$',2,'Republic of Palau','PW','PLW','Palau','009','057',0,'680','PW.png'),(586,'Islamabad','Pakistani','586','Pakistani rupee','PKR','paisa','₨',2,'Islamic Republic of Pakistan','PK','PAK','Pakistan','142','034',0,'92','PK.png'),(591,'Panama City','Panamanian','591','balboa','PAB','centésimo','B/.',2,'Republic of Panama','PA','PAN','Panama','019','013',0,'507','PA.png'),(598,'Port Moresby','Papua New Guinean','598','kina (inv.)','PGK','toea (inv.)','PGK',2,'Independent State of Papua New Guinea','PG','PNG','Papua New Guinea','009','054',0,'675','PG.png'),(600,'Asunción','Paraguayan','600','guaraní','PYG','céntimo','Gs',0,'Republic of Paraguay','PY','PRY','Paraguay','019','005',0,'595','PY.png'),(604,'Lima','Peruvian','604','new sol','PEN','céntimo','S/',2,'Republic of Peru','PE','PER','Peru','019','005',0,'51','PE.png'),(608,'Manila','Filipino','608','Philippine peso','PHP','centavo','Php',2,'Republic of the Philippines','PH','PHL','Philippines','142','035',0,'63','PH.png'),(612,'Adamstown','Pitcairner','612','New Zealand dollar','NZD','cent','$',2,'Pitcairn Islands','PN','PCN','Pitcairn','009','061',0,'649','PN.png'),(616,'Warsaw','Polish','616','zloty','PLN','grosz (pl. groszy)','zł',2,'Republic of Poland','PL','POL','Poland','150','151',1,'48','PL.png'),(620,'Lisbon','Portuguese','620','euro','EUR','cent','€',2,'Portuguese Republic','PT','PRT','Portugal','150','039',1,'351','PT.png'),(624,'Bissau','Guinea-Bissau national','624','CFA franc (BCEAO)','XOF','centime','XOF',0,'Republic of Guinea-Bissau','GW','GNB','Guinea-Bissau','002','011',0,'245','GW.png'),(626,'Dili','East Timorese','626','US dollar','USD','cent','$',2,'Democratic Republic of East Timor','TL','TLS','Timor-Leste','142','035',0,'670','TL.png'),(630,'San Juan','Puerto Rican','630','US dollar','USD','cent','$',2,'Commonwealth of Puerto Rico','PR','PRI','Puerto Rico','019','029',0,'1','PR.png'),(634,'Doha','Qatari','634','Qatari riyal','QAR','dirham','﷼',2,'State of Qatar','QA','QAT','Qatar','142','145',0,'974','QA.png'),(638,'Saint-Denis','Reunionese','638','euro','EUR','cent','€',2,'Réunion','RE','REU','Réunion','002','014',0,'262','RE.png'),(642,'Bucharest','Romanian','642','Romanian leu (pl. lei)','RON','ban (pl. bani)','lei',2,'Romania','RO','ROU','Romania','150','151',1,'40','RO.png'),(643,'Moscow','Russian','643','Russian rouble','RUB','kopek','руб',2,'Russian Federation','RU','RUS','Russian Federation','150','151',0,'7','RU.png'),(646,'Kigali','Rwandan; Rwandese','646','Rwandese franc','RWF','centime','RWF',0,'Republic of Rwanda','RW','RWA','Rwanda','002','014',0,'250','RW.png'),(652,'Gustavia','of Saint Barthélemy','652','euro','EUR','cent',NULL,NULL,'Collectivity of Saint Barthélemy','BL','BLM','Saint Barthélemy','019','029',0,'590',NULL),(654,'Jamestown','Saint Helenian','654','Saint Helena pound','SHP','penny','£',2,'Saint Helena, Ascension and Tristan da Cunha','SH','SHN','Saint Helena, Ascension and Tristan da Cunha','002','011',0,'290','SH.png'),(659,'Basseterre','Kittsian; Nevisian','659','East Caribbean dollar','XCD','cent','$',2,'Federation of Saint Kitts and Nevis','KN','KNA','Saint Kitts and Nevis','019','029',0,'1','KN.png'),(660,'The Valley','Anguillan','660','East Caribbean dollar','XCD','cent','$',2,'Anguilla','AI','AIA','Anguilla','019','029',0,'1','AI.png'),(662,'Castries','Saint Lucian','662','East Caribbean dollar','XCD','cent','$',2,'Saint Lucia','LC','LCA','Saint Lucia','019','029',0,'1','LC.png'),(663,'Marigot','of Saint Martin','663','euro','EUR','cent',NULL,NULL,'Collectivity of Saint Martin','MF','MAF','Saint Martin (French part)','019','029',0,'590',NULL),(666,'Saint-Pierre','St-Pierrais; Miquelonnais','666','euro','EUR','cent','€',2,'Territorial Collectivity of Saint Pierre and Miquelon','PM','SPM','Saint Pierre and Miquelon','019','021',0,'508','PM.png'),(670,'Kingstown','Vincentian','670','East Caribbean dollar','XCD','cent','$',2,'Saint Vincent and the Grenadines','VC','VCT','Saint Vincent and the Grenadines','019','029',0,'1','VC.png'),(674,'San Marino','San Marinese','674','euro','EUR ','cent','€',2,'Republic of San Marino','SM','SMR','San Marino','150','039',0,'378','SM.png'),(678,'São Tomé','São Toméan','678','dobra','STD','centavo','Db',2,'Democratic Republic of São Tomé and Príncipe','ST','STP','Sao Tome and Principe','002','017',0,'239','ST.png'),(682,'Riyadh','Saudi Arabian','682','riyal','SAR','halala','﷼',2,'Kingdom of Saudi Arabia','SA','SAU','Saudi Arabia','142','145',0,'966','SA.png'),(686,'Dakar','Senegalese','686','CFA franc (BCEAO)','XOF','centime','XOF',0,'Republic of Senegal','SN','SEN','Senegal','002','011',0,'221','SN.png'),(688,'Belgrade','Serb','688','Serbian dinar','RSD','para (inv.)',NULL,NULL,'Republic of Serbia','RS','SRB','Serbia','150','039',0,'381',NULL),(690,'Victoria','Seychellois','690','Seychelles rupee','SCR','cent','₨',2,'Republic of Seychelles','SC','SYC','Seychelles','002','014',0,'248','SC.png'),(694,'Freetown','Sierra Leonean','694','leone','SLL','cent','Le',2,'Republic of Sierra Leone','SL','SLE','Sierra Leone','002','011',0,'232','SL.png'),(702,'Singapore','Singaporean','702','Singapore dollar','SGD','cent','$',2,'Republic of Singapore','SG','SGP','Singapore','142','035',0,'65','SG.png'),(703,'Bratislava','Slovak','703','euro','EUR','cent','Sk',2,'Slovak Republic','SK','SVK','Slovakia','150','151',1,'421','SK.png'),(704,'Hanoi','Vietnamese','704','dong','VND','(10 hào','₫',2,'Socialist Republic of Vietnam','VN','VNM','Viet Nam','142','035',0,'84','VN.png'),(705,'Ljubljana','Slovene','705','euro','EUR','cent','€',2,'Republic of Slovenia','SI','SVN','Slovenia','150','039',1,'386','SI.png'),(706,'Mogadishu','Somali','706','Somali shilling','SOS','cent','S',2,'Somali Republic','SO','SOM','Somalia','002','014',0,'252','SO.png'),(710,'Pretoria (ZA1)','South African','710','rand','ZAR','cent','R',2,'Republic of South Africa','ZA','ZAF','South Africa','002','018',0,'27','ZA.png'),(716,'Harare','Zimbabwean','716','Zimbabwe dollar (ZW1)','ZWL','cent','Z$',2,'Republic of Zimbabwe','ZW','ZWE','Zimbabwe','002','014',0,'263','ZW.png'),(724,'Madrid','Spaniard','724','euro','EUR','cent','€',2,'Kingdom of Spain','ES','ESP','Spain','150','039',1,'34','ES.png'),(728,'Juba','South Sudanese','728','South Sudanese pound','SSP','piaster',NULL,NULL,'Republic of South Sudan','SS','SSD','South Sudan','002','015',0,'211',NULL),(729,'Khartoum','Sudanese','729','Sudanese pound','SDG','piastre',NULL,NULL,'Republic of the Sudan','SD','SDN','Sudan','002','015',0,'249',NULL),(732,'Al aaiun','Sahrawi','732','Moroccan dirham','MAD','centime','MAD',2,'Western Sahara','EH','ESH','Western Sahara','002','015',0,'212','EH.png'),(740,'Paramaribo','Surinamese','740','Surinamese dollar','SRD','cent','$',2,'Republic of Suriname','SR','SUR','Suriname','019','005',0,'597','SR.png'),(744,'Longyearbyen','of Svalbard','744','Norwegian krone (pl. kroner)','NOK','øre (inv.)','kr',2,'Svalbard and Jan Mayen','SJ','SJM','Svalbard and Jan Mayen','150','154',0,'47','SJ.png'),(748,'Mbabane','Swazi','748','lilangeni','SZL','cent','SZL',2,'Kingdom of Swaziland','SZ','SWZ','Swaziland','002','018',0,'268','SZ.png'),(752,'Stockholm','Swedish','752','krona (pl. kronor)','SEK','öre (inv.)','kr',2,'Kingdom of Sweden','SE','SWE','Sweden','150','154',1,'46','SE.png'),(756,'Berne','Swiss','756','Swiss franc','CHF','centime','CHF',2,'Swiss Confederation','CH','CHE','Switzerland','150','155',1,'41','CH.png'),(760,'Damascus','Syrian','760','Syrian pound','SYP','piastre','£',2,'Syrian Arab Republic','SY','SYR','Syrian Arab Republic','142','145',0,'963','SY.png'),(762,'Dushanbe','Tajik','762','somoni','TJS','diram','TJS',2,'Republic of Tajikistan','TJ','TJK','Tajikistan','142','143',0,'992','TJ.png'),(764,'Bangkok','Thai','764','baht (inv.)','THB','satang (inv.)','฿',2,'Kingdom of Thailand','TH','THA','Thailand','142','035',0,'66','TH.png'),(768,'Lomé','Togolese','768','CFA franc (BCEAO)','XOF','centime','XOF',0,'Togolese Republic','TG','TGO','Togo','002','011',0,'228','TG.png'),(772,'(TK2)','Tokelauan','772','New Zealand dollar','NZD','cent','$',2,'Tokelau','TK','TKL','Tokelau','009','061',0,'690','TK.png'),(776,'Nuku’alofa','Tongan','776','pa’anga (inv.)','TOP','seniti (inv.)','T$',2,'Kingdom of Tonga','TO','TON','Tonga','009','061',0,'676','TO.png'),(780,'Port of Spain','Trinidadian; Tobagonian','780','Trinidad and Tobago dollar','TTD','cent','TT$',2,'Republic of Trinidad and Tobago','TT','TTO','Trinidad and Tobago','019','029',0,'1','TT.png'),(784,'Abu Dhabi','Emirian','784','UAE dirham','AED','fils (inv.)','AED',2,'United Arab Emirates','AE','ARE','United Arab Emirates','142','145',0,'971','AE.png'),(788,'Tunis','Tunisian','788','Tunisian dinar','TND','millime','TND',3,'Republic of Tunisia','TN','TUN','Tunisia','002','015',0,'216','TN.png'),(792,'Ankara','Turk','792','Turkish lira (inv.)','TRY','kurus (inv.)','₺',2,'Republic of Turkey','TR','TUR','Turkey','142','145',0,'90','TR.png'),(795,'Ashgabat','Turkmen','795','Turkmen manat (inv.)','TMT','tenge (inv.)','m',2,'Turkmenistan','TM','TKM','Turkmenistan','142','143',0,'993','TM.png'),(796,'Cockburn Town','Turks and Caicos Islander','796','US dollar','USD','cent','$',2,'Turks and Caicos Islands','TC','TCA','Turks and Caicos Islands','019','029',0,'1','TC.png'),(798,'Funafuti','Tuvaluan','798','Australian dollar','AUD','cent','$',2,'Tuvalu','TV','TUV','Tuvalu','009','061',0,'688','TV.png'),(800,'Kampala','Ugandan','800','Uganda shilling','UGX','cent','UGX',0,'Republic of Uganda','UG','UGA','Uganda','002','014',0,'256','UG.png'),(804,'Kiev','Ukrainian','804','hryvnia','UAH','kopiyka','₴',2,'Ukraine','UA','UKR','Ukraine','150','151',0,'380','UA.png'),(807,'Skopje','of the former Yugoslav Republic of Macedonia','807','denar (pl. denars)','MKD','deni (inv.)','ден',2,'the former Yugoslav Republic of Macedonia','MK','MKD','Macedonia, the former Yugoslav Republic of','150','039',0,'389','MK.png'),(818,'Cairo','Egyptian','818','Egyptian pound','EGP','piastre','£',2,'Arab Republic of Egypt','EG','EGY','Egypt','002','015',0,'20','EG.png'),(826,'London','British','826','pound sterling','GBP','penny (pl. pence)','£',2,'United Kingdom of Great Britain and Northern Ireland','GB','GBR','United Kingdom','150','154',1,'44','GB.png'),(831,'St Peter Port','of Guernsey','831','Guernsey pound (GG2)','GGP (GG2)','penny (pl. pence)',NULL,NULL,'Bailiwick of Guernsey','GG','GGY','Guernsey','150','154',0,'44',NULL),(832,'St Helier','of Jersey','832','Jersey pound (JE2)','JEP (JE2)','penny (pl. pence)',NULL,NULL,'Bailiwick of Jersey','JE','JEY','Jersey','150','154',0,'44',NULL),(833,'Douglas','Manxman; Manxwoman','833','Manx pound (IM2)','IMP (IM2)','penny (pl. pence)',NULL,NULL,'Isle of Man','IM','IMN','Isle of Man','150','154',0,'44',NULL),(834,'Dodoma (TZ1)','Tanzanian','834','Tanzanian shilling','TZS','cent','TZS',2,'United Republic of Tanzania','TZ','TZA','Tanzania, United Republic of','002','014',0,'255','TZ.png'),(840,'Washington DC','American','840','US dollar','USD','cent','$',2,'United States of America','US','USA','United States','019','021',0,'1','US.png'),(850,'Charlotte Amalie','US Virgin Islander','850','US dollar','USD','cent','$',2,'United States Virgin Islands','VI','VIR','Virgin Islands, U.S.','019','029',0,'1','VI.png'),(854,'Ouagadougou','Burkinabe','854','CFA franc (BCEAO)','XOF','centime','XOF',0,'Burkina Faso','BF','BFA','Burkina Faso','002','011',0,'226','BF.png'),(858,'Montevideo','Uruguayan','858','Uruguayan peso','UYU','centésimo','$U',0,'Eastern Republic of Uruguay','UY','URY','Uruguay','019','005',0,'598','UY.png'),(860,'Tashkent','Uzbek','860','sum (inv.)','UZS','tiyin (inv.)','лв',2,'Republic of Uzbekistan','UZ','UZB','Uzbekistan','142','143',0,'998','UZ.png'),(862,'Caracas','Venezuelan','862','bolívar fuerte (pl. bolívares fuertes)','VEF','céntimo','Bs',2,'Bolivarian Republic of Venezuela','VE','VEN','Venezuela, Bolivarian Republic of','019','005',0,'58','VE.png'),(876,'Mata-Utu','Wallisian; Futunan; Wallis and Futuna Islander','876','CFP franc','XPF','centime','XPF',0,'Wallis and Futuna','WF','WLF','Wallis and Futuna','009','061',0,'681','WF.png'),(882,'Apia','Samoan','882','tala (inv.)','WST','sene (inv.)','WS$',2,'Independent State of Samoa','WS','WSM','Samoa','009','061',0,'685','WS.png'),(887,'San’a','Yemenite','887','Yemeni rial','YER','fils (inv.)','﷼',2,'Republic of Yemen','YE','YEM','Yemen','142','145',0,'967','YE.png'),(894,'Lusaka','Zambian','894','Zambian kwacha (inv.)','ZMW','ngwee (inv.)','ZK',2,'Republic of Zambia','ZM','ZMB','Zambia','002','014',0,'260','ZM.png');

#
# Structure for table "cupones"
#

DROP TABLE IF EXISTS `cupones`;
CREATE TABLE `cupones` (
  `cupon_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cupon_codigo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cupon_nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cupon_porcentaje` decimal(8,2) NOT NULL,
  `cupon_rel_id` int(11) NOT NULL,
  `cupon_rel_contenido` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'planes',
  `cupon_feho_inicio` datetime NOT NULL,
  `cupon_feho_fin` datetime NOT NULL,
  PRIMARY KEY (`cupon_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "cupones"
#


#
# Structure for table "descuentos"
#

DROP TABLE IF EXISTS `descuentos`;
CREATE TABLE `descuentos` (
  `desc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `desc_nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_porcentaje` decimal(8,2) NOT NULL,
  `desc_rel_id` int(11) NOT NULL,
  `desc_rel_contenido` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'planes',
  `desc_feho_inicio` datetime NOT NULL,
  `desc_feho_fin` datetime NOT NULL,
  PRIMARY KEY (`desc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "descuentos"
#


#
# Structure for table "empresa"
#

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `emp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `emp_tyc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_poli_priv` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "empresa"
#


#
# Structure for table "migrations"
#

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "migrations"
#

INSERT INTO `migrations` VALUES (1,'2017_04_07_203003_create_admins_table',1),(2,'2017_04_07_203003_create_categorias_table',1),(3,'2017_04_07_203003_create_comentarios_table',1),(4,'2017_04_07_203003_create_cupones_table',1),(5,'2017_04_07_203003_create_cursos_table',1),(6,'2017_04_07_203003_create_descuentos_table',1),(7,'2017_04_07_203003_create_empresa_table',1),(8,'2017_04_07_203003_create_etiqueta_contenido_table',1),(9,'2017_04_07_203003_create_etiquetas_table',1),(10,'2017_04_07_203003_create_lecciones_table',1),(11,'2017_04_07_203003_create_log_error_pagos_table',1),(12,'2017_04_07_203003_create_pagos_pendientes_table',1),(13,'2017_04_07_203003_create_planes_table',1),(14,'2017_04_07_203003_create_post_categorias_table',1),(15,'2017_04_07_203003_create_posts_table',1),(16,'2017_04_07_203003_create_profesor_curso_table',1),(17,'2017_04_07_203003_create_profesores_table',1),(18,'2017_04_07_203003_create_rubros_table',1),(19,'2017_04_07_203003_create_servicio_pagos_table',1),(20,'2017_04_07_203003_create_suscripciones_table',1),(21,'2017_04_07_203003_create_temas_table',1),(22,'2017_04_07_203003_create_testimonios_table',1),(23,'2017_04_07_203003_create_tickets_table',1),(24,'2017_04_07_203003_create_tipo_pagos_table',1),(25,'2017_04_07_203003_create_users_table',1),(26,'2017_04_07_203003_create_usuario_cursos_table',1),(27,'2017_04_07_203003_create_venta_det_table',1),(28,'2017_04_07_203003_create_ventas_cab_table',1),(29,'2017_04_07_203013_create_foreign_keys',1),(30,'2017_04_13_103057_create_sessions_table',2),(31,'2017_05_11_115113_setup_countries_table',3),(32,'2017_05_11_115114_charify_countries_table',3);

#
# Structure for table "permission_role"
#

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "permission_role"
#

INSERT INTO `permission_role` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(10,1),(11,1),(12,1),(13,1),(14,1),(2,3),(3,3),(6,3),(11,3),(12,3),(5,4);

#
# Structure for table "permissions"
#

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "permissions"
#

INSERT INTO `permissions` VALUES (1,'user_all','Administrar usuarios',NULL,'2016-12-03 14:31:00','2016-12-03 14:31:00'),(2,'admin_curso_all','Administrar cursos',NULL,'2016-12-03 14:31:19','2016-12-03 14:31:19'),(3,'timing_all','Administrar clientes',NULL,'2016-12-03 14:32:04','2016-12-03 14:32:04'),(4,'config_all','Configuración del sistema',NULL,'2016-12-03 14:32:31','2016-12-03 14:32:31'),(5,'noti_all','Recibir notificaciones',NULL,'2016-12-13 00:53:44','2016-12-13 00:53:44'),(6,'comp_all','Administrar compras',NULL,'2017-03-05 23:14:51','2017-03-05 23:14:51'),(7,'vent_all','Administrar ventas',NULL,'2017-03-05 23:15:14','2017-03-05 23:15:14'),(8,'empresa_all','Configurar empresa',NULL,'2017-03-05 23:16:00','2017-03-05 23:16:00'),(10,'rep_emp_all','Reportes de bonificación',NULL,'2017-03-05 23:17:33','2017-03-05 23:17:33'),(11,'rep_cv_all','Reportes de compras y ventas',NULL,'2017-03-05 23:18:08','2017-03-05 23:18:08'),(12,'rep_prod_all','Reporte de productores',NULL,'2017-03-05 23:19:00','2017-03-05 23:19:00'),(13,'admin_rubroscat_all','Administración de rubros y categorias',NULL,'2017-04-11 01:02:38','2017-04-11 01:02:41'),(14,'admin_profesores_all','Administración de profesores',NULL,'2017-04-12 12:12:24','2017-04-12 12:12:26');

#
# Structure for table "planes"
#

DROP TABLE IF EXISTS `planes`;
CREATE TABLE `planes` (
  `plan_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `plan_nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_duracion` int(11) NOT NULL DEFAULT '30',
  `plan_codigo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_precio` double(8,2) NOT NULL,
  `plan_descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`plan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "planes"
#


#
# Structure for table "post_categorias"
#

DROP TABLE IF EXISTS `post_categorias`;
CREATE TABLE `post_categorias` (
  `pos_cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `pos_cat_nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_cat_parent_id` int(11) NOT NULL DEFAULT '0',
  `post_cat_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`pos_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "post_categorias"
#

INSERT INTO `post_categorias` VALUES (1,'2017-05-12 10:16:52','2017-05-12 10:24:01',NULL,'Programación Web',2,'programacion-web'),(2,'2017-05-12 10:22:59','2017-05-12 10:22:59',NULL,'Programación',0,'programacion');

#
# Structure for table "profesores"
#

DROP TABLE IF EXISTS `profesores`;
CREATE TABLE `profesores` (
  `prof_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prof_nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prof_apellidos` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prof_correo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prof_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prof_foto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prof_historia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prof_otros` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prof_telefono` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `prof_web` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prof_ocupacion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`prof_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "profesores"
#

INSERT INTO `profesores` VALUES (1,'Luis Esteban','Cruz','lcruz@cursania.com','luis-esteban-cruz','profesor/foto/foto-profesor-luis-cruz.jpg','Desarrollador full stack con experiencia de más de 5 años enseñando en el medio.','','965412378','2017-04-12 14:35:39','2017-05-31 00:19:59',NULL,'http://cursania.com','Desarrollador de Software'),(2,'Cesar Alan','Mejia','cmejia@cursania.com','cesar-alan-mejia','profesor/foto/foto-profesor-cesar-alan-mejia.png','Desarrollador full stack con experiencia de más de 5 años enseñando en el medio.','','938232863','2017-04-12 14:43:30','2017-04-13 01:18:43',NULL,'http://cursania.com','Desarrollador de Software'),(3,'Milagros','Alfaro','malfaro@cursania.com','milagros-alfaro','profesor/foto/foto-profesor-milagros-alfaro.png','Hola soy milagros','','965552355','2017-04-13 12:06:43','2017-04-13 12:06:43',NULL,'http://cursania.com','Diseñadora web');

#
# Structure for table "posts"
#

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `post_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `post_nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_imagen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_resumen` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_cuerpo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_etiquetas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prof_id` int(10) unsigned NOT NULL,
  `post_cat_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `posts_prof_id_foreign` (`prof_id`),
  KEY `posts_post_cat_id_foreign` (`post_cat_id`),
  CONSTRAINT `posts_post_cat_id_foreign` FOREIGN KEY (`post_cat_id`) REFERENCES `post_categorias` (`pos_cat_id`),
  CONSTRAINT `posts_prof_id_foreign` FOREIGN KEY (`prof_id`) REFERENCES `profesores` (`prof_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "posts"
#

INSERT INTO `posts` VALUES (1,'2017-05-16 11:19:14','2017-06-01 12:01:19',NULL,'Cargar imágenes con PHP y Ajax','cargar-imagenes-con-php-y-ajax','blog/portadas/cover-post-cargar-imagenes-con-php-y-ajax.jpg','Te enseñamos la mejor forma de cargar imagenes con ajax y php','<p>En este post te enseñare a cargar imagenes al servidor haciendo uso de php y ajax, trataremos de cubrir todos los parametros para que puedas incluir este ejemplo en tus próximos proyectos.</p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\" class=\"ql-size-large\">1. Crear el formulario</span></p><p>Para realizar este ejercicio es necesario que creemos un formulario con al menos un campo de tipo <code>file</code> y un botón para el envío del mismo, en el siguiente video te explicamos todo el proceso que debes de seguir para generar el formulario de manera correcta.</p><p><br></p><pre class=\"ql-syntax\" spellcheck=\"false\"><span class=\"hljs-tag\"><<span class=\"hljs-name\">html</span> <span class=\"hljs-attr\">lang</span>=<span class=\"hljs-string\">\"es\"</span>></span>\r\n<span class=\"hljs-tag\"><<span class=\"hljs-name\">head</span>></span>\r\n    <span class=\"hljs-tag\"><<span class=\"hljs-name\">meta</span> <span class=\"hljs-attr\">charset</span>=<span class=\"hljs-string\">\"utf-8\"</span>></span>\r\n    <span class=\"hljs-tag\"><<span class=\"hljs-name\">meta</span> <span class=\"hljs-attr\">http-equiv</span>=<span class=\"hljs-string\">\"X-UA-Compatible\"</span> <span class=\"hljs-attr\">content</span>=<span class=\"hljs-string\">\"IE=edge\"</span>></span>\r\n    <span class=\"hljs-tag\"><<span class=\"hljs-name\">meta</span> <span class=\"hljs-attr\">name</span>=<span class=\"hljs-string\">\"viewport\"</span> <span class=\"hljs-attr\">content</span>=<span class=\"hljs-string\">\"width=device-width, initial-scale=1\"</span>></span>\r\n    <span class=\"hljs-tag\"><<span class=\"hljs-name\">meta</span> <span class=\"hljs-attr\">name</span>=<span class=\"hljs-string\">\"description\"</span> <span class=\"hljs-attr\">content</span>=<span class=\"hljs-string\">\"\"</span>></span>\r\n    <span class=\"hljs-tag\"><<span class=\"hljs-name\">meta</span> <span class=\"hljs-attr\">name</span>=<span class=\"hljs-string\">\"author\"</span> <span class=\"hljs-attr\">content</span>=<span class=\"hljs-string\">\"\"</span>></span>\r\n    <span class=\"hljs-tag\"><<span class=\"hljs-name\">title</span>></span>Enviar imágen por Ajaxtitle>\r\n    <span class=\"hljs-tag\"><<span class=\"hljs-name\">link</span> <span class=\"hljs-attr\">href</span>=<span class=\"hljs-string\">\"https://bootswatch.com/readable/bootstrap.min.css\"</span> <span class=\"hljs-attr\">rel</span>=<span class=\"hljs-string\">\"stylesheet\"</span>></span>\r\n    <span class=\"hljs-tag\"><<span class=\"hljs-name\">style</span>></span>\r\n        body {\r\n            padding-top: 50px;\r\n        }\r\n\r\n        .starter-template {\r\n            padding: 40px 15px;\r\n            text-align: center;\r\n        }\r\n    <span class=\"hljs-tag\"><<span class=\"hljs-name\">style</span>></span>\r\n<span class=\"hljs-tag\"><<span class=\"hljs-name\">head</span>></span>\r\n<span class=\"hljs-tag\"><<span class=\"hljs-name\">body</span>></span>\r\n<span class=\"hljs-tag\"><<span class=\"hljs-name\">div</span> <span class=\"hljs-attr\">class</span>=<span class=\"hljs-string\">\"navbar navbar-inverse navbar-fixed-top\"</span> <span class=\"hljs-attr\">role</span>=<span class=\"hljs-string\">\"navigation\"</span>></span>\r\n    <span class=\"hljs-tag\"><<span class=\"hljs-name\">div</span> <span class=\"hljs-attr\">class</span>=<span class=\"hljs-string\">\"container\"</span>></span>\r\n        <span class=\"hljs-tag\"><<span class=\"hljs-name\">div</span> <span class=\"hljs-attr\">class</span>=<span class=\"hljs-string\">\"navbar-header\"</span>></span>\r\n            <span class=\"hljs-tag\"><<span class=\"hljs-name\">button</span> <span class=\"hljs-attr\">type</span>=<span class=\"hljs-string\">\"button\"</span> <span class=\"hljs-attr\">class</span>=<span class=\"hljs-string\">\"navbar-toggle collapsed\"</span> <span class=\"hljs-attr\">data-toggle</span>=<span class=\"hljs-string\">\"collapse\"</span> <span class=\"hljs-attr\">data-target</span>=<span class=\"hljs-string\">\".navbar-collapse\"</span>></span>\r\n                <span class=\"hljs-tag\"><<span class=\"hljs-name\">span</span> <span class=\"hljs-attr\">class</span>=<span class=\"hljs-string\">\"sr-only\"</span>></span>Toggle navigationspan>\r\n                <span class=\"hljs-tag\"><<span class=\"hljs-name\">span</span> <span class=\"hljs-attr\">class</span>=<span class=\"hljs-string\">\"icon-bar\"</span>></span>span>\r\n                <span class=\"hljs-tag\"><<span class=\"hljs-name\">span</span> <span class=\"hljs-attr\">class</span>=<span class=\"hljs-string\">\"icon-bar\"</span>></span>span>\r\n                <span class=\"hljs-tag\"><<span class=\"hljs-name\">span</span> <span class=\"hljs-attr\">class</span>=<span class=\"hljs-string\">\"icon-bar\"</span>></span>span>\r\n            button>\r\n            <span class=\"hljs-tag\"><<span class=\"hljs-name\">a</span> <span class=\"hljs-attr\">class</span>=<span class=\"hljs-string\">\"navbar-brand\"</span> <span class=\"hljs-attr\">href</span>=<span class=\"hljs-string\">\"#\"</span>></span>Formando Códigoa>\r\n        div>\r\n        <span class=\"hljs-tag\"><<span class=\"hljs-name\">div</span> <span class=\"hljs-attr\">class</span>=<span class=\"hljs-string\">\"collapse navbar-collapse\"</span>></span>\r\n            <span class=\"hljs-tag\"><<span class=\"hljs-name\">ul</span> <span class=\"hljs-attr\">class</span>=<span class=\"hljs-string\">\"nav navbar-nav\"</span>></span>\r\n                <span class=\"hljs-tag\"><<span class=\"hljs-name\">li</span> <span class=\"hljs-attr\">class</span>=<span class=\"hljs-string\">\"active\"</span>><<span class=\"hljs-name\">a</span> <span class=\"hljs-attr\">href</span>=<span class=\"hljs-string\">\"#\"</span>></span>Formularioa>li>\r\n                <span class=\"hljs-tag\"><<span class=\"hljs-name\">li</span>><<span class=\"hljs-name\">a</span> <span class=\"hljs-attr\">target</span>=<span class=\"hljs-string\">\"_blank\"</span> <span class=\"hljs-attr\">href</span>=<span class=\"hljs-string\">\"https://formandocodigo.com\"</span>></span>Vistar sitioa>li>\r\n                <span class=\"hljs-tag\"><<span class=\"hljs-name\">li</span>><<span class=\"hljs-name\">a</span> <span class=\"hljs-attr\">target</span>=<span class=\"hljs-string\">\"_blank\"</span> <span class=\"hljs-attr\">href</span>=<span class=\"hljs-string\">\"https://youtube.com/formandocodigo\"</span>></span>Ver canala>li>\r\n            <span class=\"hljs-tag\"><<span class=\"hljs-name\">ul</span>></span>\r\n        <span class=\"hljs-tag\"><<span class=\"hljs-name\">div</span>></span>\r\n    <span class=\"hljs-tag\"><<span class=\"hljs-name\">div</span>></span>\r\n<span class=\"hljs-tag\"><<span class=\"hljs-name\">div</span>></span>\r\n<span class=\"hljs-tag\"><<span class=\"hljs-name\">div</span> <span class=\"hljs-attr\">class</span>=<span class=\"hljs-string\">\"container\"</span>></span>\r\n    <span class=\"hljs-tag\"><<span class=\"hljs-name\">div</span> <span class=\"hljs-attr\">class</span>=<span class=\"hljs-string\">\"starter-template\"</span>></span>\r\n        <span class=\"hljs-tag\"><<span class=\"hljs-name\">div</span> <span class=\"hljs-attr\">class</span>=<span class=\"hljs-string\">\"row\"</span>></span>\r\n            <span class=\"hljs-tag\"><<span class=\"hljs-name\">div</span> <span class=\"hljs-attr\">class</span>=<span class=\"hljs-string\">\"col-md-6 col-md-offset-3\"</span>></span>\r\n                <span class=\"hljs-tag\"><<span class=\"hljs-name\">div</span> <span class=\"hljs-attr\">class</span>=<span class=\"hljs-string\">\"panel panel-default\"</span>></span>\r\n                \t<span class=\"hljs-tag\"><<span class=\"hljs-name\">div</span> <span class=\"hljs-attr\">class</span>=<span class=\"hljs-string\">\"panel-body\"</span>></span>\r\n                        <span class=\"hljs-tag\"><<span class=\"hljs-name\">form</span> <span class=\"hljs-attr\">id</span>=<span class=\"hljs-string\">\"frmSubirImagen\"</span> <span class=\"hljs-attr\">action</span>=<span class=\"hljs-string\">\"enviar.php\"</span> <span class=\"hljs-attr\">method</span>=<span class=\"hljs-string\">\"POST\"</span> <span class=\"hljs-attr\">role</span>=<span class=\"hljs-string\">\"form\"</span> <span class=\"hljs-attr\">enctype</span>=<span class=\"hljs-string\">\"multipart/form-data\"</span>></span>\r\n                            <span class=\"hljs-tag\"><<span class=\"hljs-name\">legend</span>></span>Subir imágen por ajaxlegend>\r\n\r\n                            <span class=\"hljs-tag\"><<span class=\"hljs-name\">div</span> <span class=\"hljs-attr\">class</span>=<span class=\"hljs-string\">\"form-group\"</span>></span>\r\n                                <span class=\"hljs-tag\"><<span class=\"hljs-name\">label</span> <span class=\"hljs-attr\">for</span>=<span class=\"hljs-string\">\"imagen\"</span>></span>Selecciona imágenlabel>\r\n                                <span class=\"hljs-tag\"><<span class=\"hljs-name\">input</span> <span class=\"hljs-attr\">type</span>=<span class=\"hljs-string\">\"file\"</span> <span class=\"hljs-attr\">class</span>=<span class=\"hljs-string\">\"form-control\"</span> <span class=\"hljs-attr\">name</span>=<span class=\"hljs-string\">\"imagen\"</span> <span class=\"hljs-attr\">id</span>=<span class=\"hljs-string\">\"imagen\"</span> <span class=\"hljs-attr\">required</span>></span>\r\n                            <span class=\"hljs-tag\"><<span class=\"hljs-name\">div</span>></span>\r\n\r\n                            <span class=\"hljs-tag\"><<span class=\"hljs-name\">button</span> <span class=\"hljs-attr\">type</span>=<span class=\"hljs-string\">\"submit\"</span> <span class=\"hljs-attr\">class</span>=<span class=\"hljs-string\">\"btn btn-primary\"</span>></span>Cargar imágenbutton>\r\n                        <span class=\"hljs-tag\"><<span class=\"hljs-name\">form</span>></span>\r\n                \t<span class=\"hljs-tag\"><<span class=\"hljs-name\">div</span>></span>\r\n                <span class=\"hljs-tag\"><<span class=\"hljs-name\">div</span>></span>\r\n            <span class=\"hljs-tag\"><<span class=\"hljs-name\">div</span>></span>\r\n        <span class=\"hljs-tag\"><<span class=\"hljs-name\">div</span>></span>\r\n    <span class=\"hljs-tag\"><<span class=\"hljs-name\">div</span>></span>\r\n<span class=\"hljs-tag\"><<span class=\"hljs-name\">div</span>></span>\r\n<span class=\"hljs-tag\"><<span class=\"hljs-name\">script</span> <span class=\"hljs-attr\">src</span>=<span class=\"hljs-string\">\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\"</span>><<span class=\"hljs-name\">script</span>></span>\r\n<span class=\"hljs-tag\"><<span class=\"hljs-name\">script</span> <span class=\"hljs-attr\">src</span>=<span class=\"hljs-string\">\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"</span>><<span class=\"hljs-name\">script</span>></span>\r\n<span class=\"hljs-tag\"><<span class=\"hljs-name\">script</span> <span class=\"hljs-attr\">src</span>=<span class=\"hljs-string\">\"js/subirImagen.js\"</span>><<span class=\"hljs-name\">script</span>></span>\r\n<span class=\"hljs-tag\"><<span class=\"hljs-name\">body</span>></span>\r\n<span class=\"hljs-tag\"><<span class=\"hljs-name\">html</span>></span>\r\n</pre><p><br></p><p><span style=\"color: rgb(0, 0, 0);\" class=\"ql-size-large\">2. Archivo php a donde se va a enviar el formulario</span></p><p>Necesitamos un lenguaje de programación web para realizar la carga del archivo y para ello vamos a usar PHP, el archivo que generamos es <code>enviar.php</code> y es adonde se va a enviar el formulario, a continuación tienes el código.</p><p><br></p><p><br></p><pre class=\"ql-syntax\" spellcheck=\"false\"><span class=\"hljs-comment\">/**\r\n * Created by Dac Developers & Formando Código.\r\n * User: Cesar Mejia\r\n * Date: 9/03/2017\r\n * Time: 1:22 AM\r\n */</span>\r\n\r\n$ruta_carpeta = <span class=\"hljs-string\">\"imagenes/\"</span>;\r\n$nombre_archivo = <span class=\"hljs-string\">\"imagen_\"</span>.date(<span class=\"hljs-string\">\"dHis\"</span>) .<span class=\"hljs-string\">\".\"</span>. pathinfo($_FILES[<span class=\"hljs-string\">\"imagen\"</span>][<span class=\"hljs-string\">\"name\"</span>],PATHINFO_EXTENSION);\r\n$ruta_guardar_archivo = $ruta_carpeta . $nombre_archivo;\r\n\r\n<span class=\"hljs-keyword\">if</span>(move_uploaded_file($_FILES[<span class=\"hljs-string\">\"imagen\"</span>][<span class=\"hljs-string\">\"tmp_name\"</span>],$ruta_guardar_archivo)){\r\n    <span class=\"hljs-keyword\">echo</span> <span class=\"hljs-string\">\"imagen cargada\"</span>;\r\n}<span class=\"hljs-keyword\">else</span>{\r\n    <span class=\"hljs-keyword\">echo</span> <span class=\"hljs-string\">\"no se pudo cargar\"</span>;\r\n}\r\n\r\n<span class=\"hljs-meta\">?></span>\r\n</pre><p><br></p><p><span class=\"ql-size-large\">3. AJAX para el envio del formulario</span></p><p>Para finalizar necesitamos el AJAX y esto lo logramos con ayuda de javascript y su potente librería Jquery, a continuación, te dejo el código para el archivo js.</p><p><br></p><pre class=\"ql-syntax\" spellcheck=\"false\">$(<span class=\"hljs-built_in\">document</span>).ready(<span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span> () </span>{\r\n    <span class=\"hljs-keyword\">var</span> frm = $(<span class=\"hljs-string\">\"#frmSubirImagen\"</span>);\r\n    <span class=\"hljs-keyword\">var</span> btnEnviar = $(<span class=\"hljs-string\">\"button[type=submit]\"</span>);\r\n\r\n    <span class=\"hljs-keyword\">var</span> textoSubir = btnEnviar.text();\r\n    <span class=\"hljs-keyword\">var</span> textoSubiendo = <span class=\"hljs-string\">\"Cargando imágen\"</span>;\r\n\r\n    frm.bind(<span class=\"hljs-string\">\"submit\"</span>,<span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span> () </span>{\r\n\r\n        <span class=\"hljs-keyword\">var</span> frmData = <span class=\"hljs-keyword\">new</span> FormData;\r\n        frmData.append(<span class=\"hljs-string\">\"imagen\"</span>,$(<span class=\"hljs-string\">\"input[name=imagen]\"</span>)[<span class=\"hljs-number\">0</span>].files[<span class=\"hljs-number\">0</span>]);\r\n\r\n        $.ajax({\r\n            <span class=\"hljs-attr\">url</span>: frm.attr(<span class=\"hljs-string\">\"action\"</span>),\r\n            <span class=\"hljs-attr\">type</span>: frm.attr(<span class=\"hljs-string\">\"method\"</span>),\r\n            <span class=\"hljs-attr\">data</span>: frmData,\r\n            <span class=\"hljs-attr\">processData</span>: <span class=\"hljs-literal\">false</span>,\r\n            <span class=\"hljs-attr\">contentType</span>: <span class=\"hljs-literal\">false</span>,\r\n            <span class=\"hljs-attr\">cache</span>: <span class=\"hljs-literal\">false</span>,\r\n            <span class=\"hljs-attr\">beforeSend</span>: <span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span> (<span class=\"hljs-params\">data</span>) </span>{\r\n                btnEnviar.html(textoSubiendo);\r\n                btnEnviar.attr(<span class=\"hljs-string\">\"disabled\"</span>,<span class=\"hljs-literal\">true</span>);\r\n            },\r\n            <span class=\"hljs-attr\">success</span>: <span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span> (<span class=\"hljs-params\">data</span>) </span>{\r\n                btnEnviar.html(textoSubir);\r\n                btnEnviar.attr(<span class=\"hljs-string\">\"disabled\"</span>,<span class=\"hljs-literal\">false</span>);\r\n            }\r\n        });\r\n        <span class=\"hljs-keyword\">return</span> <span class=\"hljs-literal\">false</span>;\r\n    });\r\n});\r\n</pre><p><br></p><p>Finalizamos este ejercicio práctico con una pregunta para los lectores de este post: <strong>¿Qué otro ejemplo práctico AJAX quisieras ver?</strong></p>','cursania,php,ajax,servidor,cargar,imagenes',2,1),(2,'2017-05-31 23:17:18','2017-06-01 02:15:37',NULL,'Envio de formulario por Ajax','envio-de-formulario-por-ajax','blog/portadas/cover-post-envio-de-formulario-por-ajax.jpg','Descubre como enviar datos por ajax de manera sencilla y segura','<p>Hoy aprenderemos a realizar el envio de un formulario por ajax, para el backend se puede realizar con casi cualquier lenguaje web y para el frontend usaremos jquery ya que nos ayudará con sus métodos prácticos para ajax.</p><p><br></p><p>Mira este ejemplo básico de como hacerlo.</p><p><img src=\"/imagenes/blog/imagenes/cursania-imagen-01062017021530.gif\"></p><p><br></p><p><span class=\"ql-size-large\" style=\"color: rgb(0, 0, 0);\">1. Maquetar formulario</span></p><p>Para comenzar a realizar este pequeño tutorial necesitamos tener un archivo *.html creado, estaremos trabajando con html5 en todo momento asi que es importante resaltar que algunas propiedades en los controles de formulario son netamente funcionales en HTML5.</p><p><br></p><pre class=\"ql-syntax\" spellcheck=\"false\">\r\n<span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">html</span> <span class=\"hljs-attr\">lang</span>=<span class=\"hljs-string\">\"es\"</span>&gt;</span>\r\n<span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">head</span>&gt;</span>\r\n    <span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">meta</span> <span class=\"hljs-attr\">charset</span>=<span class=\"hljs-string\">\"UTF-8\"</span>&gt;</span>\r\n    <span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">title</span>&gt;</span>Enviar formulario con ajaxtitle&gt;\r\nhead&gt;\r\n<span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">body</span>&gt;</span>\r\n    <span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">form</span> <span class=\"hljs-attr\">id</span>=<span class=\"hljs-string\">\"formulario\"</span> <span class=\"hljs-attr\">action</span>=<span class=\"hljs-string\">\"recibir.php\"</span> <span class=\"hljs-attr\">method</span>=<span class=\"hljs-string\">\"post\"</span>&gt;</span>\r\n        <span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">input</span> <span class=\"hljs-attr\">type</span>=<span class=\"hljs-string\">\"text\"</span> <span class=\"hljs-attr\">placeholder</span>=<span class=\"hljs-string\">\"Escribe tu nombre\"</span> <span class=\"hljs-attr\">name</span>=<span class=\"hljs-string\">\"nombre\"</span> <span class=\"hljs-attr\">required</span> <span class=\"hljs-attr\">autofocus</span> <span class=\"hljs-attr\">title</span>=<span class=\"hljs-string\">\"Ingresa tu nombre porfavor\"</span>&gt;</span>\r\n        <span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">input</span> <span class=\"hljs-attr\">type</span>=<span class=\"hljs-string\">\"number\"</span> <span class=\"hljs-attr\">placeholder</span>=<span class=\"hljs-string\">\"Ingresa tu edad\"</span> <span class=\"hljs-attr\">name</span>=<span class=\"hljs-string\">\"edad\"</span> <span class=\"hljs-attr\">required</span> <span class=\"hljs-attr\">title</span>=<span class=\"hljs-string\">\"Ingresa tu edad porfavor\"</span>&gt;</span>\r\n        <span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">br</span>&gt;&lt;<span class=\"hljs-name\">br</span>&gt;</span>\r\n        <span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">input</span> <span class=\"hljs-attr\">type</span>=<span class=\"hljs-string\">\"submit\"</span> <span class=\"hljs-attr\">id</span>=<span class=\"hljs-string\">\"btnEnviar\"</span> <span class=\"hljs-attr\">name</span>=<span class=\"hljs-string\">\"btnEnviar\"</span> <span class=\"hljs-attr\">value</span>=<span class=\"hljs-string\">\"Enviar formulario\"</span>&gt;</span>\r\n    form&gt;\r\n    <span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">hr</span>&gt;</span>\r\n    <span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">p</span> <span class=\"hljs-attr\">class</span>=<span class=\"hljs-string\">\"respuesta\"</span>&gt;</span>\r\n\r\n    p&gt;\r\n    <span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">script</span> <span class=\"hljs-attr\">src</span>=<span class=\"hljs-string\">\"https://code.jquery.com/jquery-2.2.2.min.js\"</span>&gt;</span>script&gt;\r\n    <span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">script</span> <span class=\"hljs-attr\">src</span>=<span class=\"hljs-string\">\"js/enviar.js\"</span>&gt;</span>script&gt;\r\nbody&gt;\r\nhtml&gt;\r\n</pre><p><br></p><p>En el archivo html vemos que temenos un formulario con dos campos (Nombre, Edad) Los cuales serán enviados por método POST.</p><p><span class=\"ql-size-large\" style=\"color: rgb(0, 0, 0);\">2. Archivo *.js</span></p><p>Para realizar el envío por medio de AJAX en este caso vamos a hacer uso de la libreria Jquery, para lo cual insertamos el script haciendo referencia al jquery por encima de nuestro código o archivo en donde hacemos el ajax; Esto es importante de lo contrario vamos a tener problemas y al final no va a funcionar nuestro código.</p><p><br></p><pre class=\"ql-syntax\" spellcheck=\"false\"><span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">script</span> <span class=\"hljs-attr\">src</span>=<span class=\"hljs-string\">\"https://code.jquery.com/jquery-2.2.2.min.js\"</span>&gt;</span>script&gt;\r\n<span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">script</span> <span class=\"hljs-attr\">src</span>=<span class=\"hljs-string\">\"js/enviar.js\"</span>&gt;</span>script&gt;\r\n</pre><p><br></p><p>Ahora vamos a ver nuestro código para realizar el envío:</p><p><br></p><pre class=\"ql-syntax\" spellcheck=\"false\">$(<span class=\"hljs-built_in\">document</span>).ready(<span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span> () </span>{\r\n    $(<span class=\"hljs-string\">\"#formulario\"</span>).bind(<span class=\"hljs-string\">\"submit\"</span>,<span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span>()</span>{\r\n        <span class=\"hljs-comment\">// Capturamnos el boton de envío</span>\r\n        <span class=\"hljs-keyword\">var</span> btnEnviar = $(<span class=\"hljs-string\">\"#btnEnviar\"</span>);\r\n        $.ajax({\r\n            <span class=\"hljs-attr\">type</span>: $(<span class=\"hljs-keyword\">this</span>).attr(<span class=\"hljs-string\">\"method\"</span>),\r\n            <span class=\"hljs-attr\">url</span>: $(<span class=\"hljs-keyword\">this</span>).attr(<span class=\"hljs-string\">\"action\"</span>),\r\n            <span class=\"hljs-attr\">data</span>:$(<span class=\"hljs-keyword\">this</span>).serialize(),\r\n            <span class=\"hljs-attr\">beforeSend</span>: <span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span>()</span>{\r\n                <span class=\"hljs-comment\">/*\r\n                * Esta función se ejecuta durante el envió de la petición al\r\n                * servidor.\r\n                * */</span>\r\n                <span class=\"hljs-comment\">// btnEnviar.text(\"Enviando\"); Para button </span>\r\n                btnEnviar.val(<span class=\"hljs-string\">\"Enviando\"</span>); <span class=\"hljs-comment\">// Para input de tipo button</span>\r\n                btnEnviar.attr(<span class=\"hljs-string\">\"disabled\"</span>,<span class=\"hljs-string\">\"disabled\"</span>);\r\n            },\r\n            <span class=\"hljs-attr\">complete</span>:<span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span>(<span class=\"hljs-params\">data</span>)</span>{\r\n                <span class=\"hljs-comment\">/*\r\n                * Se ejecuta al termino de la petición\r\n                * */</span>\r\n                btnEnviar.val(<span class=\"hljs-string\">\"Enviar formulario\"</span>);\r\n                btnEnviar.removeAttr(<span class=\"hljs-string\">\"disabled\"</span>);\r\n            },\r\n            <span class=\"hljs-attr\">success</span>: <span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span>(<span class=\"hljs-params\">data</span>)</span>{\r\n                <span class=\"hljs-comment\">/*\r\n                * Se ejecuta cuando termina la petición y esta ha sido\r\n                * correcta\r\n                * */</span>\r\n                $(<span class=\"hljs-string\">\".respuesta\"</span>).html(data);\r\n            },\r\n            <span class=\"hljs-attr\">error</span>: <span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span>(<span class=\"hljs-params\">data</span>)</span>{\r\n                <span class=\"hljs-comment\">/*\r\n                * Se ejecuta si la peticón ha sido erronea\r\n                * */</span>\r\n                alert(<span class=\"hljs-string\">\"Problemas al tratar de enviar el formulario\"</span>);\r\n            }\r\n        });\r\n        <span class=\"hljs-comment\">// Nos permite cancelar el envio del formulario</span>\r\n        <span class=\"hljs-keyword\">return</span> <span class=\"hljs-literal\">false</span>;\r\n    });\r\n});\r\n</pre><p><br></p><p>El método&nbsp;<code>bind()</code>&nbsp;se utiliza para conectar un controlador de eventos directamente a los elementos, es decir nosotros podemos invocar a un elemento&nbsp;<code>$(\".boton\")</code>&nbsp;y por medio del método&nbsp;<code>bind()</code>&nbsp;ejecutar uno o mas eventos sobre sí.</p><p>Tambien dentro de este método&nbsp;<code>bind()</code>&nbsp;usamos un&nbsp;<code>return false</code>&nbsp;, esto sirve para cancelar el envio directo del formulario hacia el archivo php, dado que el ajax se ejecuta sobre la misma pantalla sin refrescarla.</p><p><span class=\"ql-size-large\">3. El archivo *.php</span></p><p>Para poder hacer el envío del formulario y la lectura de los campos estamos haciendo uso de php, Lenguaje de programación de lado servidor.</p><p><br></p><pre class=\"ql-syntax\" spellcheck=\"false\"><span class=\"hljs-built_in\">echo</span> <span class=\"hljs-string\">\"Hola \"</span>.<span class=\"hljs-variable\">$_REQUEST</span>[<span class=\"hljs-string\">\"nombre\"</span>].<span class=\"hljs-string\">\", Tienes \"</span>.<span class=\"hljs-variable\">$_REQUEST</span>[<span class=\"hljs-string\">\"edad\"</span>].<span class=\"hljs-string\">\" Años.\"</span>;\r\n</pre><p><br></p><p>Al final debemos encontrar un resultado como este cuando hagamos el envió del formulario.</p><p><br></p><p><img src=\"/imagenes/blog/imagenes/cursania-imagen-31052017111649.jpg\"></p>','php,ajax,jquery',2,1),(3,'2017-05-31 23:49:30','2017-06-01 02:12:38',NULL,'Conexión a MySQL con PDO en PHP','conexion-a-mysql-con-pdo-en-php','blog/portadas/cover-post-conexion-a-mysql-con-pdo-en-php.jpg','Aprende a conectarte a mysql con PDO en PHP - 2017','<p>Existen diversas formas de realizar una conexión a una base de datos MySQL en PHP, en la actualidad la extensión PDO es la&nbsp;más segura y estable; Recalcar que PDO solo esta disponible a partir de la version 5.0 de PHP.</p><p>La estructura de conexión PDO es bastante sencilla y facil de comprender:</p><p><img src=\"/imagenes/blog/imagenes/cursania-imagen-31052017114418.png\"></p><p>Tomando de&nbsp;referencia la estructura, el código que necesitamos para conectarnos es el siguiente</p><p><br></p><pre class=\"ql-syntax\" spellcheck=\"false\"><span class=\"hljs-keyword\">try</span> {\r\n  <span class=\"hljs-comment\"># Conexión a MySQL</span>\r\n  $cn = <span class=\"hljs-keyword\">new</span> PDO(<span class=\"hljs-string\">\"mysql:host=localhost;dbname=prueba\"</span>, <span class=\"hljs-string\">\"usuario\"</span>, <span class=\"hljs-string\">\"password\"</span>);\r\n}\r\n<span class=\"hljs-keyword\">catch</span>(PDOException $e) {\r\n    <span class=\"hljs-keyword\">echo</span> $e-&gt;getMessage();\r\n}\r\n</pre><p><span class=\"ql-size-large\" style=\"color: rgb(0, 0, 0);\">Ejemplo práctico</span></p><p>Para comprender mejor vamos a realizar un pequeño proyecto de prueba, para poder conectarnos a MySQL por medio de PDO.&nbsp;Veremos el listado de datos de una tabla de una base de datos.</p><p>La tabla tiene la siguiente estructura:</p><p><img src=\"/imagenes/blog/imagenes/cursania-imagen-31052017114529.JPG\"></p><p><br></p><p>Ahora veremos un sencillo código que con estructura PDO que nos ayudara a realizar el listado de datos.</p><p><br></p><pre class=\"ql-syntax\" spellcheck=\"false\"><span class=\"hljs-keyword\">try</span> {\r\n\t<span class=\"hljs-comment\">//Creamos la conexión PDO por medio de una instancia de su clase</span>\r\n\t$cnn = <span class=\"hljs-keyword\">new</span> PDO(<span class=\"hljs-string\">\"mysql:host=localhost;dbname=prueba\"</span>,<span class=\"hljs-string\">\"root\"</span>,<span class=\"hljs-string\">\"\"</span>);\r\n\r\n\t<span class=\"hljs-comment\">//Preparamos la consulta sql</span>\r\n\t$respuesta = $cnn-&gt;prepare(<span class=\"hljs-string\">\"select * from usuarios\"</span>);\r\n\r\n\t<span class=\"hljs-comment\">//Ejecutamos la consulta</span>\r\n\t$respuesta-&gt;execute();\r\n\r\n\t<span class=\"hljs-comment\">//Creamos un array donde almacenaremos la data obtenida</span>\r\n\t$usuarios = [];\r\n\r\n\t<span class=\"hljs-comment\">//Recorremos la data obtenida</span>\r\n\t<span class=\"hljs-keyword\">foreach</span>($respuesta <span class=\"hljs-keyword\">as</span> $res){\r\n\t\t<span class=\"hljs-comment\">//Llenamos la data en el array</span>\r\n\t    $usuarios[]=$res;\r\n\t}\r\n\r\n\t<span class=\"hljs-comment\">//Hacemos una impresion del array en formato JSON.</span>\r\n\t<span class=\"hljs-keyword\">echo</span> json_encode($usuarios);\r\n\r\n} <span class=\"hljs-keyword\">catch</span> (<span class=\"hljs-keyword\">Exception</span> $e) {\r\n\r\n\t<span class=\"hljs-keyword\">echo</span> $e-&gt;getMessage();\r\n\t\r\n}\r\n</pre><p><br></p><p>Finalmente el resultado que obtendremos en el navegador&nbsp;será el siguiente:</p><p><br></p><p><img src=\"/imagenes/blog/imagenes/cursania-imagen-31052017114743.png\"></p><p><br></p><p>Para conseguir que los datos json se vean formateados en nuestro navegador chrome hacemos uso de la extensión&nbsp;<a href=\"https://chrome.google.com/webstore/detail/jsonview/chklaanhfefbnpoihckbnefhakgolnmc?utm_source=plus\" target=\"_blank\" style=\"color: rgb(0, 0, 0);\">JSONView</a><span style=\"color: rgb(0, 0, 0);\">.</span></p><p>Puedes realizar la descarga de este proyecto:&nbsp;<a href=\"https://drive.google.com/file/d/0B4qOls4suR3HSlVZTF9pY19SUEU/view?usp=sharing\" target=\"_blank\" style=\"color: rgb(0, 0, 0);\">conexionpdo.zip</a></p><p><br></p><p><img src=\"/imagenes/blog/imagenes/cursania-imagen-01062017021227.gif\"></p>','php,pdo,conexion,mysql,base de datos',2,1);

#
# Structure for table "role_user"
#

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "role_user"
#

INSERT INTO `role_user` VALUES (1,1),(2,1),(3,1),(4,3),(5,1);

#
# Structure for table "roles"
#

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "roles"
#

INSERT INTO `roles` VALUES (1,'administrador','Administrador','Administrador o dueño del centro de acopio','2016-11-29 04:43:43','2017-02-27 02:34:05'),(3,'comprador','Comprador','Compradores del centro de acopio','2016-11-29 04:47:07','2017-02-27 02:31:31'),(4,'supervisor','Supervisor','Supervisor de la empresa','2016-12-03 15:15:48','2017-02-27 02:33:29');

#
# Structure for table "rubros"
#

DROP TABLE IF EXISTS `rubros`;
CREATE TABLE `rubros` (
  `rubro_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `rubro_nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rubro_otros` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rubro_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`rubro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "rubros"
#

INSERT INTO `rubros` VALUES (1,'2017-04-11 01:15:33','2017-04-11 01:57:44','2017-04-11 01:57:44','Lenguajes de Programación','','lenguajes-de-programacion'),(2,'2017-04-11 01:52:33','2017-04-11 01:52:33',NULL,'Programación y Tecnología','','programacion-y-tecnologia'),(3,'2017-04-11 02:38:41','2017-04-11 02:38:41',NULL,'Diseño Gráfico','','diseno-grafico');

#
# Structure for table "categorias"
#

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `cat_nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_parent_id` int(10) unsigned NOT NULL,
  `cat_otros` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rubro_id` int(10) unsigned NOT NULL,
  `cat_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cat_id`),
  KEY `categorias_rubro_id_foreign` (`rubro_id`),
  CONSTRAINT `categorias_rubro_id_foreign` FOREIGN KEY (`rubro_id`) REFERENCES `rubros` (`rubro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "categorias"
#

INSERT INTO `categorias` VALUES (1,'2017-04-11 02:20:28','2017-04-11 02:20:28',NULL,'Desarrollo web',0,'',2,'desarrollo-web'),(2,'2017-04-11 02:20:53','2017-06-08 23:22:08',NULL,'Diseño web',0,'',3,'diseno-web'),(3,'2017-04-11 02:21:09','2017-04-11 02:21:09',NULL,'Desarrollo Móvil',0,'',2,'desarrollo-movil');

#
# Structure for table "etiquetas"
#

DROP TABLE IF EXISTS `etiquetas`;
CREATE TABLE `etiquetas` (
  `eti_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `eti_nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`eti_id`),
  KEY `etiquetas_cat_id_foreign` (`cat_id`),
  CONSTRAINT `etiquetas_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categorias` (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "etiquetas"
#


#
# Structure for table "etiqueta_contenido"
#

DROP TABLE IF EXISTS `etiqueta_contenido`;
CREATE TABLE `etiqueta_contenido` (
  `eti_cont_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eti_id` int(10) unsigned NOT NULL,
  `eti_con_tipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eti_cont_rel_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`eti_cont_id`),
  KEY `etiqueta_contenido_eti_id_foreign` (`eti_id`),
  CONSTRAINT `etiqueta_contenido_eti_id_foreign` FOREIGN KEY (`eti_id`) REFERENCES `etiquetas` (`eti_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "etiqueta_contenido"
#


#
# Structure for table "cursos"
#

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE `cursos` (
  `cur_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` int(10) unsigned NOT NULL,
  `cur_nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cur_slogan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cur_icono` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cur_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cur_descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cur_estado` tinyint(1) NOT NULL DEFAULT '0',
  `cur_etiquetas` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cursania',
  `cur_portada` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cur_duracion` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `cur_certificado` tinyint(1) NOT NULL DEFAULT '0',
  `cur_gratuito` tinyint(1) NOT NULL DEFAULT '0',
  `cur_tipo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SU',
  `cur_precio` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `prof_id` int(11) DEFAULT NULL,
  `cur_color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '#000000',
  `en_preventa` tinyint(1) DEFAULT '1',
  `pre_videos` int(11) DEFAULT '5',
  `pre_previas` text COLLATE utf8mb4_unicode_ci,
  `pre_fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cur_id`),
  KEY `cursos_cat_id_foreign` (`cat_id`),
  CONSTRAINT `cursos_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categorias` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "cursos"
#

INSERT INTO `cursos` VALUES (2,2,'Bases de HTML y HTML5','Aprende HTML5 desde cero','cursos/iconos/icono-curso-bases-de-html-y-html5.jpg','bases-de-html-y-html5','<h3 class=\"Subtitulos\">Detalles del Curso</h3>\r\n                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ulla\r\n                        </p>\r\n                        <h3 class=\"Subtitulos\">Dirido a:</h3>\r\n                        <ol>\r\n                            <li> Diseñadores Web</li>\r\n                            <li> Gente con conocimientos de Web</li>\r\n                            <li> Programadores Web</li>\r\n                            <li> Diseñadores Gráficos</li>\r\n                        </ol>\r\n                        <h3 class=\"Subtitulos\">Requisitos</h3>\r\n                        <ol>\r\n                            <li> Tener conocimientos de Diseño Web</li>\r\n                            <li> Nociones de programación Básica</li>\r\n                        </ol>\r\n                        <h3 class=\"Subtitulos\">¿Qué aprenderás?</h3>\r\n                        <ol class=\"col s12\">\r\n                            <li> Realizar Login y Registro</li>\r\n                            <li> Registro de usuarios con PHP</li>\r\n                            <li> Manejo de conexiòn por Ajax</li>\r\n                            <li> Diseño del formulario con Bootstrap</li>\r\n                        </ol>',1,'html,html5,diseño web,maquetacion,aprender,cursos','cursos/portadas/portada-curso-bases-de-html-y-html5.jpg','12:00',0,0,'SU',20.00,'2017-04-12 01:12:09','2017-06-08 23:57:28',NULL,2,'#ea562e',1,45,NULL,'2017-06-11 00:00:00'),(3,1,'Principios de CSS y CSS3','Aprende a crear estilos para las páginas web','cursos/iconos/icono-curso-principios-de-css-y-css3.png','principios-de-css-y-css3','<h3 class=\"Subtitulos\">Detalles del Curso</h3>\r\n                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ulla\r\n                        </p>\r\n                        <h3 class=\"Subtitulos\">Dirido a:</h3>\r\n                        <ol>\r\n                            <li> Diseñadores Web</li>\r\n                            <li> Gente con conocimientos de Web</li>\r\n                            <li> Programadores Web</li>\r\n                            <li> Diseñadores Gráficos</li>\r\n                        </ol>\r\n                        <h3 class=\"Subtitulos\">Requisitos</h3>\r\n                        <ol>\r\n                            <li> Tener conocimientos de Diseño Web</li>\r\n                            <li> Nociones de programación Básica</li>\r\n                        </ol>\r\n                        <h3 class=\"Subtitulos\">¿Qué aprenderás?</h3>\r\n                        <ol class=\"col s12\">\r\n                            <li> Realizar Login y Registro</li>\r\n                            <li> Registro de usuarios con PHP</li>\r\n                            <li> Manejo de conexiòn por Ajax</li>\r\n                            <li> Diseño del formulario con Bootstrap</li>\r\n                        </ol>',1,'css,css3,estilos,responsive','cursos/portadas/portada-curso-principios-de-css-y-css3.jpg','02:20',0,0,'SU',45.00,'2017-04-12 02:11:47','2017-05-31 11:32:56',NULL,2,'#2f1beb',0,5,NULL,NULL),(4,2,'Programación IOS','aprende a desarrollar','cursos/iconos/icono-curso-programacion-ios.png','programacion-ios','<h3 class=\"Subtitulos\">Detalles del Curso</h3>\r\n                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ulla\r\n                        </p>\r\n                        <h3 class=\"Subtitulos\">Dirido a:</h3>\r\n                        <ol>\r\n                            <li> Diseñadores Web</li>\r\n                            <li> Gente con conocimientos de Web</li>\r\n                            <li> Programadores Web</li>\r\n                            <li> Diseñadores Gráficos</li></ol><ol>\r\n                        </ol>\r\n                        <h3 class=\"Subtitulos\">Requisitos</h3>\r\n                        <ol>\r\n                            <li> Tener conocimientos de Diseño Web</li>\r\n                            <li> Nociones de programación Básica</li>\r\n                        </ol>\r\n                        <h3 class=\"Subtitulos\">¿Qué aprenderás?</h3>\r\n                        <ol class=\"col s12\">\r\n                            <li> Realizar Login y Registro</li>\r\n                            <li> Registro de usuarios con PHP</li>\r\n                            <li> Manejo de conexiòn por Ajax</li>\r\n                            <li> Diseño del formulario con Bootstrap</li>\r\n                        </ol>',1,'ios,movil,desarrollo','cursos/portadas/portada-curso-programacion-ios.jpg','06:00',0,1,'SU',0.00,'2017-04-13 19:22:37','2017-05-31 11:50:28',NULL,2,'#333343',0,5,NULL,NULL),(5,1,'Login y Registro con PHP','MySQL, Sesiones, Validación, PDO y más','cursos/iconos/icono-curso-login-y-registro-con-php.jpg','login-y-registro-con-php','<h3 class=\"Subtitulos\">Detalles del Curso</h3>\r\n                        <p>En este curso aprenderás a crear un sistema de autentificación de usuarios usando <b>PHP</b> desde cero, crearemos el proyecto e iremos generando la estructura completa del mismo, cuidaremos de validar todos los accesos y usaremos <b>Ajax</b> para el inicio de sesión.</p>\r\n                        <h3 class=\"Subtitulos\">Dirigido a</h3>\r\n                        <ol>\r\n                            <li> Desarrolladores web</li>\r\n                            <li> Personas con conocimientos de PHP</li>\r\n                            <li>Interesados en aprender PHP desde cero</li>\r\n                            <li>Novatos en PHP</li>\r\n                        </ol>\r\n                        <h3 class=\"Subtitulos\">Requisitos</h3>\r\n                        <ol>\r\n                            <li> Tener conocimientos de HTML, CSS y Javascript básico</li>\r\n                            <li> Nociones de programación Básica</li><li>Muchas ganas de aprender</li>\r\n                        </ol>\r\n                        <h3 class=\"Subtitulos\">¿Qué aprenderás?</h3>\r\n                        <ol class=\"col s12\">\r\n                            <li> Realizar Login y Registro</li>\r\n                            <li> Registro de datos a mysql con php</li>\r\n                            <li> Manejo de conexión por Ajax</li>\r\n                            <li> Diseño del formulario con Bootstrap</li><li>Validación de formularios frontend y backend</li>\r\n                        </ol>',1,'php,pdo,mysql,programacion,web','cursos/portadas/portada-curso-login-y-registro-con-php.jpg','02:33',0,1,'PU',12.00,'2017-05-27 21:21:10','2017-06-08 01:31:03',NULL,2,'#481578',0,5,NULL,NULL);

#
# Structure for table "profesor_curso"
#

DROP TABLE IF EXISTS `profesor_curso`;
CREATE TABLE `profesor_curso` (
  `prof_cur_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prof_id` int(10) unsigned NOT NULL,
  `cur_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`prof_cur_id`),
  KEY `profesor_curso_prof_id_foreign` (`prof_id`),
  KEY `profesor_curso_cur_id_foreign` (`cur_id`),
  CONSTRAINT `profesor_curso_cur_id_foreign` FOREIGN KEY (`cur_id`) REFERENCES `cursos` (`cur_id`),
  CONSTRAINT `profesor_curso_prof_id_foreign` FOREIGN KEY (`prof_id`) REFERENCES `profesores` (`prof_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "profesor_curso"
#


#
# Structure for table "servicio_pagos"
#

DROP TABLE IF EXISTS `servicio_pagos`;
CREATE TABLE `servicio_pagos` (
  `ser_pa_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `ser_pa_entidad` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ser_pa_porcentaje` double(8,2) NOT NULL,
  `ser_pa_costo` double(8,2) NOT NULL,
  PRIMARY KEY (`ser_pa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "servicio_pagos"
#


#
# Structure for table "sessions"
#

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "sessions"
#


#
# Structure for table "temas"
#

DROP TABLE IF EXISTS `temas`;
CREATE TABLE `temas` (
  `tema_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tema_nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tema_descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cur_id` int(10) unsigned NOT NULL,
  `tema_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tema_id`),
  KEY `temas_cur_id_foreign` (`cur_id`),
  CONSTRAINT `temas_cur_id_foreign` FOREIGN KEY (`cur_id`) REFERENCES `cursos` (`cur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "temas"
#

INSERT INTO `temas` VALUES (1,'Introducción','Presentación y detalles iniciales del curso',3,'introduccion','2017-04-13 12:38:59','2017-04-13 12:38:59',NULL),(2,'Introduccion','Introduccion del miembro',4,'introduccion','2017-04-13 19:23:11','2017-04-13 19:23:11',NULL),(3,'¿Qué es CSS?',' ',3,'que-es-css','2017-04-13 23:25:36','2017-04-13 23:25:36',NULL),(4,'CSS3 Práctico',' ',3,'css3-practico','2017-04-13 23:28:28','2017-04-13 23:28:28',NULL),(5,'Finalización del curso','Despedida',3,'finalizacion-del-curso','2017-04-13 23:28:54','2017-04-14 11:27:51',NULL),(6,'Introducción',' ',2,'introduccion','2017-04-13 23:30:23','2017-04-13 23:30:23',NULL),(7,'Introducción','Presentación del curso',5,'introduccion','2017-05-30 13:06:52','2017-06-08 01:39:20',NULL),(8,'Desarrollo del proyecto','En esta parte del curso aprenderás a programar el proyecto, desde la conexión hasta el desarrollo del inicio de sesión.',5,'desarrollo-del-proyecto','2017-05-30 23:50:02','2017-06-08 01:39:30',NULL),(9,'Registro','Aprenderás a crear el formulario de registro e insertar usuarios en la base de datos.',5,'registro','2017-06-08 01:37:56','2017-06-08 01:37:56',NULL);

#
# Structure for table "lecciones"
#

DROP TABLE IF EXISTS `lecciones`;
CREATE TABLE `lecciones` (
  `lec_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lec_nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lec_descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lec_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lec_estado` tinyint(1) NOT NULL,
  `lec_tipo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tema_id` int(10) unsigned NOT NULL,
  `lec_ruta_video` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`lec_id`),
  KEY `lecciones_tema_id_foreign` (`tema_id`),
  CONSTRAINT `lecciones_tema_id_foreign` FOREIGN KEY (`tema_id`) REFERENCES `temas` (`tema_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "lecciones"
#

INSERT INTO `lecciones` VALUES (1,'Presentación del curso','En este vídeo aprenderemos a integrar todas las novedades del curso de php avanzado con Base de Datos','presentacion-del-curso',1,'G',2,'172825105','2017-04-14 13:33:27','2017-04-14 13:42:08',NULL),(2,'Frameworks de CSS3','<p>Aprendamos a usar frameworks de css3&nbsp; &nbsp;</p>','frameworks-de-css3',1,'P',4,'101718785','2017-04-14 13:45:10','2017-04-14 13:45:10',NULL),(3,'Alertas en CSS','<p>Usaremos las alertas en CSS   </p>','alertas-en-css',1,'P',4,'97355084','2017-04-14 13:48:20','2017-04-14 13:51:53',NULL),(4,'Presentación del curso','<p>Aprendamos a crear un login y registro con php y el plugin PDO&nbsp;</p>','presentacion-del-curso',1,'G',7,'219547612','2017-05-30 13:07:43','2017-05-30 13:07:43',NULL),(5,'Presentación del curso','En este video te presentamos como te ayudara este curso a mejorar tus habilidades','presentacion-del-curso',1,'G',1,'219562239','2017-05-30 13:28:48','2017-05-30 13:28:48',NULL),(6,'Conexión PDO','<p>Aprende a conectar tu base de datos MySQL con PHP por medio de PDO</p>','conexion-pdo',1,'G',8,'220747064','2017-05-30 23:51:38','2017-06-08 19:41:58',NULL),(7,'Presentación del curso de laravel','Presentación del curso','presentacion-del-curso-de-laravel',1,'G',6,'219562239','2017-05-31 01:32:53','2017-05-31 01:32:53',NULL),(8,'Requerimientos del curso','Necesitamos que tengas los siguientes conocimientos que te listamos en el video para que puedas llevar bien este curso.','requerimientos-del-curso',1,'G',7,'220746961','2017-06-08 18:49:49','2017-06-08 18:49:49',NULL),(9,'Generar entidad Usuario',' ','generar-entidad-usuario',1,'G',8,'220747136','2017-06-08 19:42:29','2017-06-08 19:42:29',NULL),(10,'Login en capa de acceso a datos','Aprenderemos a generar el método login en la capa de acceso a datos.','login-en-capa-de-acceso-a-datos',1,'G',8,'220747176','2017-06-08 19:43:10','2017-06-08 19:43:10',NULL),(11,'Ejecución de Login','Comprobaremos que el método login funciona perfectamente realizando una prueba en el navegador.','ejecucion-de-login',1,'G',8,'220747327','2017-06-08 19:44:57','2017-06-08 19:44:57',NULL),(12,'Vista principal del proyecto','Maquetaremos la vista principal del proyecto con html y bootstrap','vista-principal-del-proyecto',1,'G',8,'220747443','2017-06-08 19:45:59','2017-06-08 19:45:59',NULL),(13,'Vista login y validación','Realizaremos el formulario de login y la validación del mismo de modo que tengamos la seguridad ante todo.','vista-login-y-validacion',1,'G',8,'220747590','2017-06-08 19:46:56','2017-06-08 19:46:56',NULL),(14,'Envió de formulario por Ajax','Crearemos un código javascript con el que realizaremos peticiones a través de ajax al servidor.','envio-de-formulario-por-ajax',1,'G',8,'220747753','2017-06-08 19:48:13','2017-06-08 19:48:13',NULL),(15,'Notificación personalizada con plugin de  jquery','Instalaremos un plugin de jquery con el cual usaremos una notificación personalizada para el login','notificacion-personalizada-con-plugin-de-jquery',1,'G',8,'220747874','2017-06-08 19:49:24','2017-06-08 19:49:24',NULL),(16,'Seguridad en el envió del login',' ','seguridad-en-el-envio-del-login',1,'G',8,'220748092','2017-06-08 19:49:48','2017-06-08 19:49:48',NULL),(17,'Obteniendo el usuario para la sesión','Haremos uso de sesiones por lo que debemos de obtener el usuario actual para que podamos iniciar sesión','obteniendo-el-usuario-para-la-sesion',1,'G',8,'220748166','2017-06-08 19:51:20','2017-06-08 19:51:20',NULL),(18,'Trabajando con sesiones',' ','trabajando-con-sesiones',1,'G',8,'220748265','2017-06-08 19:51:52','2017-06-08 19:51:52',NULL),(19,'Diferentes tipos de usuarios y cierre de sesión',' ','diferentes-tipos-de-usuarios-y-cierre-de-sesion',1,'G',8,'220748353','2017-06-08 19:52:27','2017-06-08 19:52:27',NULL),(20,'Formulario y capa de datos',' ','formulario-y-capa-de-datos',1,'G',9,'220748553','2017-06-08 19:53:01','2017-06-08 19:53:01',NULL),(21,'Finalizar el registro de usuarios',' ','finalizar-el-registro-de-usuarios',1,'G',9,'220748679','2017-06-08 19:53:21','2017-06-08 19:53:21',NULL),(22,'Programas a utilizar',' ','programas-a-utilizar',1,'G',7,'220894793','2017-06-08 22:51:43','2017-06-08 22:51:43',NULL),(23,'Espacio de trabajo y estructura de carpetas',' ','espacio-de-trabajo-y-estructura-de-carpetas',1,'G',7,'220894857','2017-06-08 22:52:21','2017-06-08 22:52:21',NULL),(24,'Base de datos',' ','base-de-datos',1,'G',7,'220746977','2017-06-08 22:52:49','2017-06-08 22:52:49',NULL);

#
# Structure for table "testimonios"
#

DROP TABLE IF EXISTS `testimonios`;
CREATE TABLE `testimonios` (
  `test_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `test_nombres` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_ocupacion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_foto` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_detalle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "testimonios"
#


#
# Structure for table "tipo_pagos"
#

DROP TABLE IF EXISTS `tipo_pagos`;
CREATE TABLE `tipo_pagos` (
  `tipo_pag_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `tipo_pag_nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_pag_descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_pag_info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`tipo_pag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "tipo_pagos"
#


#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_apellidos` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_confirmado` tinyint(1) NOT NULL DEFAULT '0',
  `user_reg_modo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'email',
  `remember_token` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_foto` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_country_id` int(11) NOT NULL,
  `user_conf_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_user_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'2017-05-12 00:14:51','2017-05-12 00:30:45',NULL,'Cesar Alan','Cueva Mejia','imarvdt@gmail.com','$2y$10$hvtIKlQKq2cFYLwE3U/WbuEejvvXza5cmeO.vnwlSoS3j0gQT5Q5y',1,'email','','usuario/foto/foto-usuario-cesar-alan-cueva-mejia.png','cesar-alan-cueva-mejia',604,NULL),(2,'2017-05-19 12:54:32','2017-06-03 12:16:54',NULL,'Alan','Cueva Mejia','aprendeconmejia@gmail.com','$2y$10$m4QDVTyF7EJiJKE5WUHRnuAYaeR4bNcSbGy/jnyHXOu7Xju4hFpBu',1,'email','2WKGdAZvZwVfS1WZV3EPwYoflzlPzteWMV4ZJHd5XNQjs4sh5zfjblMM45TL','usuario/foto/foto-usuario-alan-cesar-m-cueva-mejia.png','alan-cueva-mejia',604,NULL),(3,'2017-06-07 02:17:31','2017-06-07 02:17:31',NULL,'Carlos','Quizpe','carlosdev@cursania.com','$2y$10$PMsmUYxi9Tg3eTaOoLVaS.58KrytihYCOCY7mxT0C63IOH0VsPA2y',1,'email','','usuario/foto/foto-usuario-carlos-quizpe.jpg','carlos-quizpe',604,NULL),(5,'2017-06-09 15:02:13','2017-06-09 15:02:13',NULL,'Alan Mejia','','amejia@gmail.com','$2y$10$2fSROFlyyTAWKljmeSvq6u59p6fmLoFXuxGQqy3oZQXb43HVQk1Pe',0,'email','','usuario/foto/foto-usuario-cursania.png','alan-mejia',0,'OULJPYczctunZ13gBcFYGKpvr634XtI3xGEpcHJZzYQu7zLAdnIeMF3Xf9r0');

#
# Structure for table "tickets"
#

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `ticket_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `ticket_nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_asunto` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_mensaje` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ticket_id`),
  KEY `tickets_user_id_foreign` (`user_id`),
  CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "tickets"
#


#
# Structure for table "usuario_cursos"
#

DROP TABLE IF EXISTS `usuario_cursos`;
CREATE TABLE `usuario_cursos` (
  `user_cur_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cur_id_array` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_cur_id`),
  KEY `usuario_cursos_user_id_foreign` (`user_id`),
  CONSTRAINT `usuario_cursos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "usuario_cursos"
#


#
# Structure for table "ventas_cab"
#

DROP TABLE IF EXISTS `ventas_cab`;
CREATE TABLE `ventas_cab` (
  `vc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `vc_feho` datetime NOT NULL,
  `tipo_pag_id` int(11) NOT NULL,
  `pag_pen_id` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `vc_subtotal` double(8,2) NOT NULL,
  `vc_igv` double(8,2) NOT NULL,
  `vc_comision` double(8,2) NOT NULL,
  `vc_total` double(8,2) NOT NULL,
  `vc_desc_valor` double(8,2) NOT NULL,
  `vc_cupon_valor` double(8,2) NOT NULL DEFAULT '0.00',
  `vc_estado_pago` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vc_feho_pago` datetime NOT NULL,
  `vc_anulado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`vc_id`),
  KEY `ventas_cab_user_id_foreign` (`user_id`),
  CONSTRAINT `ventas_cab_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "ventas_cab"
#


#
# Structure for table "venta_det"
#

DROP TABLE IF EXISTS `venta_det`;
CREATE TABLE `venta_det` (
  `vd_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `vc_id` int(10) unsigned NOT NULL,
  `vd_cod_rel_id` int(11) NOT NULL DEFAULT '0',
  `vd_tipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'curso',
  `vd_precio` double(8,2) NOT NULL,
  `vd_desc_por` double(8,2) NOT NULL DEFAULT '0.00',
  `vd_desc_monto` double(8,2) NOT NULL DEFAULT '0.00',
  `vd_cupon_cod` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vd_cupon_por` double(8,2) NOT NULL DEFAULT '0.00',
  `vd_cupon_monto` double(8,2) NOT NULL DEFAULT '0.00',
  `vd_total` double(8,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`vd_id`),
  KEY `venta_det_vc_id_foreign` (`vc_id`),
  CONSTRAINT `venta_det_vc_id_foreign` FOREIGN KEY (`vc_id`) REFERENCES `ventas_cab` (`vc_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "venta_det"
#


#
# Structure for table "log_error_pagos"
#

DROP TABLE IF EXISTS `log_error_pagos`;
CREATE TABLE `log_error_pagos` (
  `log_error_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `vc_id` int(10) unsigned NOT NULL,
  `log_error_feho` datetime NOT NULL,
  PRIMARY KEY (`log_error_id`),
  KEY `log_error_pagos_user_id_foreign` (`user_id`),
  KEY `log_error_pagos_vc_id_foreign` (`vc_id`),
  CONSTRAINT `log_error_pagos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `log_error_pagos_vc_id_foreign` FOREIGN KEY (`vc_id`) REFERENCES `ventas_cab` (`vc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "log_error_pagos"
#


#
# Structure for table "suscripciones"
#

DROP TABLE IF EXISTS `suscripciones`;
CREATE TABLE `suscripciones` (
  `sus_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `sus_feho_ini` datetime NOT NULL,
  `sus_feho_fin` datetime NOT NULL,
  `sus_estado` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vc_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`sus_id`),
  KEY `suscripciones_user_id_foreign` (`user_id`),
  KEY `suscripciones_vc_id_foreign` (`vc_id`),
  CONSTRAINT `suscripciones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `suscripciones_vc_id_foreign` FOREIGN KEY (`vc_id`) REFERENCES `ventas_cab` (`vc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "suscripciones"
#


#
# Structure for table "pagos_pendientes"
#

DROP TABLE IF EXISTS `pagos_pendientes`;
CREATE TABLE `pagos_pendientes` (
  `pag_pen_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pag_pen_estado` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'espera',
  `vc_id` int(10) unsigned NOT NULL,
  `pag_pen_feho` datetime NOT NULL,
  `pag_pen_imagen` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pag_pen_cod_cobro` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pag_pen_feho_fin` datetime NOT NULL,
  PRIMARY KEY (`pag_pen_id`),
  KEY `pagos_pendientes_vc_id_foreign` (`vc_id`),
  CONSTRAINT `pagos_pendientes_vc_id_foreign` FOREIGN KEY (`vc_id`) REFERENCES `ventas_cab` (`vc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "pagos_pendientes"
#

